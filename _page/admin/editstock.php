<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 
  <div class="col-12" style="margin-top: 5px;">
            <div class="col-sm-12 p-1">
            <div class="card">
		<div class="card-header">&nbsp;แก้ใขสต๊อก</div>
			<div class="card-body">
			                    <table id="stock" class="table stylish-table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="text-center align-middle" scope="col">#</th>
                                                <th class="text-center align-middle" scope="col">ประเภท</th>
												<th class="text-center align-middle" scope="col">ชื่อผู้สั่งซื้อ</th>
                                                <th class="text-center align-middle" scope="col">วันที่ถูกซื้อ</th>
                                                <th class="text-center align-middle" scope="col">จัดการ</th>
                                            </tr>
					</thead>
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
							echo '<tr><td class="text-center align-middle">'.$row['id'].'</td><td class="text-center align-middle">'.$product_name.'</td><td class="text-center align-middle">'.$row['owner'].'</td><td class="text-center align-middle">'.$row['date'].'</td><td class="text-center align-middle"><a class="btn btn-sm btn-block btn-danger" onclick="editstock('.$row['id'].')">Edit/Delete</a></td></tr>';
						}
				    }
					?>
				</table>
                                    </table>			
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
<script type="text/javascript">
    $(document).ready(function() {
    $('#stock').DataTable();
    });
</script>  

