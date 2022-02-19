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
            <div class="form-group">
                <label><i class="fas fa-user"></i> ชื่อผู้ใช้</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="ID ของท่าน" required>
            </div>
            <div class="form-group">
                <label><i class="fas fa-lock"></i> รหัสผ่าน</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password ของท่าน" required>
            </div>
            <a id="btn" href="javascript:login();" class="btn btn-outline-primary btn-block"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</a>
        </form>
</div>
</div>
</div>	
</div>
<br>
<?php }else{ ?> 
<script>window.location.href = "./"</script>
<?php } ?>		
