<?php
    $player_q = $connect->query("SELECT * FROM member where username = '".$_SESSION['username']."'");
    $user = $player_q->fetch_assoc();
?>
<div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-user"></i>&nbsp;ข้อมูลส่วน <?php echo $_SESSION['username']; ?> (ID : <?php echo $_SESSION['id']; ?>)</h5>
                            <br>						
				<div class="card-body">
					<div class="container">
						<div class="row">
						  <div id="return"></div>
							<div class="col mt-2">
								<div class="card">
									<div class="card-header">
										<center>เปลียนรหัสผ่าน</center>
									</div>
									<div class="card-body">
										<form method="post">
											<div class="form-group col">
											 <label for="subject">รหัสผ่านเก่า</label>
											 <input class="form-control item" id="password_old" type="password" name="password_old" required="">
										    </div>
											
											<div class="form-group col">
											 <label for="subject">รหัสผ่านใหม่</label>
											 <input class="form-control item" id="password_new" type="password" name="password_new" required="">
											</div>	
											
											<div class="form-group col">
											 <label for="subject">ยืนยันรหัสผ่านใหม่</label>
											 <input class="form-control item" type="password" id="repassword_new" name="repassword_new" required="">
											</div>
											
				                            <div class="text-left mt-1"><i class="fa fa-shield"></i> <img src="_page/captcha.php"></div>
				                              <div class="col-md-12 mb-2">
				                              <input class="form-control" style="height: 40px;margin-top: 7px;" name="captcha" id="captcha" type="text" placeholder="Captcha" required="">
				                            </div>							
											<br>
											<a id="btn" href="javascript:password();" class="btn btn-success">เปลี่ยนรหัสผ่าน</a>
										</form>	
									</div>
								</div>
							</div>
							<div class="col mt-2">
								<div class="card">
									<div class="card-header">
										<center>เปลียนอีเมล</center>
									</div>
									<div class="card-body">
									    <form class="shadow-none" method="post" action="" id="changeemail">
											<div class="form-group col">
											 <label for="subject">อีเมล</label>
											 <input class="form-control item" type="email" id="email" name="email" required="" value="<?=$user['email']?>">
											</div>
											<button class="btn btn-success" type="submit">เปลี่ยนอีเมล</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>							
  </div>
</div>