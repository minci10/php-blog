<?php
include("../config.php");
session_start();
ob_start();
$data1=$_POST["username"];
$data2=$_POST["password"];

$vericek = DB::query('SELECT * from admin where kullanici_adi = ? and sifre= ?',array($data1, $data2));
$test = $vericek->fetch(PDO::FETCH_ASSOC);

$kadi = $test['kullanici_adi'];
$adminid = $test['admin_id'];
$sifre = $test['sifre'];

if(($_POST["username"]===$kadi) and ($_POST["password"]===$sifre)){
$_SESSION["login"] = "true";
$_SESSION["adminid"] = $adminid;
$_SESSION["user"] = $kadi;
$_SESSION["pass"] = $sifre;
header("Location:kontrol.php");
}else{
	echo'<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
<div class="basarisiz">
<center><h2>KULLANICI ADI VEYA SIFRE YANLIS!!! LUTFEN KULLANICI ADI VE SIFRENIZI DOGRU GIRDIGINIZDEN EMIN OLUNUZ!!!</h2>
<img src="css/carpi.png"></img></center>
</div>
</body>';

header("Refresh: 5; url=admin.php");
}
ob_end_flush();
?>




