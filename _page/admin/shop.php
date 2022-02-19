<div class="col-md-12" style="margin-top: 5px;">
<div class="card">
  <div class="card-header">
    <i class="fa fa-plus"></i> เพิ่มสินค้า
  </div>
<div class="card-body">
    <div id="return"></div>	
<div class="row justify-content-md-center">
<div class="col-sm-7 p-1">
<div class="card">
	<div class="card-body">
		<h5 class="modal-title text-center">เพิ่มรายการ</h5>
		<div class="modal-body">
            <form method="post" enctype="multipart/form-data">
                <input class="form-control" type="hidden" name="add" value="shop">	
			<div class="form-group">
				<label>ชื่อ</label>
				<input type="text" id="inputProductName" name="inputProductName" class="form-control" placeholder="Minecraft Premium Account" required="" autofocus="">
			</div>
			<div class="form-group">
				<label>ราคา</label>
				<input type="text" id="inputProductPrice" name="inputProductPrice" class="form-control" placeholder="1200.00" required="">
			</div>
			<div class="form-group">
				<label>คำอธิบาย</label>
				<textarea type="text" id="inputProductDesc" name="inputProductDesc" class="form-control" placeholder="สินค้าชิ้นนี้มันดียังไง?" required=""></textarea>
			</div>
			<div class="form-group">
				<label>วิธีใช้งาน</label>
				<textarea type="text" id="inputProductHelp" name="inputProductHelp" class="form-control" placeholder="วิธีการใช้งานสินค้า" required=""></textarea>
			</div>
			<div class="form-group">
				<label>รูปภาพ</label>
				<input type="file" id="inputProductImg" name="inputProductImg" class="form-control" placeholder="img/mc-account.png" required="">
			</div>
			<div class="form-group">
				<label>วิธีการจัดส่ง</label>
				<br>
				<select class="select-search" id="inputProductPattern" name="inputProductPattern">
					<optgroup label="โปรดเลือกวิธีการจัดส่ง">
						<option value="normaltext">· ข้อความธรรมดา · (เหมาะสำหรับการส่ง URL หรือข้อความต่างๆ)</option>
						<option value="code">· Gift Code / Redeem Code · (เหมาะสำหรับคีย์เกมทั่วๆไป)</option>
						<option value="eml:psw">· Email:Password · (เหมาะสำหรับ Account บนเว็บส่วนใหญ่)</option>
						<option value="usr:psw">· Username:Password · (เหมาะสำหรับ Platform เกมต่างๆเช่น Steam, Garena)</option>
						<option value="usr:eml:psw">· Username:Email:Password · (เหมาะสำหรับ ID Minecraft Migrate)</option>
						<option value="eml:psw:prf:pin">· Email:Password:Profile:Pin · (เหมาะสำหรับ Netflix)</option>
					</optgroup>
				</select>
			</div>
			<button class="btn btn-success btn-block" type="submit">เพิ่มรายการ</button>
			</form>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>

 <div class="col-md-12" style="margin-top: 5px;">
    <div class="card">
  <div class="card-header">
    <i class="fa fa-shopping-cart"></i> รายการสินค้า
  </div>
<div class="card-body">
<div class="row justify-content-md-center">
            <?php 
					  $query2 = $connect->query("SELECT * FROM products");
                              while($row = $query2->fetch_assoc()){
						?>
			<div class="col-4" style="  padding: 5px;">
				<div class="card" style="padding: 10px; background: rgba(0,0,0,0.1); ">
					<img class="card-img-top" src="<?php echo $config['www']; ?>/img/<?php echo $row['image']; ?>" style="width:100%;height:200px;">
					<div class="card-body" style="background: white;">
						<h5 class="card-title"><b><?php echo $row['name']; ?></b></h5>
						<p class="card-text">
						<h5 class="text-muted">฿<?php echo number_format($row['price'],2); ?></h5>
						<hr>
                     <form method="post">
                        <input class="form-control" type="hidden" name="delete" value="shop">
                        <input class="form-control" type="hidden" name="id" value="<?php echo $row['id']; ?>">						
						<a class="btn btn-warning" href="<?php echo $config['www']; ?>/admin/shopedit/<?=$row['id']?>"><i class="fas fa-cogs"></i></a>
						<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </form>
					</div>
				</div>
			</div>
						<?php 
					}
				?>
</div>
</div>
</div>
</div>
</div>