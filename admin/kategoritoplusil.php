<?php

$id = $_GET["id"];


if($id)
{
	
	$sil = DB::exec('delete from kategoriler where kategori_id=?',array($id));
	if($sil){
		$alt = DB::exec('delete from kategoriler where kategori_ustikiid=?',array($id));
		if($alt){ ?> <div class="iceriksil"> 
			<center><h2>SECILEN KATEGORI VE ALT KATEGORILERI SILINDI...</h2><img src="css/tik2.png"></img></center>;
			</div>
		<?php
				header("refresh: 2; url=/blog/admin/?do=kategoriler");}
				else {
					?> <div class="iceriksil"> 
			<center><h2>ANA KATEGORI SILINDI...</h2><img src="css/tik2.png"></img></center>;
			</div>
		<?php
		
				header("refresh: 2; url=/blog/admin/?do=kategoriler");}
				
		
		
	}
	else{
		echo '<h2>Kategori silinirken hata olustu..</h2>';
		header("refresh: 2; url=/blog/admin/?do=kategoriler");
	}
	
}
else {
	echo 'id bulunamadi..';
	header("refresh: 2; url=/blog/admin/?do=kategoriler");
}

?>
