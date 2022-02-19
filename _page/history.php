<?php if(!$_SESSION['username']){ ?>
<script>window.location.href = "./"</script>
<?php }else{ ?> 
 <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-history"></i> สินค้า</h5>
                            <br>
	                       <table class="table table-bordered" id="historys" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" scope="col">id</th>
                                                <th class="text-center align-middle" scope="col">ประเภท</th>
                                                <th class="text-center align-middle" scope="col">วันที่ทำการซื้อ</th>
												<th class="text-center align-middle" scope="col">รายละเอียด</th>
                                            </tr>
                                        </thead>
				<tbody>
					<?php 								  
                      $query1 = $connect->query("SELECT * FROM stock WHERE owner = '".$_SESSION["username"]."'");
                              while($product = $query1->fetch_assoc()){
					  $query2 = $connect->query("SELECT * FROM products WHERE id = '".$product['type']."'");
                              while($row = $query2->fetch_assoc()){			  
					echo '
						<tr>
						    <td class="text-center align-middle">'.$product['id'].'</td>
							<td class="text-center align-middle">'.$row['name'].'</td>
							  <td class="text-center align-middle">'.$product['date'].'</td>
							<td class="text-center align-middle"><a href="#" class="btn btn-info" data-toggle="modal" data-target="#shop'.$product['id'].'">รายละเอียด</a></td>
						</tr>
						';
					}
			    }						
				?>
				</tbody>
                                    </table>									
                                </div>
</div>
</div>
<div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-history"></i> ประวัติการเติมเงิน</h5>
                            <br>
                                    <table class="table table-bordered" id="historys" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" scope="col">#</th>
                                                <th class="text-center align-middle" scope="col">ช่องทางการเติมเงิน</th>
                                                <th class="text-center align-middle" scope="col">จำนวนเงิน</th>
												<th class="text-center align-middle" scope="col">เวลา</th>
												<th class="text-center align-middle" scope="col">สถานะ</th>
                                            </tr>
                                        </thead>
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
							<td class="text-center align-middle">'.$log['date'].'</td> 
							<td class="text-center align-middle">'.$log['status'].'</td>
						</tr>
						';
						}
						?>
				</tbody>
                                    </table>
</div>
</div>
<?php 								  
$query1 = $connect->query("SELECT * FROM stock WHERE owner = '".$_SESSION["username"]."'");
    while($product = $query1->fetch_assoc()){
$query2 = $connect->query("SELECT * FROM products WHERE id = '".$product['type']."'");
    while($row = $query2->fetch_assoc()){	

    if ($row['pattern'] == 'usr:eml:psw') {
        $order_preset = $product['contents'];
        $array =  explode(':', $order_preset);
        $order['user'] = array_values($array)[0];
        $order['email'] = array_values($array)[1];
        $order['pass'] = array_values($array)[2];
        $order_contents = '<b>Email</b>: '.$order['email'].'<br>';
        $order_contents .= '<b>Username</b>: '.$order['user'].'<br>';
        $order_contents .= '<b>Password</b>: '.$order['pass'];
    }elseif ($row['pattern'] == 'usr:psw') {
        $order_preset = $product['contents'];
        $array =  explode(':', $order_preset);
        $order['user'] = array_values($array)[0];
        $order['pass'] = array_values($array)[1];
        $order_contents = '<b>Username</b>: '.$order['user'].'<br>';
        $order_contents .= '<b>Password</b>: '.$order['pass'];
    }elseif ($row['pattern'] == 'eml:psw') {
        $order_preset = $product['contents'];
        $array =  explode(':', $order_preset);
        $order['email'] = array_values($array)[0];
        $order['pass'] = array_values($array)[1];
        $order_contents = '<b>Email</b>: '.$order['email'].'<br>';
        $order_contents .= '<b>Password</b>: '.$order['pass'];
    }elseif ($row['pattern'] == 'code') {
        $order_contents = '<b>Code</b>: ' . $product['contents'];
    }elseif ($row['pattern'] == 'normaltext') {
        $order_contents = $product['contents'];
    }elseif ($row['pattern']  == "eml:psw:prf:pin") {
        $order_contents = $product['contents'];
        $array =  explode(':', $order_preset);
        $order['email'] = array_values($array)[0];
        $order['pass'] = array_values($array)[1];
        $order['profile'] = array_values($array)[2];
        $order['pin'] = array_values($array)[3];
        $order_contents = '<b>Email</b>: '.$order['email'].'<br>';
        $order_contents = '<b>Password</b>: '.$order['pass'].'<br>';
        $order_contents = '<b>Profile</b>: '.$order['profile'].'<br>';
        $order_contents = '<b>Pin</b>: '.$order['pin'];
    }		   
?>
  <div class="modal fade" id="shop<?php echo $product['id']; ?>" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
	<h5 class="modal-title"><?php echo $row['name']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b>ข้อมูลสินค้าที่สั่งซื้อ</b><br>
        <?php echo $order_contents ?>
        <br><br><b>คำแนะนำในการใช้งานสินค้า</b><br>
	<?php echo $row['help'] ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
</div>
</div>
</div>
<?php } } }?>
<script type="text/javascript">
    $(document).ready(function() {
    $('#historys').DataTable();
    });
</script>  

