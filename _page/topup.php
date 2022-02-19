<?php
		$sql_wallet = 'SELECT * FROM wallet_account';
			$query_wallet = $connect->query($sql_wallet);
				$wallet = $query_wallet->fetch_assoc();
		
	if(isset($_POST['bank'])) {
			   if(empty($_POST['amount']) || empty($_POST['date'])) {
		iDisplayMSG('error','เกิดข้อผิดพลาด', 'กรุณาอย่าเว้นช่องว่าง','true','?page=topup');
	}else {
	$type = ('เติมเงินด้วย bank');
    $TW_id = ('ไม่มี Ref');
    $time_date = date("d-m-Y H:i");
	$query = $connect->query('INSERT INTO topup (TW_id,amount,date,type,username) VALUES ("'.$TW_id.'", "'.$_POST['amount'].'","'.$time_date.'", "'.$type.'", "'.$_SESSION['username'].'")');
	iDisplayMSG('isuccess','กำลังตรวจสอบ','คุณได้ทำการเติมเงินด้วยการโอน bank !!','true','?page=topup');
   }
     }	 
if(isset($_POST['redeem'])){
	if (empty($_POST['code'])){
		iDisplayMSG('error','เกิดข้อผิดพลาด', 'กรุณาอย่าเว้นช่องว่าง','true','?page=topup');
 	}else if(isset($_POST['code'])){
		$time_date = date("d-m-Y H:i");
		$code = $connect->real_escape_string($_POST['code']);
        $query2 = $connect->query("SELECT * FROM member WHERE username='".$_SESSION['username']."'");
        $player = $query2->fetch_assoc();
		$query = $connect->query('SELECT * FROM redeem WHERE code = "'.$code.'" and status = "UnRedeem" ');
		$code_check = $query->num_rows;
		$cq = $query->fetch_assoc();
		if ($code_check == 1){
			$pt = $player['point'] + $cq['price'];
			$su = $connect->query("UPDATE redeem SET status = 'Redeem' WHERE id = '".$cq['id']."'");
			$up = $connect->query("UPDATE `member` SET `point` = '$pt' WHERE `id` = ".$_SESSION['id']);
			$connect->query("INSERT INTO `topup` (`id`, `type`, `TW_id`, `date`, `amount`, `username`, `status`) VALUES (NULL, 'เติมเงินด้วยคูปอง', '".$_POST['code']."', '".$time_date."', '".$cq['price']."', '".$_SESSION['username']."', 'success'); ");
			if ($su || $up){
				iDisplayMSG('success','Redeem Success !!!', 'แลกคูปองเรียบร้อยแล้ว คุณได้รับ '.$cq['price'].' บาท','true','?page=topup');
			}
		}else {
			iDisplayMSG('error','เกิดข้อผิดพลาด', ' โค้ดนี้ถูกใช้ไปเเล้ว หรือ กรอกผิด','true','?page=topup');
		}
	}
}


function buildHeaders ($array) {
    $headers = array();
    foreach ($array as $key => $value) {
        $headers[] = $key.": ".$value;
    }
    return $headers;
}
if (isset($_POST["topup"])) {

    $_POST["ref_id"] = explode("https://gift.truemoney.com/campaign/?v=", $_POST["ref_id"])[1];
    $cURLConnection = curl_init();

    curl_setopt($cURLConnection, CURLOPT_URL, "https://gift.truemoney.com/campaign/vouchers/$_POST[ref_id]/verify?mobile=$wallet[phone]");
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $phoneList = curl_exec($cURLConnection);
    curl_close($cURLConnection);

    $json = json_decode($phoneList);
    if ($json->status->code == "VOUCHER_NOT_FOUND") {
        $_SESSION["status"] = false;
        echo '</body><script> swal("ผิดพลาด","ไม่พบซองอั่งเปานี้!!","error").then(function() {window.location = "";});</script>';
    } else if($json->status->code == "TARGET_USER_REDEEMED" || $json->status->code == "VOUCHER_OUT_OF_STOCK") {
        $_SESSION["status"] = false;
        echo '</body><script> swal("ผิดพลาด","ซองอั่งเปานี้ถูกใช้ไปแล้ว!!","error").then(function() {window.location = "";});</script>';
    } else if($json->status->code == "SUCCESS") {
        $postRequest = array(
            "mobile" => "$wallet[phone]",
            "voucher_hash" => "$_POST[ref_id]"
        );
        $cURLConnection2 = curl_init('https://gift.truemoney.com/campaign/vouchers/'. $_POST["ref_id"] .'/redeem');
        curl_setopt($cURLConnection2, CURLOPT_POSTFIELDS, json_encode($postRequest));
        curl_setopt_array($cURLConnection2, array(
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_PROXY => false,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_HTTPHEADER => buildHeaders(array("Content-Type" => "application/json"))
		));
        $apiResponse2 = curl_exec($cURLConnection2);
        curl_close($cURLConnection2);
        $json2 = json_decode($apiResponse2);
        if($json2->status->code != "SUCCESS") {
            $_SESSION["status"] = false;
            //$_SESSION["msg"] = "ไม่สามารถเติมได้!";
            echo '</body><script> swal("ผิดพลาด","ไม่สามารถเติมเงินได้กรุณาติดต่อแอดมิน!!","error").then(function() {window.location = "";});</script>';
        } else {
            $value = intval($json2->data->voucher->amount_baht);
            $valueEx = $value*$wallet['mutiple'];
            $_SESSION["status"] = true;
			$type = ('เติมเงินด้วย ซองของขวัญ');
			$time_date = date("d-m-Y G:i:s");
			$status = ('success');
            //$_SESSION["msg"] = "เติมเงินสำเร็จจำนวน $value!";
            echo '</body><script> swal("เติมเงินเรียบร้อย","[ '.$_SESSION['username'].' ] จำนวน '.$value.' ได้รับ '.$valueEx.' พ้อย","success").then(function() {window.location = "";});</script>';
            $connect->query("UPDATE `member` SET `point`=`point`+$valueEx WHERE `username`='$_SESSION[username]'");
			$connect->query("UPDATE `member` SET `topup`=`topup`+$value WHERE `username`='$_SESSION[username]'");
            $connect->query("INSERT INTO topup (TW_id,amount,status,date,type,username) VALUES ('$_POST[ref_id]', '$value', '$status', '$time_date', '$type', '$_SESSION[username]'); "); //save log
        }
    }else{
        echo '</body><script> swal("ผิดพลาด","ไม่พบซองอังเปาหรือลิงค์ไม่ถูกต้อง!","error").then(function() {window.location = "";});</script>';
    }
}

if(isset($_GET['truemoney'])) { 
?> 
 <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-wallet"></i> การเติมเงิน</h5>
                            <br>
<script type="text/javascript" src='https://www.tmtopup.com/topup/3rdTopup.php?uid=<?php echo $config['tmtopup_uid'] ?>'></script>							
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="h5 my-2">TrueMoney <small>(19.4%)</small></div>
                                <hr>
								<div id="return"></div>		
                                <form name="" method="POST"> 
                                    <div class="form-group">
                                        <label><b>รหัสบัตรทรู 14 หลัก</b></label>
									<?php if ($_SESSION['username'] == NULL) {?>
									    <input disabled type="text" class="form-control" placeholder="รหัสบัตรทรู 14 หลัก" required>
									<?php }else{ ?>
                                         <input disabled type="text" name="tmn_password" id="tmn_password" class="form-control" placeholder="รหัสบัตรทรู 14 หลัก">
                                    <?php } ?>
                                    </div>

                                    <div class="form-group">
									<?php if ($_SESSION['username'] == NULL) {?>
	                                  <button disabled="" type="button" class="btn btn-outline-danger btn-block"><i class="fa fa-times-circle"></i>  เข้าสู่ระบบก่อน!</button>
	                                <?php }else{ ?>
                                       <input name="ref1" type="hidden" id="ref1" value="<?php echo $_SESSION['id']; ?>" />
                                       <input name="ref2" type="hidden" id="ref2" value="TOPUP_SYSTEM" />
                                       <input name="ref3" type="hidden" id="ref3" value="webshop" />
                                       <button disabled type="button" class="btn btn-outline-danger btn-block" onclick="submit_tmnc()">ปิดปรับปรุง</button>
                                    <?php } ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>							
 </div>
</div>								
<?php
}else{
if(isset($_GET['giftcode_topup'])) { 
?> 
<div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-wallet"></i> การเติมเงิน</h5>
                            <br>				
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="h5 my-2">คูปองเงินสด <small>(ไม่มีค่าธรรมเนียม)</small></div>
                                <hr>
								<div id="return"></div>		
                                <form name="redeem" method="POST"> 
                                    <div class="form-group">
                                        <label><b>คูปองเงินสด</b></label>
									<?php if ($_SESSION['username'] == NULL) {?>
									    <input disabled type="text" class="form-control" placeholder="รหัสคูปองที่ท่านได้มา" required>
									<?php }else{ ?>
                                         <input type="text" name="code" id="code" class="form-control" placeholder="รหัสคูปองที่ท่านได้มา">
                                    <?php } ?>
                                    </div>

                                    <div class="form-group">
									<?php if ($_SESSION['username'] == NULL) {?>
	                                  <button disabled="" type="button" class="btn btn-outline-danger btn-block"><i class="fa fa-times-circle"></i>  เข้าสู่ระบบก่อน!</button>
	                                <?php }else{ ?>
									  <button type="submit" name="redeem" class="btn btn-outline-success btn-block"><i class="fa fa-check-circle fa-lg"></i>&nbsp; ตรวจสอบ</button>
                                    <?php } ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>							
  </div>
</div>							
<?php
}else{
if(isset($_GET['truewalletgift'])) { 
?>   
 <div class="card border-0 shadow mb-4">
                        <div class="card-body">
                            <h5 class="m-0"><i class="fa fa-wallet"></i> การเติมเงิน</h5>
                            <br>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
			<center>
			<img src="https://gift.truemoney.com/campaign/static/media/gift_small.be16b489.png" width="150">							
                 <div class="h5 my-2">ซองของขวัญวอเลต <small>(ไม่มีค่าธรรมเนียม)</small></div>
			</center>					
                                <hr>
                                <form name="topup" method="POST"> 

                                    <div class="form-group">
                                        <label><b>ลิ้งค์ซองของขวัญ</b></label>
									<?php if ($_SESSION['username'] == NULL) {?>
									    <input disabled type="text" name="ref_id" class="form-control" placeholder="https://gift.truemoney.com/campaign/?v=..." required>
									<?php }else{ ?>
                                         <input type="text" name="ref_id" class="form-control" placeholder="https://gift.truemoney.com/campaign/?v=..." required>
                                    <?php } ?>
                                    </div>

                                    <div class="form-group">
									<?php if ($_SESSION['username'] == NULL) {?>
	                                  <button disabled="" type="button" class="btn btn-outline-danger btn-block"><i class="fa fa-times-circle"></i>  เข้าสู่ระบบก่อน!</button>
	                                <?php }else{ ?>
	                                  <button type="submit" name="topup" class="btn btn-outline-success btn-block"><i class="fa fa-check-circle fa-lg"></i>&nbsp; ยืนยันการเติมเงิน</button>
                                    <?php } ?>
                                    </div>
                                </form>
								<h5 class="m-0 p-0" align="left" style="color:red">**หากเติมเงินแล้ว<u>ไม่สามารถคืนเงินได้</u>โปรดตรวจสอบให้ดีก่อนชำระเงิน**</h5>
                            </div>
                        </div>
                    </div>
        </div>	
</div>						
<?php }else{ ?>		
<script>window.location.href = "<?php echo $config['www']; ?>"</script>
<?php } } }?>		