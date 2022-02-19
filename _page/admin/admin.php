					<div class="row">
						<div class="col-md-3 mb-2">
							<a href="<?php echo $config['www']; ?>/admin/home" class="btn btn-primary btn-block <?php if($_GET['menu'] == "home"){echo 'active';}else{} ?>">
								ข้อมูลเว็บไซต์
							</a>
						</div>
						<div class="col-md-3 mb-2">
							<a href="<?php echo $config['www']; ?>/admin/stock" class="btn btn-primary btn-block <?php if($_GET['menu'] == "inbox"){echo 'active';}else{} ?>">
								เพิ่มสต็อค
							</a>
						</div>
						<div class="col-md-3 mb-2">
							<a href="<?php echo $config['www']; ?>/admin/user" class="btn btn-primary btn-block <?php if($_GET['menu'] == "user"){echo 'active';}else{} ?>">
								จัดการสมาชิก
							</a>
						</div>						
						<div class="col-md-3 mb-2">
							<a href="<?php echo $config['www']; ?>/admin/shop" class="btn btn-primary btn-block <?php if($_GET['menu'] == "shop"){echo 'active';}else{} ?>">
								เพิ่มสินค้า
							</a>
						</div>					
						<div class="col-md-3 mb-2">
							<a href="<?php echo $config['www']; ?>/admin/topup" class="btn btn-primary btn-block <?php if($_GET['menu'] == "topup"){echo 'active';}else{} ?>">
								ระบบเติมเงิน
							</a>
						</div>
						<div class="col-md-3 mb-2">
							<a href="<?php echo $config['www']; ?>/admin/redeem" class="btn btn-primary btn-block <?php if($_GET['menu'] == "redeem"){echo 'active';}else{} ?>">
								เพิ่มคูปอง
							</a>
						</div>						
						<div class="col-md-6 mb-2">
							<a href="<?php echo $config['www']; ?>/admin/website" class="btn btn-primary btn-block <?php if($_GET['menu'] == "website"){echo 'active';}else{} ?>">
								ตั้งค่าเว็บไซต์
							</a>
						</div>						
						
						<div class="col-md-12 mb-2">
							<span class="is-divider" data-content="#ADMIN: <?php echo $_SESSION['username']; ?>" style="margin: 1.5rem 0;"></span>
						</div>
					</div>
      
<div class="container dwebsite">
<div class="row">
<?php
                    if(!$_GET){$_GET["menu"] = 'home';}
					if(!$_GET["menu"])
                    {
                      $_GET["menu"] = "home";
                    }
                     if($_GET["menu"] == "home"){
                         include_once __DIR__.'/home.php';
                    }elseif($_GET['menu'] == "shop"){
                        include_once __DIR__.'/shop.php';
                    }elseif($_GET['menu'] == "shopedit"){
                        include_once __DIR__.'/shopedit.php';	
                    }elseif($_GET['menu'] == "redeem"){
                        include_once __DIR__.'/redeem.php';						
                    }elseif($_GET['menu'] == "download"){
                        include_once __DIR__.'/download.php';
                    }elseif($_GET['menu'] == "topup"){
                        include_once __DIR__.'/topup.php';
                    }elseif($_GET['menu'] == "stock"){
                        include_once __DIR__.'/stock.php';
                    }elseif($_GET['menu'] == "login"){
                        include_once __DIR__.'/login.php';
                    }elseif($_GET['menu'] == "website"){
                        include_once __DIR__.'/website.php';
                    }elseif($_GET['menu'] == "user"){
                        include_once __DIR__.'/user.php';
                    }
                     ?>
</div>
</div>
	<script>
		$(document).ready( function () {
			$('#products').DataTable();
			$('#stock').DataTable();
			$('#editu').DataTable();
		} );
	</script>
<br>
<?php 
if(isset($_POST['add']) == "shop"){		
			$req_name = $_POST['inputProductName'];
			$req_price = $_POST['inputProductPrice'];
			$req_desc = $_POST['inputProductDesc'];
			$req_help = $_POST['inputProductHelp'];
			$req_patt = $_POST['inputProductPattern'];
            $imgfile=$_FILES["inputProductImg"]["name"];
            $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
            $allowed_extensions = array(".jpg","jpeg",".png",".gif");
            if(!in_array($extension,$allowed_extensions))
           {
           echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}else{
          $imgnewfile=md5($imgfile).$extension;
          move_uploaded_file($_FILES["inputProductImg"]["tmp_name"],"./img/".$imgnewfile);			
			
			$q1 = $connect->query("INSERT INTO products (name, image, description, help, price, pattern) VALUES ('".$req_name."', '".$imgnewfile."', '".$req_desc."', '".$req_help."', '".$req_price."', '".$req_patt."')");
		    iDisplayMSG('isuccess','Success Insert','เพิ่มสินค้าสำเร็จแล้ว','true',''.$config['www'].'/admin/shop');	
		  }
}elseif(isset($_POST['delete']) == "shop"){
    
    $DeleteProduct = $connect->query("DELETE FROM products WHERE id = '".$_POST['id']."'");
        iDisplayMSG('isuccess','Delete Success !!!', 'ลบสินค้าสำเร็จแล้ว !!!..','true',''.$config['www'].'/admin/shop');
}elseif(isset($_POST['setting']) == "topup"){
        $UpdateTopup = $connect->query("UPDATE wallet_account set mutiple='".$_POST['mutiple']."',phone='".$_POST['phone']."';");
        DisplayMSG('success','Topup Success !!!', 'ตั้งค่าการเติมเงินสำเร็จ !!!..','true');
}elseif(isset($_POST['edit']) == "shop"){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $help = $_POST['help'];
            $imgfile=$_FILES["image"]["name"];
            $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
            $allowed_extensions = array(".jpg","jpeg",".png",".gif");
            if(!in_array($extension,$allowed_extensions))
           {
           echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}else{
          $image=md5($imgfile).$extension;
          move_uploaded_file($_FILES["image"]["tmp_name"],"./img/".$image);			
			
			$q1 = $connect->query("INSERT INTO products (name, image, description, help, price, pattern) VALUES ('".$req_name."', '".$imgnewfile."', '".$req_desc."', '".$req_help."', '".$req_price."', '".$req_patt."')");
		    iDisplayMSG('isuccess','Success Insert','เพิ่มสินค้าสำเร็จแล้ว','true','?page=admin&menu=shop');	
		  }
          $InsertProduct = $connect->query("UPDATE products set name='".$name."', price='".$price."', description='".$description."',help='".$help."', image='".$image."' WHERE id = '".$_POST['id']."';"); 
          DisplayMSG('success','Edit Success !!!', 'แก้ไขสินค้าสำเร็จแล้ว !!!..','true');
}
if(isset($_POST['add_user']))
    {
        $insert_member = $connect->query("INSERT INTO member (username,point,rank,password,active) VALUES ('".$_POST['username']."','".$_POST['point']."','".$_POST['rank']."','".hashPassword($_POST['password'])."','".$_POST['active']."')");
        iDisplayMSG('isuccess','Success Insert','เพิ่มผู้ใช้สำเร็จ','true',''.$config['www'].'/admin/user');	
        }
    if(isset($_GET['member_delete']))
    {
        $delete_member = $connect->query("DELETE FROM member WHERE id = '".$_GET['member_id']."'");

        iDisplayMSG('isuccess','Success Delete','ลบข้อมูลสำเร็จ','true',''.$config['www'].'/admin/user');	
    }elseif(isset($_POST['edit_title']))
		
    {
        $edit_title = $connect->query("UPDATE config SET title = '".$_POST['title_name']."',www = '".$_POST['www']."',description = '".$_POST['description']."',icon = '".$_POST['icon']."',background = '".$_POST['background']."',page_id = '".$_POST['page_id']."',logged = '".$_POST['logged']."',announce = '".$_POST['announce']."'");
        iDisplayMSG('isuccess','Success Update','แก้ไขข้อมูลสำเร็จ','true',''.$config['www'].'/admin/website');	
        }elseif(isset($_POST['edit_fanpage']))
    {
        $edit_title = $connect->query("UPDATE website SET pageurl = '".$_POST['pageurl']."',page = '".$_POST['page']."'");
        iDisplayMSG('isuccess','Success Update','แก้ไขข้อมูลสำเร็จ','true',''.$config['www'].'/admin/website');	
        }elseif(isset($_POST['edit_video']))
    {
        $edit_title = $connect->query("UPDATE website SET videourl = '".$_POST['videourl']."',video = '".$_POST['video']."'");
        iDisplayMSG('isuccess','Success Update','แก้ไขข้อมูลสำเร็จ','true',''.$config['www'].'/admin/website');	
        }elseif(isset($_POST['edit_topup']))
    {
        $edit_title = $connect->query("UPDATE website SET truewallet = '".$_POST['truewallet']."',truemoney = '".$_POST['truemoney']."'");
        iDisplayMSG('isuccess','Success Update','แก้ไขข้อมูลสำเร็จ','true',''.$config['www'].'/admin/website');	
        }elseif(isset($_GET['news_delete']))
    {
        $delete_member = $connect->query("DELETE FROM news WHERE id = '".$_GET['news_id']."'");

        iDisplayMSG('isuccess','Success Delete','ลบข้อมูลสำเร็จ','true',''.$config['www'].'/admin/website');	
    }elseif(isset($_POST['insert_news']))
    {
        $edit_title = $connect->query("INSERT INTO news (date,info) VALUES ('".$_POST['date']."','".$_POST['news']."')");
        iDisplayMSG('isuccess','Success Insert','เพิ่มข้อมูลสำเร็จ','true',''.$config['www'].'/admin/website');	
    }elseif(isset($_POST['edit_pointfree']))
    {   
        $edit_Pf = $connect->query("UPDATE website SET pointfree = '".$_POST['pointfree']."'");
        iDisplayMSG('isuccess','Success Update','อัพเดทข้อมูลสำเร็จ','true',''.$config['www'].'/admin/website');	
    }elseif(isset($_POST['edit_random']))
    {   
        $edit_ra = $connect->query("UPDATE website SET random = '".$_POST['random']."',random2 = '".$_POST['random2']."'");
        iDisplayMSG('isuccess','Success Update','อัพเดทข้อมูลสำเร็จ','true',''.$config['www'].'/admin/website');	
	}	