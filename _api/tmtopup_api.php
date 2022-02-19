<?php
require_once('./_system/setting.php');
	$config_q = $connect->query("SELECT * FROM config");
    $config = $config_q->fetch_assoc();
define('API_PASSKEY', $config['tmtopup_api_passkey']);
if($_SERVER['REMOTE_ADDR'] == '203.146.127.115' && isset($_GET['request']))
{
	$aes = new Crypt_AES();
	$aes->setKey(API_PASSKEY);
	$_GET['request'] = base64_decode(strtr($_GET['request'], '-_,', '+/='));
	$_GET['request'] = $aes->decrypt($_GET['request']);
	if($_GET['request'] != false)
	{
		parse_str($_GET['request'],$request);
		$request['Ref1'] = base64_decode($request['Ref1']);

		/* Code | Begin */
		if(!is_numeric($request['Ref1'])){exit('SEC ALERT: Ref1 IS NOT Numeric');}
		$chk_u = $connect->query("SELECT username FROM member WHERE id = :id",array(':id'=>$request['Ref1']));
		if($chk_u->rowCount() == 1)
		{
			$user = $chk_u->fetch();
			$add_val_q = query("SELECT point FROM config_topup WHERE truemoney = :amo",array(':amo'=>$request['cardcard_amount']));
			if($add_val_q->rowCount() != 1)
			{
				$num = 0;
			}
			else
			{
				$add_val = $add_val_q->fetch();
				$num = $add_val['point'];
			}
			$connect->query("UPDATE member SET point = point + '".$num."', topup = topup + '".$request['cardcard_amount']."' WHERE id = :id",array(':id'=>$request['Ref1']));
			$connect->query("INSERT INTO topup (TW_id,amount,status,date,type,username) VALUES (:id,'".$num."','success','".time()."','บัตรเติมเงินสด Truemoney','".$user['username']."')",array(':id'=>$request['Ref1']));
			exit('TRUE | USERNAME :'.$user['username'].'(id: '.$request['Ref1'].')');
		}
		else
		{
			exit('FALSE UNKNOW UID('.$request['Ref1'].')');
		}
		/* Code | End */

	}
	else
	{
		 exit('ERROR|INVALID_PASSKEY');
	}
}
else
{
	exit('ERROR|ACCESS_DENIED');
	
}
?>