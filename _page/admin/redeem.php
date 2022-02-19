 <?php
		if(isset($_POST['ac'])) {
			   if(empty($_POST['code']) || empty($_POST['price'])) {
		iDisplayMSG('error','Error Empty','กรุณาอย่าเว้นช่องว่าง','false','');
	}else {
		$c_query = $connect->query('SELECT * FROM redeem WHERE code = "'.$_POST['code'].'"');
		
		$code_num = $c_query->num_rows;
		if ($code_num){
			iDisplayMSG('error','Error Already','โค้ดนี้ซ้ำกับโค้ดอื่น','false','');
		}else {
	$query = $connect->query("INSERT INTO redeem (code, price) VALUES ('{$_POST['code']}', '{$_POST['price']}')");
	
	iDisplayMSG('isuccess','Success Add','เพิ่มคูปองเรียบร้อย !!','true',''.$config['www'].'/admin/redeem');
}
	}
		}

if(isset($_GET['delete_itemp']))
    {
        $delete_itemp = $connect->query("DELETE FROM gift_code WHERE id = '".$_GET['id']."'");

        iDisplayMSG('isuccess','Success Delete','ลบข้อมูลสำเร็จ','true',''.$config['www'].'/admin/redeem');	
    }		
?>
 <div id="return"></div>
 <div class="col-md-12" style="margin-top: 5px;">
<div class="card">
<div class="card-header"><i class="fa fa-users"></i>&nbsp;เพิ่มคูปอง</div>
	<div class="card-body">
<form method="post" action="">
			  
			  <label>คีย์</label>
			  <input type="text" name="code" id="code" class="form-control" placeholder="คีย์">
			   <label>จำนวนเงิน</label>
			    <input type="text" name="price" id="price" class="form-control" placeholder="จำนวนเงิน">
			  <br>
			  <input type="hidden" name="ac">
			  <button class="btn btn-info" type="submit"><i class="fa fa-plus"></i>&nbsp;ยืนยัน</button>
			  
			</form></div>
			</div>
                </div>
        </div>

 <div class="col-12" style="margin-top: 5px;">
            <div class="card">
		<div class="card-header"><i class="fa fa-money"></i>&nbsp;จัดการคูปอง</div>
			<div class="card-body">
			                                    <table class="table stylish-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" scope="col">#</th>
                                                <th class="text-center align-middle" scope="col">code</th>
												<th class="text-center align-middle" scope="col">ยอดเงิน</th>
                                                <th class="text-center align-middle" scope="col">limits</th>
												<th class="text-center align-middle" scope="col">used</th>
                                                <th class="text-center align-middle" scope="col">ลบ</th>
                                            </tr>
<tbody>
					<?php 
                                        $logs = $connect->query('SELECT * FROM gift_code order by id desc');
                                                  if($logs->num_rows == 0) {
	                                                 echo '<tr class="table text-center"><td colspan="5"><i class="fa fa-times-circle"></i> ไม่พบข้อมูล</td></tr>';
                                                   }	
                                       while($log = $logs->fetch_assoc()){
					echo '
						<tr>
						    <td class="text-center align-middle">#</td>
							<td class="text-center align-middle">'.$log['code_id'].'</td>
							<td class="text-center align-middle">'.$log['reward'].'</td>
							<td class="text-center align-middle">'.$log['limits'].'</td>
							<td class="text-center align-middle">'.$log['used'].'</td>
							<td class="text-center align-middle"><a class="btn btn-danger" href="'.$config['www'].'/?page=admin&menu=redeem&delete_itemp=true&id='.$log['id'].';"><i class="fas fa-trash-alt"></i></a></td>
						</tr>
						';
						}
						?>
				</tbody>
                                    </table>			
			</div>
                </div>
	</div>		