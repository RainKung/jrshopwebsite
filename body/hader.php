<?php	
$config_q = $connect->query("SELECT * FROM config");
 $config = $config_q->fetch_assoc();
 ?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo $config['title']; ?></title>
<link rel="icon" href="<?php echo $config['icon']; ?>" type="image/x-icon">
<link rel="shortcut icon" href="<?php echo $config['icon']; ?>" type="image/x-icon">

  <meta name="keywords" content="ซื้อIDแท้Minecraft, จำหน่ายIDแท้Minecraft, ไอดีแท้, ไอดีแท้มายคราฟ, ไอดีแท้มือ2, ไอดีแท้มือสอง, ไอดีแท้ราคาถูก, ร้านขายไอดีแท้, จำหน่ายไอดีแท้, ไอดีแท้มือ 1,IDแท้มือ2, IDมายคราฟ, IDแท้, IDมายคราฟมือ2, IDแท้ราคาถูก, ขายไอดีแท้, ซื้อไอดีแท้, mcshopid,ซื้อไอแท้ minecraft,ร้านขายไอดีแท้,ไอดีแท้มายคราฟ,ซื้อIDแท้Minecraft,ซื้อไอดีแท้Minecraft,เว็บขายIDแท้มายคราฟ,เว็บขายไอแท้มายคราฟ,id แท้ minecraft,เกมแท้มายคราฟ,เกมส์แท้Minecraft,ร้านขายไอดีแท้minecraft,ไอดีแท้มายคราฟฟรี,McShopID,ผ้าคลุม Optifine,ซื้อIDแท้,Key Minecraft Windown10,Garena Shells,ซื้อบัตรการีน่าเซล์,Garena Shells ราคาถูก,ซื้อบัตรการีน่า Garena Shells, ShopID.me, ซื้อNetflix Premium, ซื้อSpotify Premium, ซื้อPornhun Premium, ซื้อNordVPN Premium, ร้านขายไอดีเกมราคาถูก, บริการขายไอดี, สุ่มไอดีแท้ฟรี, ไอดีแท้มายคราฟรี, idminecraftฟรี, ระบบสุ่มไอดีแท้ฟรี, มายคราฟฟรี, สุ่มไอดีแท้minecraftฟรี, minecraftfree, freeminecraft, idแท้ฟรี, idแท้minecraftฟรี, idแท้มายคราฟรี,giftcode ราคาถูก,ซื้อgiftcode มายคราฟ,giftcode minecraftราคาถูก,กิ๊ฟโค้ดมายคราฟราคาถูก,กิ๊ฟโค้ดมายคราฟมือ1,กิ๊ฟโค้ดมือ1,giftcodeมือ1" />
  <meta name="description" content="JRShop บริการจำหน่าย ID แท้ Minecraft ราคาถูก เริ่มต้นเพียง 10บาท ซื้อง่ายได้จริง100% และยังมี ระบบสุ่มไอดีแท้Minecraftฟรี" />
  <meta name="author" content="JRShop เว็บไชต์จำหน่ายไอดีเกม และอื่นๆๆ">
  <meta name="robots" content="index, follow" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://jrshop.tk/" />
  <meta property="og:title" content="JRShop เว็บไชต์จำหน่ายไอดีเกม และอื่นๆๆ" />
  <meta property="og:description" content="JRShop บริการจำหน่าย ID แท้ Minecraft ราคาถูก เริ่มต้นเพียง 10บาท ซื้อง่ายได้จริง100% " />
  <meta property="og:image" content="<?php echo $config['icon']; ?>" />
  
  <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Kanit&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="<?php echo $config['www']; ?>/_dist/js/jquery.min.js"></script>
  <script src="<?php echo $config['www']; ?>/_dist/js/bootstrap.min.js"></script>
  <script src="<?php echo $config['www']; ?>/_dist/js/sweetalert.min.js"></script>
  <script src="<?php echo $config['www']; ?>/_dist/js/datatables.min.js"></script>
  <script src="<?php echo $config['www']; ?>/assets/js/i.js"></script>

		<link rel="stylesheet" href="<?php echo $config['www']; ?>/assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
		<link rel="stylesheet" href="<?php echo $config['www']; ?>/assets/fonts/fontawesome-all.min.css">
		<link rel="stylesheet" href="<?php echo $config['www']; ?>/assets/fonts/ionicons.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
		<script src="<?php echo $config['www']; ?>/assets/js/jquery.min.js"></script>
		<script src="<?php echo $config['www']; ?>/assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo $config['www']; ?>/assets/js/bs-animation.js"></script>
		<script src="<?php echo $config['www']; ?>/assets/js/theme.js"></script>
		<script src="<?php echo $config['www']; ?>/assets/js/jquery.ddslick.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script type="text/javascript" src="<?php echo $config['www']; ?>/assets/js/particles.js"></script>
		<link rel="stylesheet" href="<?php echo $config['www']; ?>/assets/css/bng.css">
    <script type="text/javascript" src="<?php echo $config['www']; ?>/assets/bng.js"></script>	
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3434283461008831" crossorigin="anonymous"></script>
<style type="text/css">

body {
	font-family: 'Kanit', sans-serif;
	background: #eaf0f4;
}
a:link {
  text-decoration: none;
}

a:visited {
  text-decoration: none;
}

a:hover {
  text-decoration: none;
}

a:active {
  text-decoration: none;
}
	::-webkit-scrollbar {
		width: 6px;
		background-color: #f5f5f5;
		border-radius: 12px;
	}
	::-webkit-scrollbar-thumb {
		background-color: #403838;
		border-radius: 12px;
	}
	::-webkit-scrollbar-thumb:hover {
		background: #211d1d;
		border-radius: 12px;
	}
			.top-body {
			padding-top: 90px;
		}

		@media (max-width: 991px){
			.manu-nav {
				top: 40;
			}
		}
	</style> 
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v3.3'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>	