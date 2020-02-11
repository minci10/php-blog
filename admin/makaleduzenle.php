<!DOCTYPE html>
<?php






$id = $_GET["id"];


if($_POST) {
	
	
		if ($_FILES["resim"]["type"]=="image/jpeg") {
		 $name = $_FILES["resim"]["name"];
	 }
	 
	
	
	 
	 if ($_POST["baslik"])
	 {
		 $baslik = $_POST["baslik"];
	 }
	 if ($_POST["icerik"])
	 {
		 $icerikk = $_POST["icerik"];
		 $icerik = trim(strip_tags($icerikk));
		
	 }
	 if ($_POST["kat"])
	 {
		 $kategori = $_POST["kat"];
	 }
	 if ($_POST["yazan"])
	 {
		 $admin = $_POST["yazan"];
	 }
	  if ($_POST["kisa"])
	 {
		 $kisa = $_POST["kisa"];
	 }
	 if ($_POST["onay"])
	 {
		 $onay = $_POST["onay"];
	 }
}
	


function devami($textt,$abc)
{
    if(strlen($textt) > 100)
	{
		$text = substr($textt,0,$abc);
	/*$a = 1300;
	if ($text[$a]!='.')
	{while ($text[$a]!='.') 
	{$a++;
		$text = substr($text,0,$a);
		
		}
		
	
	}*/}
	return $text;
}

	$kisametin = devami($icerik,$kisa);
	
if (isset($name))
{
	$guncelle = DB::exec('UPDATE makale set makale_uzun=? , makale_baslik=? , resim=? , makale_kategori=? , makale_kisa=? , makale_yazan=? , Onay=? where makale_id=?',array($icerik,$baslik,$name,$kategori,$kisametin,$admin,$onay,$id));

}
else {
	$guncelle2 = DB::exec('UPDATE makale set makale_uzun=? , makale_baslik=? , makale_kategori=? , makale_kisa=? , makale_yazan=? , Onay=? where makale_id=?',array($icerik,$baslik,$kategori,$kisametin,$admin,$onay,$id));

}
		
	
	

if (isset($guncelle) || isset($guncelle2)){ ?>

	<div class="iceriksil"> 
	<center><h2>DUZENLEME ISLEMI BASARILI!!!</h2>;
	<img src="css/tik2.png"></img></center>
</div> <?php
	header("refresh:2; url=/blog/admin/?do=icerikler");
}
else {
	echo '<div class="iceriksil">
	<center><h2>KONU BULUNAMADI....!!!</h2></center>';
	header("refresh:2; url=/blog/admin/?do=icerikler");
}


?>