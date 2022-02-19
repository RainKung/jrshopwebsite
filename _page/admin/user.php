<div class="col-md-12" style="margin-top: 5px;">
<div class="card">
<div class="card-header"><i class="fa fa-users"></i>&nbsp;จัดการผู้ใช้</div>
	<div class="card-body">
            <center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-adduser"><i class="fa fa-user-plus"></i> เพิ่มผู้ใช้</button></center><p></p>
            <div id="return"></div>
	<?php
		if (isset($_GET['ucode'])){
$logs = $connect->query("SELECT * FROM member where id = '{$_GET['ucode']}'");

while($g1 = $logs->fetch_assoc()) {
$g['id'] = $g1['id'];							
$g['username'] = $g1['username'];
$g['point'] = $g1['point'];
$g['rank'] = $g1['rank'];
$g['active'] = $g1['active']; }


if(isset($_POST['user_update'])){
        $update_member = $connect->query("UPDATE member SET rank = '".$_POST['rank']."',active = '".$_POST['active']."',point = '".$_POST['point']."' WHERE username = '".$g['username']."'");

       iDisplayMSG('isuccess','Success Saveed','เปลี่ยนแปลงข้อมูลสำเร็จ','true',''.$config['www'].'/admin/user');	
    }
?>
		 <center>
		 <div>
<form method="post">
	
			 <div class="input-group">
				<span class="input-group-text"><i class="fa fa-edit"></i>&nbsp;ชื่อผู้ใช้</span>
                                <input type="text" disabled="disabled" class="form-control" value="<?php echo $g['username'];?>" name="username" placeholder="ชื่อผู้ใช้">
			  </div>
			  <div class="input-group" style="margin-top: 15px;">
				<span class="input-group-text"><i class="fa fa-dollar-sign"></i>&nbsp;พ้อยท์</span>
				<input type="text" class="form-control" value="<?php echo $g['point'];?>" name="point" placeholder="พ้อยท์">
			  </div>
			  <div class="input-group" style="margin-top: 15px;">
				<span class="input-group-text"><i class="fa fa-dollar-sign"></i>&nbsp;แรงค์</span>
				<input type="text" class="form-control" value="<?php echo $g['rank'];?>" name="rank" placeholder="rank">
			  </div>
			  <div class="input-group" style="margin-top: 15px;">
				<select class="form-control" name="active" id="active">
					<option <?php if($g['active'] == "true"){echo "selected";} ?> value="true">เปิดใช้งานได้</option>
					<option <?php if($g['active'] == "false"){echo "selected";} ?> value="false">เปิดใช้งานไม่ได้</option>
				</select>
			  </div>
			  <br>
			  <input type="hidden" name="user_update">
              <input type="hidden" name="username" value="<?php echo $g['id']; ?>">
			  <button class="btn btn-success" type="submit"><i class="fa fa-save"></i>&nbsp;บันทึก</button>
			  <a class="btn btn-danger" href="<?php echo $config['www']; ?>/?page=admin&menu=user&member_delete=true&member_id=<?php echo $g['id']; ?>"><i class="fas fa-trash-alt"></i>&nbsp;ลบผู้ใช้</a>
			  <a class="btn btn-warning" href="<?php echo $config['www']; ?>/admin/user"><i class="fa fa-home"></i>&nbsp;กลับ</a>
			  
			</form></div><hr>

	<?php } ?>
			<table class="table table-default table-striped table-condenseds">
				<thead>
					<tr>
						<th style="background-color: #FFF;" class="text-center text-dark">ชื่อผู้ใช้</th>
						<th style="background-color: #FFF;" class="text-center text-dark">พ้อยท์</th>
						<th style="background-color: #FFF;" class="text-center text-dark">แรงค์</th>
						<th style="background-color: #FFF;" class="text-center text-dark">สถานะบัญชี</th>
						<th style="background-color: #FFF;" class="text-center text-dark">จัดการ</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$logs = $connect->query('SELECT * FROM member');
						$i = '1';
						while($log = $logs->fetch_assoc()) {
                                                    if ($log['active'] == "true"){
								$bs = "<div class='badge badge-success' style='font-size: 17px;'>เปิดใช้งานได้</div>";
							}elseif ($log['active'] == "false"){
								$bs = "<div class='badge badge-danger' style='font-size: 17px;'>เปิดใช้งานไม่ได้</div>";
							}
					echo '
						<tr>
							<td class="text-center">'.$log['username'].'</td>
							<td class="text-center">'.$log['point'].'</td>
							<td class="text-center">'.$log['rank'].'</td>
                            <td class="text-center"><span>'.$bs.'</span></td>
							<td class="text-center"><a class="btn btn-warning" href="'.$config['www'].'/admin/user/'.$log['id'].'"><i class="fa fa-cog"></i>&nbsp;จัดการ</a></td>
						</tr>
						';
						$i++;
						}
						?>
				</tbody>
			</table>
	</div>
</div>
</div>
<div class="modal fade" id="modal-adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> เพิ่มผู้ใช้</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
      <div class="modal-body">
          <form method="post">
              <div class="input-group">
				<span class="input-group-text"><i class="fa fa-edit"></i>&nbsp;ชื่อผู้ใช้</span>
                                <input type="text" class="form-control" name="username" placeholder="ชื่อผู้ใช้">
			  </div>
			  <div class="input-group" style="margin-top: 15px;">
				<span class="input-group-text"><i class="fa fa-dollar-sign"></i>&nbsp;พ้อยท์</span>
				<input type="text" class="form-control" name="point" placeholder="พ้อยท์">
			  </div>
			  <div class="input-group" style="margin-top: 15px;">
				<span class="input-group-text"><i class="fa fa-lock"></i>&nbsp;รหัสผ่าน</span>
                                <input type="text" class="form-control" name="password" placeholder="รหัสผ่าน">
			  </div>
			  <div class="input-group" style="margin-top: 15px;">
				<select class="form-control" name="status" id="status">
					<option value="true">เปิดใช้งานได้</option>
					<option value="false">เปิดใช้งานไม่ได้</option>
				</select>
                          </div><p></p>
                          <input type="hidden" name="add_user">
              <button type="submit" class="btn btn-success btn-block">เพิ่ม User</button>
              
          </form>
          </div>
      </div>
    </div>
  </div>
