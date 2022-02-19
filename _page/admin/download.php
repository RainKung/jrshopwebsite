 <?php 	
    if(isset($_POST['shop_update']))
    {
        $update_shop = $connect->query("UPDATE download SET link = '".$_POST['link']."' where id = '{$_GET['id']}'");

       iDisplayMSG('isuccess','Success Saveed','เปลี่ยนแปลงข้อมูลสำเร็จ','true','?page=admin&menu=download');	
    }elseif(isset($_POST['edit_shop']))	
?>

<div class="col-md-12" style="margin-top: 5px;">
<div class="card">
  <div class="card-header">
    <i class="fa fa-download"></i> จัดส่งการดาวน์โหลด
  </div>
<div class="card-body">
    <div id="return"></div>
<div class="row justify-content-md-center">
<div class="col-sm-5 p-1">
<div class="card" >
  <div class="card-body">
    <h5 class="card-title"><span class="badge badge-secondary"></span></h5>
    <form method="post">
        <input class="form-control" type="hidden" name="insert_download">
        <div class="form-group">
            <select class="form-control" name="username" id="username" required="">
                        <option selected value="true">กรุณาเลือก Username ที่ต้องการ</option>
                <?php
                $member_s = $connect->query("SELECT * FROM member");
						while($member = $member_s->fetch_assoc()) { ?>
					        <option value="<?php echo $member['username']; ?>"><?php echo $member['username']; ?></option>
                                                <?php } ?>
					
            </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="product" id="product">
                        <option selected value="true">กรุณาเลือก Product ที่ต้องการ</option>
                            <?php
                $product_s = $connect->query("SELECT * FROM product");
						while($product_i = $product_s->fetch_assoc()) { ?>
					<option value="<?php echo $product_i['name'] ?>"><?php echo $product_i['name'] ?></option>
                                                <?php } ?>
                    </select>
                </div>
  </div>
                                            
                                                <div class="card-footer"><button type="submit" class="btn btn-success btn-block">เพิ่มสินค้า</button></div>
                                            </form>
</div>
</div>
</div>
</div>
</div>
    <p></p>
    <div class="card">
  <div class="card-header">
    <i class="fa fa-inbox"></i> การดาวน์โหลด
  </div>
  <div class="card-body">
      <div class="table-responsive m-t-40">
                                    <table class="table stylish-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" scope="col">ผู้ใช้</th>
                                                <th class="text-center align-middle" scope="col">สินค้า</th>
												<th class="text-center align-middle" scope="col">ชื่อไฟล์</th>
                                                <th class="text-center align-middle" scope="col">ระยะเวลาใช้งาน</th>
                                                <th class="text-center align-middle" scope="col">ตัวเลือก</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php 
                                                $download_u_q = $connect->query("SELECT * FROM download");
                                                  if($download_u_q->num_rows == 0) {
	                                                 echo '<tr class="table text-center"><td colspan="5"><i class="fa fa-times-circle"></i> ไม่พบข้อมูล</td></tr>';
                                                   }
                                                while($download_u = $download_u_q->fetch_assoc())
                                                        
                                                {
                                                   ?>
                                            <tr>
                                            <td class="text-center align-middle" scope="col"><?php echo $download_u['username']; ?></td>
                                            <td class="text-center align-middle" scope="col"><?php echo $download_u['name']; ?></td>
											<td class="text-center align-middle" scope="col"><?php echo $download_u['link']; ?></td>
                                            <td class="text-center align-middle" scope="col"><?php echo $download_u['timeout']; ?></td>
                                            <td class="text-center align-middle" scope="col"><a href="?page=admin&menu=download&id=<?php echo $download_u['id']; ?>" class="btn btn-sm btn-success"><i></i>แก้ไข</a> <a href="?page=admin&menu=download&download_delete=true&download_id=<?php echo $download_u['id']; ?>" class="btn btn-sm btn-danger"><i></i>ลบ</a></td>    
                                            
                                            </tr>
                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
  </div>
</div>
</div>

<?php
if (isset($_GET['id'])){
$logs = $connect->query("SELECT * FROM download where id = '{$_GET['id']}'");
while($download = $logs->fetch_assoc()){
?>	
<div class="col-md-12" style="margin-top: 5px;">
<div class="card">
<div class="card-header"><i class="fa fa-users"></i>&nbsp;จัดการสินค้า</div>
	<div class="card-body">
         <div id="return"></div>
     <form method="post">
            <input type="hidden" name="shop_update">	
			 <div class="input-group">
				<span class="input-group-text"><i class="fa fa-edit"></i>&nbsp;สินค้า</span>
                  <input type="text" disabled="disabled" class="form-control" name="username" placeholder="<?php echo $download['name'];?>">
			  </div>
			  <div class="input-group" style="margin-top: 15px;">
				<span class="input-group-text"><i class="fa fa-dollar-sign"></i>&nbsp;status</span>
				<select class="form-control" name="link" id="link">
				<option>delete</option>
				</select>
			  </div>			  
			  <br>
			  <button class="btn btn-success btn-block" type="submit"><i class="fa fa-save"></i>&nbsp;บันทึก</button>
			</form>
			
			</div>
                </div>
        </div>
<?php } }?>	