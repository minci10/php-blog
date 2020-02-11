<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<?php
include("../config.php");
session_start();

function devami($text)
{
    if(strlen($text) > 100)
	{
		$text = substr($text,0,500);
	/*$a = 1300;
	if ($text[$a]!='.')
	{while ($text[$a]!='.') 
	{$a++;
		$text = substr($text,0,$a);
		
		}
		
	
	}*/}
	
		
    
    return $text;
}

if($_POST) {
	
	 if ($_FILES["resim"]["type"]=="image/jpeg") {
		 $name = $_FILES["resim"]["name"];
	 }
	 else {
		 echo '<div class="iceriksil"><center><h2>RESIM EKLENMEDI!!!</h2><img src="css/buyutec.png"></img></center></div>';
	 }
	 if ($_POST["baslik"])
	 {
		 $baslik = $_POST["baslik"];
	 }
	 if ($_POST["icerik"])
	 {
		 $icerikk = $_POST["icerik"];
		 $icerik = trim(strip_tags($icerikk));
		 $kisa = devami($icerik);
	 }
	 if ($_POST["kat"])
	 {
		 $kategori = $_POST["kat"];
	 }
	 if(isset($_SESSION['adminid']))
{
    $admin=$_SESSION["adminid"];
}






if ($_POST["baslik"] && $_POST["icerik"] && $_POST["kat"] && $admin!== "" && $name!=="" )
{
	$id = DB::insert('INSERT into makale(makale_baslik,makale_kisa,makale_uzun,makale_yazan,makale_kategori,resim,Onay) VALUES (?,?,?,?,?,?,1)',array($baslik,$kisa,$icerik,$admin,$kategori,$name));
if ($id>0)
{echo '<div class="iceriksil"> <center><h2>MAKALE EKLEME ISLEMI BASARILI...<h2><img src="css/tik2.png"></img></center></div>';}
header("Refresh: 2; url=/blog/admin/?do=icerikler");
}
else {
	echo '<div class="iceriksil"><center><h2>LUTFEN BOS ALANLARI DOLDURDUKTAN SONRA TEKRAR DENEYINIZ...<h2></center></div>';
	header("Refresh: 2; url=/blog/admin/?do=icerikler");
}


}








?>