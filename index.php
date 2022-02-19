<?php
date_default_timezone_set("Asia/Bangkok");
require('_system/action.php');

if(isset($_SESSION['username']))
{
    $player_q = $connect->query("SELECT * FROM member where username = '".$_SESSION['username']."'");
    $player = $player_q->fetch_assoc();

}else{
	
}
	$config_q = $connect->query("SELECT * FROM config");
    $config = $config_q->fetch_assoc();
	
    $website_q = $connect->query("SELECT * FROM website");
    $website = $website_q->fetch_assoc();	

$user = $connect->query("SELECT * FROM member")->num_rows;

$product_r_q = $connect->query("SELECT * FROM products");
$product_row = $product_r_q->num_rows;

$stock_r_q = $connect->query("SELECT * FROM stock WHERE owner=''");
$stock_row = $stock_r_q->num_rows;

$stock1_r_q = $connect->query("SELECT * FROM log_buy");
$stock1_row = $stock1_r_q->num_rows;

$counter_file = "counter.txt";
$count = file_get_contents($counter_file);
$counter = file_put_contents($counter_file,$count+1);
 if($website['website'] == "true"){
?>
<!DOCTYPE HTML>
<html>
<head>
<?php include 'body/hader.php'; ?>
 </head>
 <body>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow-sm" data-aos="fade-down">
 <div class="container">
  <a class="navbar-brand" href="<?php echo $config['www']; ?>"><img src="<?php echo $config['icon']; ?>" alt="Beatles" style="width: 30px;" class="d-inline-block align-top lazy">&nbsp;JRShop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
          <a class="nav-link" href="<?php echo $config['www']; ?>"><i class="fa fa-home"></i> Home</a>
        </li>            
        <li class="nav-item <?php if($_GET['page'] == "shop"){echo 'active';}else{} ?>">
          <a class="nav-link" href="<?php echo $config['www']; ?>/shop"><i class="fa fa-shopping-cart"></i> shop</a>
        </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-wallet"></i> เติมเงิน</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item " href="<?php echo $config['www']; ?>/topup/truewalletgift">ซองอังเปา Wallet</a>
			<a class="dropdown-item " href="<?php echo $config['www']; ?>/topup/truemoney">บัตรทรูมันนี่</a>
			<a class="dropdown-item " href="<?php echo $config['www']; ?>/topup/giftcode_topup">GiftCode</a>
          </div>
        </li>		
		<li class="nav-item <?php if($_GET['page'] == "rating"){echo 'active';}else{} ?>">
          <a class="nav-link" href="<?php echo $config['www']; ?>/rating"><i class="fas fa-award"></i> อันดับของเว็บ</a>
        </li>
		<?php if($website['random'] == "true"){ ?>
		<li class="nav-item <?php if($_GET['page'] == "random"){echo 'active';}else{} ?>">
          <a class="nav-link" href="<?php echo $config['www']; ?>/random"><i class="fas fa-gift"></i>  รับไอดีแท้ฟรี</a>
        </li>	
        <?php }else{ } ?>		
		<li class="nav-item <?php if($_GET['page'] == "help"){echo 'active';}else{} ?>">
          <a class="nav-link" href="<?php echo $config['www']; ?>/help"><i class="fas fa-hands-helping"></i> ช่วยเหลือ</a>
        </li>		
        <li class="nav-item <?php if($_GET['page'] == "contact"){echo 'active';}else{} ?>">
          <a class="nav-link" href="<?php echo $config['www']; ?>/contact"><i class="fas fa-contact"></i>☎ ติดต่อ</a>
        </li>
        </ul>
        <ul class="navbar-nav ml-auto">
	<?php if(!$_SESSION['username']){ ?>
      <li class="nav-item">
		<a class="nav-link active" href="<?php echo $config['www']; ?>/login"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link active" href="<?php echo $config['www']; ?>/register"><i class="fas fa-user-plus"></i> สมัครสมาชิก</a>
	  </li>
	<?php }else{ ?>  
           <li class="nav-item  dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user"></i> <?php echo $_SESSION['username'] ?></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		
          <a class="dropdown-item" href="#"><i class="fa fa-user"></i>&nbsp;ผู้ใช้งาน : <?php echo $_SESSION['username'] ?></a>
           <a class="dropdown-item" href="#"><i class="fa fa-cube"></i>&nbsp;พ้อย : <?php echo number_format($player['point'],2); ?></a>
           <a class="dropdown-item" href="#"><i class="fa fa-users"></i>&nbsp;แรงค์ : <?php echo $player['rank'] ?></a>
          
          <div class="dropdown-divider"></div>
		  <a class="dropdown-item" href="<?php echo $config['www']; ?>/history"><i class="fa fa-history"></i>&nbsp;ประวัติทั้งหมด</a>
          <a class="dropdown-item" href="<?php echo $config['www']; ?>/profile"><i class="fa fa-user"></i>&nbsp;แก้ไขข้อมูลส่วนตัว</a>
		  <?php if(isset($_SESSION['id']) && $player['rank'] == "admin" ){ ?>
		  <a class="dropdown-item" href="<?php echo $config['www']; ?>/admin"><i class="fa fa-cog fa-lg"></i>&nbsp;จัดการระบบ</a>
		  <?php } ?>
         <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="javascript:logout();"><i class="fas fa-sign-out-alt"></i>&nbsp;ออกจากระบบ</a>
        </div>
      </li>
      <span class="nav-link">
	  <span class="badge badge-light noselect">
	  <i class="fas fa-coins"></i>&nbsp;<?php echo number_format($player['point'],2); ?> บาท</span>
	  </span>	  
     <?php } ?>   
      </ul>
    </div>
  </nav>
<br>
<br>
<br>
<div class="container" style="margin-top: 30px" data-aos="fade-up">
<div class="lpk_content" data-aos="fade-up">
<?php
                    if(!$_GET){$_GET["page"] = 'home';}
                    if(!$_GET["page"])
                    {
                      $_GET["page"] = "home";
                    }
                     if($_GET["page"] == "home"){
                         include_once __DIR__.'/_page/home.php';
                    }elseif($_GET['page'] == "shop"){
                        include_once __DIR__.'/_page/shop.php';
                    }elseif($_GET['page'] == "history"){
                        include_once __DIR__.'/_page/history.php';
                    }elseif($_GET['page'] == "topup"){
                        include_once __DIR__.'/_page/topup.php';
                    }elseif($_GET['page'] == "rating"){
                        include_once __DIR__.'/_page/rating.php';						
                    }elseif($_GET['page'] == "help"){
                        include_once __DIR__.'/_page/help.php';
                    }elseif($_GET['page'] == "profire"){
                        include_once __DIR__.'/_page/profire.php';	
                    }elseif($_GET['page'] == "random"){
                        include_once __DIR__.'/_page/random.php';							
                    }elseif($_GET['page'] == "login"){
                        include_once __DIR__.'/_page/login.php';
                    }elseif($_GET['page'] == "logout"){
                        include_once __DIR__.'/_page/logout.php';						
                    }elseif($_GET['page'] == "register"){
                        include_once __DIR__.'/_page/register.php';	
                    }elseif($_GET['page'] == "team"){
                        include_once __DIR__.'/_page/team.php';						
                    }elseif($_GET['page'] == "editprofile"){
                        include_once __DIR__.'/_page/editprofile.php';						
                    }elseif($_GET['page'] == "topup"){
                        include_once __DIR__.'/_page/topup.php';
                   }elseif($_GET['page'] == "admin" && isset($_SESSION['username']) && $player['rank'] == "admin"){
                        include_once __DIR__.'/_page/admin/admin.php';
                   }else{
                     echo '<div class="alert alert-danger"><i class="fa fa-warning"></i>404 ไม่พบหน้าที่ต้องการ</div>';
                     echo '<meta http-equiv="refresh" content="2;URL=./">';
                   }
                     ?>
</div> 
</div> 
<?php 
include 'body/footer.php'; 
}else{ 
include 'body/gg.php';
} 
?>