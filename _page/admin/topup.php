 <?php 
$wallet_q = $connect->query("SELECT * FROM wallet_account");
    $wallet = $wallet_q->fetch_assoc();
	
    if(isset($_POST['topup_update']))
    {
        $update_member = $connect->query("UPDATE topup SET status = '".$_POST['status']."' where id = '{$_GET['id']}'");

       iDisplayMSG('isuccess','Success Saveed','เปลี่ยนแปลงข้อมูลสำเร็จ','true',''.$config['www'].'/admin/topup');	
    }elseif(isset($_POST['edit_topup']))	
?>
 <div id="return"></div>
 <div class="col-md-12" style="margin-top: 5px;">
<div class="card">
<div class="card-header"><i class="fa fa-users"></i>&nbsp;ตั้งค่าเบอร์ซองอั่งเปา Wallet</div>
	<div class="card-body">
                            <form method="post">
                                <input class="form-control" type="hidden" name="setting" value="topup">
                                        <div class="form-group">
										<label>เบอร์ Wallet</label>
                                            <input class="form-control" id="phone" type="text" name="phone" placeholder="เบอร์ Wallet" value="<?php echo $wallet['phone'] ?>">
                                        </div>
								        <div class="form-group">
										<label>โบนัสคูณ</label>
                                            <input class="form-control" id="mutiple" type="text" name="mutiple" placeholder="โบนัสคูณ" value="<?php echo $wallet['mutiple'] ?>">
                                        </div>		
                                </div>
                                <button type="submit" class="btn btn-success btn-block">ตั้งค่า</button>
                            </form>
			</div>
                </div>
        </div>

  <div class="col-12" style="margin-top: 5px;">
            <div class="col-sm-12 p-1">
            <div class="card">
		<div class="card-header"><i class="fa fa-money"></i>&nbsp;ยืนยันการเติมเงิน</div>
			<div class="card-body">
			                                    <table class="table stylish-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" scope="col">#</th>
                                                <th class="text-center align-middle" scope="col">เลขอ้างอิง</th>
												<th class="text-center align-middle" scope="col">ช่องทางการเติมเงิน</th>
                                                <th class="text-center align-middle" scope="col">จำนวนเงิน</th>
                                                <th class="text-center align-middle" scope="col">สถานะ</th>
												<th class="text-center align-middle" scope="col">เวลา</th>
												<th class="text-center align-middle" scope="col">ชื่อผู้เติมเงิน</th>
                                            </tr>
<tbody>
					<?php 
                                        $logs = $connect->query('SELECT * FROM topup order by id desc');
                                                  if($logs->num_rows == 0) {
	                                                 echo '<tr class="table text-center"><td colspan="5"><i class="fa fa-times-circle"></i> ไม่พบข้อมูล</td></tr>';
                                                   }										
                                                while($log = $logs->fetch_assoc())
                                                {
							if($log['status'] == 'success') {
							$log['status'] = '<center><i class="fa fa-check-circle" style="color: #00C851;"> สำเร็จ</i></center>'; 
								}
							elseif($log['status'] == 'failed') {
							$log['status'] = '<center><i class="fa fa-times-circle" style="color: #ff4444;"> ล้มเหลว</i></center>'; 
								}
							else {
							$log['status'] = '<b style="color: #ff6f00"><i class="fa fa-spinner fa-spin"></i> รอตรวจสอบ</b>'; }
					echo '
						<tr>
						    <td class="text-center align-middle">#</td>
							<td class="text-center align-middle">'.$log['TW_id'].'</td>
							<td class="text-center align-middle">'.$log['type'].'</td>
							<td class="text-center align-middle">'.$log['amount'].'</td>
							<td class="text-center align-middle">'.$log['status'].'</td>
							<td class="text-center align-middle">'.$log['date'].'</td>
							<td class="text-center align-middle" scope="col"><a href="'.$config['www'].'/admin/topup/'.$log['id'].'">'.$log['username'].'</a></td> 
						</tr>
						';
						}
						?>
				</tbody>
                                    </table>			
			</div>
                </div>
        </div>
	</div>

<?php
if(isset($_GET['id']) && $_GET['id'] != NULL && $_GET['id'] != "")
{
$topup_id = $_GET['id'];
$logs = $connect->query('SELECT * FROM topup WHERE id = "'.$topup_id.'"');
while($topup = $logs->fetch_assoc()){
?>	
<div class="col-md-12" style="margin-top: 5px;">
<div class="card">
<div class="card-header"><i class="fa fa-users"></i>&nbsp;จัดการเติมเงิน</div>
	<div class="card-body">
         <div id="return"></div>
     <form method="post">
            <input type="hidden" name="topup_update">	
			 <div class="input-group">
				<span class="input-group-text"><i class="fa fa-edit"></i>&nbsp;ชื่อผู้ใช้</span>
                  <input type="text" disabled="disabled" class="form-control" name="username" placeholder="<?php echo $topup['username'];?>">
			  </div>
			  <div class="input-group" style="margin-top: 15px;">
				<span class="input-group-text"><i class="fa fa-dollar-sign"></i>&nbsp;status</span>
				<select class="form-control" name="status" id="status">
				<option>success</option>
				<option>failed</option>
				</select>
			  </div>
			  <div class="input-group" style="margin-top: 15px;">
				<span class="input-group-text"><i class="fa fa-lock"></i>&nbsp;TW_id</span>
              <input type="text" disabled="disabled" class="form-control" name="TW_id" placeholder="<?php echo $topup['TW_id'];?>">
			  </div>
			  <div class="input-group" style="margin-top: 15px;">
				<span class="input-group-text"><i class="fa fa-lock"></i>&nbsp;amount</span>
              <input type="text" disabled="disabled" class="form-control" name="amount" placeholder="<?php echo $topup['amount'];?>">
			  </div>			  
			  <br>
			  <button class="btn btn-success btn-block" type="submit"><i class="fa fa-save"></i>&nbsp;บันทึก</button>
			</form>
			
			</div>
                </div>
        </div>
<?php } }?>	
   