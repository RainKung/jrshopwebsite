
<br>
<?php if($website['video'] == "true"){ ?>
 <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-video"></i>&nbsp;วิดีโอ</h5>
                            <br>
	  <iframe iframe height="315" style="width:100%;" src='https://www.youtube.com/embed/<?php echo $website['videourl']; ?> 'frameborder="0" allowfullscreen=""></iframe>
 </div>
</div>
<?php }else{ } ?>
 <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-newspaper"></i>&nbsp; ข่าวสารเเละอัพเดท</h5>
                            <br>
 <div class="container">
 	    	<?php
	    		$query_announce = $connect->query('SELECT * FROM news ORDER BY id DESC LIMIT 5');
		        	$i =0 ;
		         	while($news = $query_announce->fetch_assoc())
		          	{
		            ?>
 			<table class="table table-striped table-bordered" >
				<tbody>
						<tr>
						 <td><span class="badge badge-info">News</span>&nbsp;<?php echo $news['info']; ?></td>
					     <td class="text-right">
		                	<?php echo $news['date']; ?>
		                </td>
						</tr>
				</tbody>
			</table>	
		          <?php
		        }
		    ?>
</div>
</div>
</div>

 <!--div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-newspaper"></i>&nbsp; ประวัติการซื้อสินค้าล่าสุด</h5>
                            <br>
						<table class="table stylish-table">
							<thead>
							<tr>
								<th class="text-center align-middle" scope="col">ID</th>
								<th class="text-center align-middle" scope="col">ชื่อสินค้า</th>
								<th class="text-center align-middle" scope="col">ราคา</th>
								<th class="text-center align-middle" scope="col">ผู้ซื้อ</th>
							</tr>
							</thead>
                                        <tbody>
                                              <?php 
                                                $download_u_q = $connect->query("SELECT * FROM stock ORDER BY id DESC LIMIT 4");
                                                 if($download_u_q->num_rows == 0) {
	                                                echo '<tr class="table text-center"><td colspan="5"><i class="fa fa-times-circle"></i> ไม่พบข้อมูล</td></tr>';
                                                  }
                                                while($download_u = $download_u_q->fetch_assoc())
                                                        
                                                {
                                                    $i++;
                                                   ?>
                                            <tr>
                                            <td class="text-center align-middle"><?php echo $download_u['id']; ?></td>
                                            <td class="text-center align-middle"><?php echo $download_u['name']; ?></td>
                                            <td class="text-center align-middle"><?php echo number_format($download_u['price'],2); ?></td>
                                            <td class="text-center align-middle"><?php echo $download_u['username']; ?></td>
                                                
                                            </tr>
                                                <?php } ?>
                                        </tbody>
						</table>
					</div>
				</div-->

 <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-newspaper"></i>&nbsp; ประวัติการซื้อสินค้าล่าสุด</h5>
                            <br>
						<table class="table stylish-table">
							<thead>
							<tr>
								<th class="text-center align-middle" scope="col">ID</th>
								<th class="text-center align-middle" scope="col">ชื่อสินค้า</th>
								<th class="text-center align-middle" scope="col">ราคา</th>
								<th class="text-center align-middle" scope="col">ผู้ซื้อ</th>
							</tr>
							</thead>
                                        <tbody>
                                              <?php   
                                                $download_u_q = $connect->query("SELECT * FROM log_buy ORDER BY id DESC LIMIT 4");
                                                 if($download_u_q->num_rows == 0) {
	                                                echo '<tr class="table text-center"><td colspan="5"><i class="fa fa-times-circle"></i> ไม่พบข้อมูล</td></tr>';
                                                  }
                                                while($download_u = $download_u_q->fetch_assoc())
                                                        
                                                {
                                                    $i++;
											    $sql_products = $connect->query('SELECT * FROM products WHERE id = "'.$download_u['type'].'"');
                                                  while($products = mysqli_fetch_array($sql_products)){													
                                                   ?>
                                            <tr>
                                            <td class="text-center align-middle"><?php echo $download_u['id']; ?></td>
                                            <td class="text-center align-middle"><?php echo $products['name']; ?></td>
                                            <td class="text-center align-middle"><?php echo number_format($products['price'],2); ?></td>
                                            <td class="text-center align-middle"><?php echo $download_u['user']; ?></td>
                                                
                                            </tr>
											   <?php } ?>
                                                <?php } ?>
                                        </tbody>
						</table>
					</div>
				</div>

  <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fas fa-chart-line"></i>&nbsp; ข้อมูลเว็บไซต์</h5>
                            <br>
					    <div class="row">

<div class="col-md-4">
<div class="card card-body">
<div class="d-flex align-items-center">
<i class="fas fa-chart-bar fa-4x" aria-hidden=""></i><h4 class="pl-4"> ยอดเข้าชม<br><small>&nbsp;<?php echo number_format($count); ?>&nbsp; ครั้ง</small></h4> 
</div></div></div>

<div class="col-md-4">
<div class="card card-body">
<div class="d-flex align-items-center">
<i class="fas fa-shopping-basket fa-4x" aria-hidden=""></i><h4 class="pl-4"> พร้อมจำหน่าย<br><small>&nbsp;<?php echo $stock_row; ?> รายการ</small></h4> 
</div></div></div>

<div class="col-md-4">
<div class="card card-body">
<div class="d-flex align-items-center">
<i class="fa fa-shopping-cart fa-4x" aria-hidden=""></i><h4 class="pl-4"> จำหน่ายแล้ว<br><small>&nbsp;<?php echo $stock1_row; ?> ชิ้น</small></h4> 
</div></div></div>

<div class="col-md-4">
<div class="card card-body">
<div class="d-flex align-items-center">
<i class="fa fa-shopping-cart fa-4x" aria-hidden=""></i><h4 class="pl-4"> สินค้าทั้งหมดในระบบ<br><small>&nbsp;<?php echo $product_row; ?> รายการ</small></h4> 
</div></div></div>

<div class="col-md-4">
<div class="card card-body">
<div class="d-flex align-items-center">
<i class="fa fa-user fa-4x" aria-hidden=""></i><h4 class="pl-4"> สมาชิก<br><small>&nbsp;<?php echo $user; ?> คน</small></h4> 
</div></div></div>

</div>
</div>
</div>