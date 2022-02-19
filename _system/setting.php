<?php
  date_default_timezone_set("Asia/Bangkok");
  $db_host = 'localhost';
  $db_user = 'jrshop';
  $db_pass = 'zGd3r#83';
  $db_name = 'jrshop';
  
  
  $connect = new mysqli($db_host,$db_user,$db_pass,$db_name);
  $connect->query('SET names utf8'); 
	if($connect->connect_errno){
	exit($connect->connect_error);
	}
?>
