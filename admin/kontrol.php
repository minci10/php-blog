<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>


<?php
include("../config.php");
session_start();
if(!isset($_SESSION["login"])){
echo "GIRIS BASARISIZ!!! BU SAYFAYI GORUNTULEMEK ICIN LUTFEN GIRIS YAPINIZ!!!";
}else{
	?> <div class="basarili"> 
	<center><h2>GIRIS BASARILI!!!    YONLENDIRILIYORSUNUZ !!!!</h2>;
	<img src="css/tik.png"></img></center>
</div>
<?php
	


header("refresh: 1; url=/blog/admin/");
}
?>
</body>