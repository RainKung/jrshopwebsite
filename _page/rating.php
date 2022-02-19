 <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <br>	
            
            <div class="row">
                <div class="col-md-4 mt-3">
                    <center>
                        <h5 style="font-weight: bold;"> การเติมเงินล่าสุด ( ลำดับ 1-10 )</h5>
                    </center>
                     <?php
                        $sql_last_m = 'SELECT * FROM topup ORDER BY id DESC LIMIT 10';
                        $query_last_m = $connect->query($sql_last_m);
                    ?>					
                    <table class="table mt-3">
                        <thead class="thead">
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">ผู้ใช้</th>
                                <th scope="col">จำนวน</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: #fbfbfb;">
                    <?php
                      while($list_topup = $query_last_m->fetch_assoc()) {
                    ?>						
                        <tr>						
                        <td>
						<h5 class="m-0">#</h5>
					    </td>  
                        <td>
						<h5 class="m-0"><?php echo $list_topup['username']; ?></h5>
					    </td>       
                        <td>
						<h5 class="m-0"><?php echo number_format($list_topup['amount'],2); ?>฿</h5>
					    </td>               
						</tr>
					  <?php } ?>	
                        </tbody>
                    </table>
                </div>


                <div class="col-md-4 mt-3">
                    <center>
                        <h5 style="font-weight: bold;"> อันดับเติมเงินสูงสุด ( ลำดับ 1-10 )</h5>
                    </center>
                     <?php					 
                        $sql_list = 'SELECT * FROM member ORDER BY topup DESC LIMIT 10';
                        $query_list = $connect->query($sql_list);
                    ?>						
                    <table class="table mt-3">
                        <thead class="thead">
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">ผู้ใช้</th>
                                <th scope="col">จำนวนเงิน</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: #fbfbfb;"> 
                    <?php
                      while($list = $query_list->fetch_assoc()) {
                    ?>							
                        <tr>
                        <td>
						<h5 class="m-0">#</h5>
					    </td>  
                        <td>
						<h5 class="m-0"><?php echo $list['username']; ?></h5>
					    </td>       
                        <td>
						<h5 class="m-0"><?php echo $list['topup']; ?></h5>
					    </td>               
						</tr>
					<?php } ?> 							
						</tbody>
                    </table>
                </div>
                <div class="col-md-4 mt-3">
                    <center>
                        <h5 style="font-weight: bold;"> การซื้อสินค้าล่าสุด ( ลำดับ 1-10 )</h5>
                    </center>
                     <?php					 
                        $sql_stock_m = "SELECT * FROM log_buy ORDER BY id DESC LIMIT 10";
                        $query_stock_m = $connect->query($sql_stock_m);
                    ?>					
                    <table class="table mt-3">
                        <thead class="thead">
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">ผู้ใช้</th>
                                <th scope="col">ไอดีสินค้า</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: #fbfbfb;">
                    <?php
                      while($list_stock = $query_stock_m->fetch_assoc()) {
                    ?>							
                        <tr>
                        <td>
						<h5 class="m-0">#</h5>
					    </td>  
                        <td>
						<h5 class="m-0"><?php echo $list_stock['user']; ?></h5>
					    </td>       
                        <td>
						<h5 class="m-0"><?php echo $list_stock['type']; ?></h5>
					    </td>               
						</tr>
					<?php } ?> 	
                    </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>