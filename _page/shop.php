 <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-shopping-cart"></i> &nbsp;ร้านค้า</h5>
                            <hr>
<center>						
<h5 style="color: rgb(206, 0, 0);font-family: 'Kanit', sans-serif;">คำเตือน : อ่านรายละเอียดทั้งหมดให้จบก่อน แล้วค่อยกดซื้อหรือสอบถาม </h5>
</center>
<div id="return"></div>
<div class="row">
<?php
$query2 = $connect->query("SELECT * FROM products");
if($query2->num_rows == 0) {
?>	
<div class="container">
			<div class="card-body">
				<h1 align="center">ไม่มีสินค้าในระบบ</h1>			
			</div>
</div>
<?php
}	
    while($row = $query2->fetch_assoc()){
		
        $stock_price = "฿ ".$row['price'];
		$result = $connect->query("SELECT * FROM stock WHERE type = '".$row['id']."' AND owner = ''")->num_rows;
		$query = $connect->query("SELECT * FROM stock WHERE type = '".$row['id']."' AND owner = ''");
        $result1 = $query->fetch_assoc();
        if ($result1 > 0) {
          $stock_text = $result."";
        }else{
          $stock_text = $result."";
        }
        if ($result1 > 0) {
          $stock_button_text = '<i class="fa fa-shopping-cart hvr-icon"></i> สั่งซื้อเดี๋ยวนี้';
        }else{
          $stock_button_text = "สินค้าหมด";
        }
        if ($result1 > 0) {
          $stock_button = "";
        }else{
          $stock_button = "disabled";
        }
        if ($result1 > 0) {
          $stock_button_disabled = "btn btn-success w-50 buy";
        }else{
          $stock_button_disabled = "btn btn-danger w-50 buy";
        }
if(!$_SESSION['username']){		
?>
            <div class="col-lg-4 col-md-6 mb-3" style="  padding: 5px;">
				<div class="card" style="padding: 10px; background: rgba(0,0,0,0.1); ">			  
					<img class="card-img-top" src="./img/<?php echo $row['image']?>" style="width:100%;height:200px;">
					<div class="card-body" style="background: white;">
						<h6 class="card-title"><b><?php echo $row['name']?></b></h6>
						<p class="card-text">
				<li class="list-group-item">💲: <span class="badge badge-pill badge-warning"><?=$stock_price?></span> บาท   📦: <span class="badge badge-pill badge-info"><?=$stock_text?></span> ชิ้น</li>
			<br>						
					<form method="post">					
				    <div class="btn-group d-flex" role="group">
					  <button disabled type="button" class="btn btn-danger w-50 buy"><i class="fa fa-times-circle"></i> เข้าสู่ระบบก่อน!</button>
					  <a href="#" class="btn btn-secondary w-50" data-toggle="modal" data-target="#shop<?php echo $row['id']; ?>"><i class="fa fa-info-circle fa-lg"></i> รายละเอียด</a>
					  </form>
					</div>
       </div>
</div>
</div> 
<?php }else{ ?> 
            <div class="col-lg-4 col-md-6 mb-3" style="  padding: 5px;">
				<div class="card" style="padding: 10px; background: rgba(0,0,0,0.1); ">			  
					<img class="card-img-top" src="./img/<?php echo $row['image']?>" style="width:100%;height:200px;">
					<div class="card-body" style="background: white;">
						<h6 class="card-title"><b><?php echo $row['name']?></b></h6>
						<p class="card-text">
				<li class="list-group-item">💲: <span class="badge badge-pill badge-warning"><?=$stock_price?></span> บาท   📦: <span class="badge badge-pill badge-info"><?=$stock_text?></span> ชิ้น</li>
			<br>						
					<form method="post">					
				    <div class="btn-group d-flex" role="group">
					  <button <?=$stock_button?> type="button" onclick="buyitem(<?php echo $row['id']?>)" class="<?=$stock_button_disabled?>"><?=$stock_button_text?></button>
					  <a href="#" class="btn btn-secondary w-50" data-toggle="modal" data-target="#shop<?php echo $row['id']; ?>"><i class="fa fa-info-circle fa-lg"></i> รายละเอียด</a>
					  </form>
					</div>
       </div>
</div>
</div> 
<?php } }?>


</div>
</div>
</div>
<?php 
$query3 = $connect->query("SELECT * FROM products");
    while($row = $query3->fetch_assoc()){
		    $result1 = $connect->query("SELECT * FROM stock WHERE type = '".$row['id']."' AND owner = ''")->num_rows;
		    $query = $connect->query("SELECT * FROM stock WHERE type = '".$row['id']."' AND owner = ''");
			$result = $query->fetch_assoc();
            if ($result > 0) {
            $stock_text = "<i class='fa fa-shopping-basket'></i> สินค้าเหลือ $result1 ชิ้น";
            }else{
            $stock_text = "<i class='fa fa-shopping-basket'></i> สินค้าหมด";
            }			
			$stock = $result;
?>
  <div class="modal fade" id="shop<?php echo $row['id']?>" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" style="font-family: 'Kanit', sans-serif;"><?php echo $row['name']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  
        <h5 style="color: rgb(206, 0, 0);font-family: 'Kanit', sans-serif;">คำเตือน : อ่านทั้งหมดให้จบก่อน แล้วค่อยกดซื้อหรือสอบถาม </h5>
        <?php echo nl2br($row['description']); ?>
        <hr>   
        <span class="float-left text-muted"><?php echo $stock_text; ?></span>
        <span class="float-right text-muted">ราคา <?php echo $row['price']; ?> บาท</span>
        <br>
        <hr>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
     </div>
    </div>
  </div>
</div>
<?php }?>