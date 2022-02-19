<?php if(!$_SESSION['username']){ ?>
<br>
<div class="container mt-3">
  <div class="col-lg-7 mx-auto">
    <div class="card">
  <div class="card-body">
	<h4 class="text-muted"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</h4> 
	<hr> 
		<div id="return"></div>
       <form method="post">
						<div class="col-md-12 mb-2">
				       <label for="username"><i class="fas fa-user"></i>&nbsp;ชื่อผู้ใช้</label>
					   <input type="text" id="username" class="form-control" name="username" placeholder="Username ที่ท่านต้องการ" required="">
			           </div>
						<div class="col-md-12 mb-2">
				       <label for="password"><i class="fas fa-lock"></i>&nbsp;รหัสผ่าน</label>
				       <input name="password" id="password" class="form-control" type="password" placeholder="Password ที่ท่านต้องการ" required="">
			           </div>
						<div class="col-md-12 mb-2">
				       <label for="repassword"><i class="fas fa-lock"></i>&nbsp;ยืนยันรหัสผ่าน</label>
				       <input name="repassword" id="repassword" class="form-control" type="password" placeholder="RePassword ยืนยันรหัสผ่านอีกครั้ง" required="">
			           </div>					   
    <div class="text-left mt-1"><i class="fa fa-shield"></i> <img src="_page/captcha.php"></div>
				<div class="col-md-12 mb-2">
				<input class="form-control" style="height: 40px;margin-top: 7px;" name="captcha" id="captcha" type="text" placeholder="Captcha" required="">
				</div>

<div class="container-login100-form-btn">		  
            <a id="btn" href="javascript:register();" class="btn btn-outline-primary btn-block" type="button" id="button1" disabled"><i class="fa fa-users"></i>&nbsp;สมัครสมาชิก</a>
	</div>
        </form>
</div>
</div>
</div>	
</div>
<br>
<?php }else{ ?> 
<script>window.location.href = "./"</script>
<?php } ?>		