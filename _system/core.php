<?php
session_start();
//error_reporting();
include dirname( __file__ ).("/setting.php");
function createSalt($length)
{
	srand(date("s")); 
	$chars = "abcdefghigklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; 
	$ret_str = ""; 
	$num = strlen($chars); 
	for($i=0;$i<$length;$i++)
	{ 
		$ret_str.= $chars[rand()%$num];
	} 
	return $ret_str;
}
function hashPassword($orgPassword)
{
	$salt = createSalt(16);
	$hashedPassword = "\$sha1846GH7yH001WSC10\$".$salt."\$".hash('md5',hash('md5',$orgPassword).$salt);
	return $hashedPassword;
}
function checkPassword($nickname,$password)
{
    include dirname( __file__ ).("/setting.php");
 //ติดต่อฐานข้อมูล MySQL
$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
$select_db = mysqli_select_db($con, $db_name);

	$a = mysqli_query($con,"SELECT password FROM member where username = '$nickname'");
	if(mysqli_num_rows($a) == 1)
	{
		$password_info = mysqli_fetch_array($a);
		$sha_info = explode("$",$password_info[0]);
	}
	else return false;
	if($sha_info[1] === "sha1846GH7yH001WSC10")
	{
		$salt = $sha_info[2];
		$md5_password = hash('md5', $password);
		$md5_password .= $sha_info[2];;
		if(strcasecmp(trim($sha_info[3]),hash('md5', $md5_password)) == 0) return true;
		else return false;
	}
}
function DisplayMSG($function,$title,$msg,$reload){
	global $url;
	if($reload == 'true') {
		$data = exit("<script>$function('$title', '$msg', 'true');setTimeout(function(){ location.href = \"$url\"; }, 2500);</script>");
	}else {
	$data = exit("<script>$function('$title', '$msg', 'false');</script>");
	}
	return $data;
}
function DisplayMSG_REG($function,$title,$msg,$reload){
	if($reload == 'true') {
		$data = exit("<script>$function('$title', '$msg', 'true');setTimeout(function(){ location.href = \"$url\"; }, 700);</script>");
	}else {
	$data = exit("<script>$function('$title', '$msg', 'false');</script>");
	}
	return $data;
}
function DisplayMSG_LOGINADMIN($function,$title,$msg,$reload){
	if($reload == 'true') {
		$data = exit("<script>$function('$title', '$msg', 'true');setTimeout(function(){ location.href = \"$url\"; }, 700);</script>");
	}else {
	$data = exit("<script>$function('$title', '$msg', 'false');</script>");
	}
	return $data;
}
function iDisplayMSG($function,$title,$msg,$reload,$url){
	if(empty($url)) {
		$url = "..";
	}else {
		$url = $url;
	}
	if($function == 'isuccess' || $function == 'ierror') {
		if($reload == 'true') {
			$data = "<script>$function('$title', '$msg', 'true', '$url');setTimeout(function(){ location.href = \"$url\"; }, 2500);</script>";
		}else {
			$data = "<script>$function('$title', '$msg', 'false','');</script>";
		}
	}else {
		if($reload == 'true') {
			$data = "<script>$function('$title', '$msg', 'true');setTimeout(function(){ location.href = \"$url\"; }, 2500);</script>";
		}else {
			$data = "<script>$function('$title', '$msg', 'false');</script>";
		}
	}
	echo $data;
}
$months =array( 
			"0"=>"", "1"=>"มกราคม", "2"=>"กุมภาพันธ์", "3"=>"มีนาคม","4"=>"เมษายน","5"=>"พฤษภาคม","6"=>"มิถุนายน", "7"=>"กรกฎาคม","8"=>"สิงหาคม","9"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม"
				  );
function th($time){
	global $months;
		@$th.= date("H",$time);
		@$th.= ":".date("i",$time);
		@$th.= "  วันที่ ".date("j",$time);
		@$th.= " ".$months[date("n",$time)];
		@$th.= " พ.ศ.".(date("Y",$time)+543);
	return $th;
}
function Read($file) {
	$i = file_get_contents($file);
	return $i;
}