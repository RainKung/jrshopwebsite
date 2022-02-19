<div class="col-md-12" style="margin-top: 5px;">
<div class="card">
  <div class="card-header">
    <i class="fa fa-plus"></i> แก้ไขสินค้า
  </div>
<div class="card-body">
    <div id="return"></div>	
<div class="row justify-content-md-center">
<div class="col-sm-7 p-1">
<div class="card">
	<?php
		if (isset($_GET['id'])){
$logs = $connect->query("SELECT * FROM products where id = '{$_GET['id']}'");

while($g1 = $logs->fetch_assoc()) {
$g['id'] = $g1['id'];							
$g['name'] = $g1['name'];
$g['image'] = $g1['image'];
$g['description'] = $g1['description'];
$g['help'] = $g1['help'];
$g['price'] = $g1['price'];
$g['pattern'] = $g1['pattern']; }
?>

	<div class="card-body">
		<h5 class="modal-title text-center">แก้ไขสินค้า</h5>
		<div class="modal-body">
<form method="post">
	<input class="form-control" type="hidden" name="edit"  value="shop">	
			<div class="form-group">
				<label>ชื่อ</label>
				<input type="text" id="name" name="name" class="form-control" placeholder="Minecraft Premium Account" required="" value="<?php echo $g['name'];?>">
			</div>
			<div class="form-group">
				<label>ราคา</label>
				<input type="text" id="price" name="price" class="form-control" placeholder="1200.00" value="<?php echo $g['price'];?>">
			</div>
			<div class="form-group">
				<label>คำอธิบาย</label>
				<textarea type="text" id="description" name="description" class="form-control" placeholder="สินค้าชิ้นนี้มันดียังไง?"><?php echo $g['description'];?></textarea>
			</div>
			<div class="form-group">
				<label>รูปภาพ</label>
				<input type="file" id="image" name="image" class="form-control" value="<?php echo $g['image'];?>">
			</div>
             <input type="hidden" name="image" value="<?php echo $g['image'];?>">			
			<div class="form-group">
				<label>วิธีใช้งาน</label>
				<textarea type="text" id="help" name="help" class="form-control" placeholder="วิธีการใช้งานสินค้า"><?php echo $g['help'];?></textarea>
			</div>
			   <input type="hidden" name="id" value="<?php echo $g['id']; ?>">
			  <button class="btn btn-success btn-block" type="submit">แก้ไขรายการ</button>
			</form></div></div>

<?php } ?>
	</div>
</div>
</div>
</div>
</div>
</div>