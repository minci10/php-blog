<?php

$id = $_GET["id"];


if($id){
	
	$sil = DB::exec('delete from kategoriler where kategori_id=?',array($id));
	if ($sil){ ?>
		<div class="iceriksil"> 
			<center><h2>SILME ISLEMI BASARILI...</h2><img src="css/tik2.png"></img></center>;
			
		 </div> <?php
		header("refresh: 2; url=/blog/admin/?do=kategoriler");
		
	}
	else {
		echo '<h2>Silme islemi basarisiz...</h2>';
		header("refresh: 2; url=/blog/admin/?do=kategoriler");
	}
	
	
}
else {
	echo 'id bulunamadi..';
}
?>


