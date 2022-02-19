<?php
if(isset($_POST['stock'])){
		$req_type = $_POST['inputItemType'];
		$req_data = $_POST['inputItemData'];
		$allData = preg_split('/\r\n|\r|\n/', $req_data);
		if (array_values($allData)[0] == '<batch>') {
			foreach ($allData as $myData) {
				if ($myData != '<batch>') {
					$q1 = $connect->query('INSERT INTO stock (type, contents, owner, date) VALUES ("'.$req_type.'" , "'.$myData.'", "", NULL)');
				}
			}if (!$q1) {
				iDisplayMSG('error','error','ไม่สามารถเชื่อมต่อกับฐานข้อมูลได้','true');
			}else{
				iDisplayMSG('isuccess','Success Insert','เพิ่มข้อมูลสำเร็จ','true',''.$config['www'].'/admin/stock');
			}
		}else{
			$q1 = $connect->query('INSERT INTO stock (type, contents, owner, date) VALUES ("'.$req_type.'" , "'.$req_data.'", "", NULL)');
			if (!$q1) {
				iDisplayMSG('error','error','ไม่สามารถเชื่อมต่อกับฐานข้อมูลได้','true');
			}else{
				iDisplayMSG('isuccess','Success Insert','เพิ่มข้อมูลสำเร็จ','true',''.$config['www'].'/admin/stock');
			}	
		}
	}
?>
<div class="col-md-12" style="margin-top: 5px;">
<div class="card">
  <div class="card-header">
    <i class="fa fa-plus"></i> เพิ่มสต๊อกสินค้า
  </div>
<div class="card-body">
    <div id="return"></div>
<div class="row justify-content-md-center">
<div class="col-sm-5 p-1">
<div class="card" >
<form method="post">
<input class="form-control" type="hidden" name="stock">
		<div class="modal-body">
			<div class="form-group">
				<label>ประเภทสินค้า</label>
				<br>
				<select class="select-search" name="inputItemType" id="inputItemType">
					<optgroup label="โปรดเลือกวิธีการจัดส่ง">
						<?php 
                         $query2 = $connect->query("SELECT * FROM products");
                            while($row = $query2->fetch_assoc()){
							?>
							<option value="<?php echo $row['id']?>"><?php echo $row['name']?> - รูปแบบ <?php echo $row['pattern']?></option>
						<?php } ?>
					</optgroup>
				</select>
			</div>
			<div class="form-group">
				<label>ข้อมูลของสินค้าชิ้นนี้</label>
				<textarea type="text" id="inputItemData" name="inputItemData" class="form-control" placeholder="..เขียนข้อมูลที่ส่งให้ลูกค้าตรงนี้.." rows="5" required=""></textarea>
				<label class="mt-2 text-muted">รู้หรือไม่! ท่านสามารถเพิ่มสต๊อคหลายๆชิ้นได้โดยการพิมพ์ว่า &lt;batch&gt; ไว้ในบรรทัดแรก และบรรทัดที่เหลือให้ใส่ข้อมูลที่จะส่งให้ลูกค้า <a href="#" onclick="$('#inputItemData').val('<batch>\n' + $('#inputItemData').val()); $('#inputItemData').focus();">ตัวอย่าง</a></label>
				</div>
				<button class="btn btn-success btn-block" type="submit">เพิ่มสต๊อก</button>
				 </form>
			</div>
			
</div>
</div>
</div>
</div>
</div>
  <div class="col-12" style="margin-top: 5px;">
            <div class="col-sm-12 p-1">
            <div class="card">
		<div class="card-header">&nbsp;แก้ใขสต๊อก</div>
			<div class="card-body">
			                    <table id="stock" class="table stylish-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" scope="col">#</th>
                                                <th class="text-center align-middle" scope="col">ประเภท</th>
												<th class="text-center align-middle" scope="col">ชื่อผู้สั่งซื้อ</th>
                                                <th class="text-center align-middle" scope="col">วันที่ถูกซื้อ</th>
                                                <th class="text-center align-middle" scope="col">จัดการ</th>
                                            </tr>
					</thead>
					<tbody>
					<?php 
                      $query1 = $connect->query("SELECT * FROM stock");
                              while($row = $query1->fetch_assoc()){
					  $query2 = $connect->query("SELECT * FROM products WHERE id= '".$row['type']."'");
                              while($data = $query2->fetch_assoc()){
							{
								$product_name = $data['name'];
							}
							if (empty($row['owner'])) {
								$row['owner'] = 'ยังไม่ถูกซื้อ';
							}
							if (empty($row['date'])) {
								$row['date'] = 'ยังไม่ถูกซื้อ';
							}
							echo '
							<tr>
							<td class="text-center align-middle">'.$row['id'].'</td>
							<td class="text-center align-middle">'.$product_name.'</td>
							<td class="text-center align-middle">'.$row['owner'].'</td>
							<td class="text-center align-middle">'.$row['date'].'</td>
							<td class="text-center align-middle"><a href="#" class="btn btn-sm btn-block btn-danger" data-toggle="modal" data-target="#stock'.$row['id'].'">Edit/Delete</a></td>
							</tr>';
						}
					}	
					?>
					</tbody>
				</table>			
			</div>
                </div>
        </div>
	</div>
	</div>
<style type="text/css">
	@media only screen and (max-width: 600px) {
		.sdsdsd{
			overflow-x:auto;
		}
	}
</style>	
<?php 	
$xx = $connect->query("SELECT * FROM stock");
 while($result1 = $xx->fetch_assoc()){
$item_id = $result1['id'];
$item_type = $result1['type'];
$item_contents = $result1['contents'];
$item_owner = $result1['owner'];
$item_date = $result1['date'];

    if(isset($_POST['stock_update']))
    {
        $update_stock = $connect->query("UPDATE stock SET inputItemData = '".$_POST['inputItemData']."', inputItemType = '".$_POST['inputItemType']."' where id = '".$item_id."'");

       iDisplayMSG('isuccess','Success Saveed','เปลี่ยนแปลงข้อมูลสำเร็จ','true',''.$config['www'].'/admin/stock');	
    }elseif(isset($_POST['edit_stock']))
?>	
  <div class="modal fade" id="stock<?php echo $item_id ?>" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">	
      <div class="modal-header">
        <h5 class="modal-title">แก้ใข id : <?php echo $item_id ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <div id="return"></div>
  <form method="post">
    <input type="hidden" name="stock_update"> 	  
      <div class="modal-body">
        <div class="form-group">
          <label>ประเภทสินค้า</label>
          <br>
          <select class="form-control" id="inputItemType" name="inputItemType" required>
           <option value="none">โปรดเลือกสินค้าที่ต้องการจะเพิ่ม</option>
           <?php
          $xxx = $connect->query("SELECT * FROM products");
           while($row = $xxx->fetch_assoc()) {
            if ($item_type == $row['id']) { $is_sel = 'selected'; } else { $is_sel = ''; }
            echo '<option value="'.$row['id'].'"'.$is_sel.'>'.$row['name'].' - ราคา '.$row['price'].' บาท'.' - รูปแบบ '.$row['pattern'].'</option>';
          }
          ?>
        </select>
        <div class="form-group">
          <label for="inputItemData">ข้อมูลของสินค้าชิ้นนี้</label>
          <textarea type="text" id="inputItemData" name="inputItemData" class="form-control" placeholder="..เขียนข้อมูลที่ส่งให้ลูกค้าตรงนี้.." rows="5" required><?php echo $result1['contents']; ?></textarea>
        </div>
        <?php 
        if (!empty($result1['owner'])) {
         ?>
         <div class="form-group"><label for="">ผู้ซื้อสินค้าชิ้นนี้</label><input type="text" id="" name="" class="form-control" placeholder="" value="<?=$result1['owner']?>" disabled></input></div>
         <div class="form-group"><label for="">วันที่สินค้าถูกสั่งซื้อ</label><input type="text" id="" name="" class="form-control" placeholder="" value="<?=$result1['date']?>" disabled></input></div>
       <?php } ?>
     </div>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-danger">ลบ</button>
    <button class="btn btn-success" type="submit">บันทึก</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>
</form>  
</div>
</div>
</div>
 <?php } ?>