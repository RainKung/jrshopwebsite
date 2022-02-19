<?php if($website['random2'] == "true"){ ?>
 <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fas fa-gift"></i>  รับไอดีแท้ฟรี</h5>
                            <hr>
                  <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">	
			                    <center>
			                    <img src="" width="150">							
                                <div class="h5 my-2">สุ่มไอดีแท้ฟรี</div>
			                    </center>							
							   <hr> 
                               <form name="" method="POST">
                                <div class="form-group">
				                <?php if ($_SESSION['username'] == NULL) {?>
	                            <button disabled="" type="button" class="btn btn-outline-danger btn-block"><i class="fa fa-times-circle"></i>  เข้าสู่ระบบก่อน!</button>
	                            <?php }else{ ?>
                                <button disabled type="button" class="btn btn-outline-danger btn-block" onclick="">สุ่มไอดีแท้ ปิดปรับปรุง</button>
                                <?php } ?>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>	 	
 </div>
</div>
<?php if(!$_SESSION['username']){ ?>

<?php }else{ ?>
<div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fas fa-history"></i>  ประวัติการสุ่มไอดีแท้ฟรี</h5>
                            <br>
                <table class="table table-bordered" id="historys" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center align-middle" scope="col">id</th>
							<th class="text-center align-middle" scope="col">รายการ</th>
                            <th class="text-center align-middle" scope="col">E-mail/Password</th>
                            <th class="text-center align-middle" scope="col">สถานะID</th>
							<th class="text-center align-middle" scope="col">เวลา</th>
                        </tr>
                    </thead>
				       <tbody>
					   
				       </tbody>
                    </table>							
 </div>
</div>
<?php } ?>
<?php }else{ ?>
<script>window.location.href = "./"</script>
<?php } ?>