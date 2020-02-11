<!DOCTYPE html>
<?php
$id = $_GET["id"];
$sil = DB::exec('DELETE FROM makale where makale_id=?',array($id));
if ($sil){ ?>

	<div class="iceriksil"> 
	<center><h2>SILME ISLEMI BASARILI!!!</h2>;
	<img src="css/tik2.png"></img></center>
</div> <?php
	header("refresh:2; url=/blog/admin/?do=icerikler");
}
else {
	echo '<div class="iceriksil"> 
	<center><h2>KONU BULUNAMADI....!!!</h2></center>;';
	header("refresh:2; url=/blog/admin/?do=icerikler");
}


?>