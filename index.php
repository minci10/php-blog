<?php include 'config.php'; 
$katid = isset($_GET['id']) ? $_GET['id'] : '';
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>SEYAHAT BLOGU</title>
	<link rel="stylesheet" href="css/styles.css" />
	<link rel="stylesheet" href="css/reset.css" />
	<link href='https://fonts.googleapis.com/css?family=Aldrich' rel='stylesheet'>
</head>
<body>

	<div class="genel"> 
	
	
	<div class="menu"> 
	<ul><a href="index.php"><img src="images/logo3.png"></a></ul>
	
	<ul><li><a href="/blog/icerik.php?id=1">VIZESIZ ULKELER</a></li></ul>
	
	<?php
	function ikialtkategori($id=0){
		$a = DB::get('SELECT * FROM kategoriler where kategori_ustikiid=? and kategori_ustid is null and kategori_ustikiid>0 order by kategori_id desc',array($id));
		echo '<ul>';
		foreach ($a as $aa) {
			echo '<li>';
			?> <a href="index.php?id=<?php echo $aa->kategori_id;  ?>"> 
			<?php
			echo $aa->kategori_adi;
			echo '</a>';
			echo '</li>';
		}
		echo '</ul>';
	}
	
	function kategori($id=0) {
		
		$a = DB::get('SELECT * FROM kategoriler where kategori_ustid=? order by kategori_id desc',array($id));
		
		echo '<ul>';
		foreach ($a as $aa) {
			echo '<li>';
			
			?> <a href="index.php?id=<?php echo $aa->kategori_id;  ?>"> 
			<?php
			echo $aa->kategori_adi;
			echo '</a>';
			kategori($aa->kategori_id);
			ikialtkategori($aa->kategori_id);
			echo '</li>';	
		}
		echo '</ul>';
	}
	kategori();
	
	
	
	?>
	<ul><li><a href="index.php">ANASAYFA</a></li></ul>
	
	</div>
	
	
	
	
	
	
	<div style="clear:both;"></div>
	<div class="content"> 
<?php
if ($katid)
{ 
$kategorri = DB::getRow('SELECT * from kategoriler where kategori_id=?',array($katid));



	?>
	<div class="sol"> 
	
	
	<?php

	if ($kategorri->kategori_ustikiid == "")
{
	$c = DB::get('SELECT * FROM kategoriler where kategori_ustikiid=?',array($katid));
	if ($c) {
	foreach ($c as $cc)
	{
		$pp = $cc->kategori_id;
		$b = DB::get('SELECT * FROM makale where Onay=1 and (makale_kategori = ? or makale_kategori = ?) order by makale_id desc',array($pp,$katid));
		foreach ($b as $bb) {
?>
	
	<div class="sol2"> 
	<h2><?php echo $bb->makale_baslik; ?></h2>
	<div class="bilgi">kategori : <?php  $ff=$bb->makale_kategori; $x=DB::getVar('SELECT kategori_adi from kategoriler where kategori_id=?',array($ff)); echo $x; ?>  yazan : <?php $cb= $bb->makale_yazan; $k = DB::getVar('SELECT kullanici_adi from admin where admin_id=?',array($cb)); echo $k; ?> okunma : 5 yorum : 3 
	<span style="float:right;">tarih : <?php echo $bb->tarih; ?></span></div>
	<div class="resim"> 
	<img src="images/<?php echo $bb->resim; ?>" alt="" />
	</div>
	<div class="kisayazi">
	<?php echo $bb->makale_kisa; ?>
	</div>
	<div class="devam"> 
	<a href="icerik.php?id=<?php echo $bb->makale_id; ?>">DEVAM</a>
	</div>
	<div style="clear:both;"></div>
	</div>
	
		<?php }  }
	}
	
	else {
		
		$b = DB::get('SELECT * FROM makale where Onay=1 and makale_kategori = ? order by makale_id desc',array($katid));
		foreach ($b as $bb) {
			
			
			
?>
	
	
	<div class="sol2"> 
	<h2><?php echo $bb->makale_baslik; ?></h2>
	<div class="bilgi">kategori : <?php  $ff=$bb->makale_kategori; $x=DB::getVar('SELECT kategori_adi from kategoriler where kategori_id=?',array($ff)); echo $x; ?>  yazan : <?php $cb= $bb->makale_yazan; $k = DB::getVar('SELECT kullanici_adi from admin where admin_id=?',array($cb)); echo $k; ?> okunma : 5 yorum : 3 
	<span style="float:right;">tarih : <?php echo $bb->tarih; ?></span></div>
	<div class="resim"> 
	<img src="images/<?php echo $bb->resim; ?>" alt="" />
	</div>
	<div class="kisayazi">
	<?php echo $bb->makale_kisa; ?>
	</div>
	<div class="devam"> 
	<a href="icerik.php?id=<?php echo $bb->makale_id; ?>">DEVAM</a>
	</div>
	<div style="clear:both;"></div>
	</div>
	
		<?php }  
	}
}


else if ($kategorri->kategori_ustid == "")
{ ?>
	
	
	
		<?php 
		$b = DB::get('SELECT * FROM makale where makale_kategori = ? and Onay=1 order by makale_id desc',array($katid));
		foreach ($b as $bb) {
			
			
			
?>
	
	
	<div class="sol2"> 
	<h2><?php echo $bb->makale_baslik; ?></h2>
	<div class="bilgi">kategori : <?php  $ff=$bb->makale_kategori; $x=DB::getVar('SELECT kategori_adi from kategoriler where kategori_id=?',array($ff)); echo $x; ?>  yazan : <?php $cb= $bb->makale_yazan; $k = DB::getVar('SELECT kullanici_adi from admin where admin_id=?',array($cb)); echo $k; ?> okunma : 5 yorum : 3 
	<span style="float:right;">tarih : <?php echo $bb->tarih; ?></span></div>
	<div class="resim"> 
	<img src="images/<?php echo $bb->resim; ?>" alt="" />
	</div>
	<div class="kisayazi">
	<?php echo $bb->makale_kisa; ?>
	</div>
	<div class="devam"> 
	<a href="icerik.php?id=<?php echo $bb->makale_id; ?>">DEVAM</a>
	</div>
	<div style="clear:both;"></div>
	</div>
	
	
		<?php } 
	
}

else if ($kategorri->kategori_ustid==0 && $kategorri->kategori_ustikiid==0)
{ 
$g = DB::get('SELECT * FROM kategoriler where kategori_ustid=?',array($katid));

foreach ($g as $gg)
{
$gh = $gg->kategori_id;
$c = DB::get('SELECT * FROM kategoriler where kategori_ustikiid=?',array($gh));
	foreach ($c as $cc)
	{
		$pp = $cc->kategori_id;
		$b = DB::get('SELECT * FROM makale where (makale_kategori = ? or makale_kategori = ?) and Onay=1 order by makale_id desc',array($pp,$katid));
		foreach ($b as $bb) {
			
			
			
?>
	
	
	<div class="sol2"> 
	<h2><?php echo $bb->makale_baslik; ?></h2>
	<div class="bilgi">kategori : <?php  $ff=$bb->makale_kategori; $x=DB::getVar('SELECT kategori_adi from kategoriler where kategori_id=?',array($ff)); echo $x; ?>  yazan : <?php $cb= $bb->makale_yazan; $k = DB::getVar('SELECT kullanici_adi from admin where admin_id=?',array($cb)); echo $k; ?> okunma : 5 yorum : 3 
	<span style="float:right;">tarih : <?php echo $bb->tarih; ?></span></div>
	<div class="resim"> 
	<img src="images/<?php echo $bb->resim; ?>" alt="" />
	</div>
	<div class="kisayazi">
	<?php echo $bb->makale_kisa; ?>
	</div>
	<div class="devam"> 
	<a href="icerik.php?id=<?php echo $bb->makale_id; ?>">DEVAM</a>
	</div>
	<div style="clear:both;"></div>
	</div>
	
		<?php } 
	}
	
 } }?>
	
	

		

	
	
	</div>

<?php }
else { ?>
	
	<div class="sol"> 
	
	
	<?php

	
	
	

		
$b = DB::get('SELECT * FROM makale where Onay=1 order by makale_id desc');


		foreach ($b as $bb) {
			
			
			
?>
	
	
	<div class="sol2"> 
	<h2><?php echo $bb->makale_baslik; ?></h2>
	<div class="bilgi">kategori : <?php  $ff=$bb->makale_kategori; $x=DB::getVar('SELECT kategori_adi from kategoriler where kategori_id=?',array($ff)); echo $x; ?>  yazan : <?php $cb= $bb->makale_yazan; $k = DB::getVar('SELECT kullanici_adi from admin where admin_id=?',array($cb)); echo $k; ?> okunma : 5 yorum : 3 
	<span style="float:right;">tarih : <?php echo $bb->tarih; ?></span></div>
	<div class="resim"> 
	<img src="images/<?php echo $bb->resim; ?>" alt="" />
	</div>
	<div class="kisayazi">
	<?php echo $bb->makale_kisa; ?>
	</div>
	<div class="devam"> 
	<a href="icerik.php?id=<?php echo $bb->makale_id; ?>">DEVAM</a>
	</div>
	<div style="clear:both;"></div>
	</div>
	
		<?php } ?>
	
	
	
	
	
	
	</div>
	
	

<?php
} ?>
	<div class="sag"> 
	
	
	
	
	
	<div class="sag3"> 
	<h2>KATEGORILER</h2>
	<ul> 
	<?php $sgkt = DB::get('SELECT * FROM KATEGORILER where kategori_ustid is null'); 
	if (is_array($sgkt))
	{
	foreach ($sgkt as $st) {
		echo '<li>';
		?> <a href="index.php?id=<?php echo $st->kategori_id; ?>">
		<?php
		
		echo $st->kategori_adi; ?>
		 
		 </a></li>
	<?php } }?>
	</ul>
	</div>
	<div class="sag2"> 
	<h2>SON EKLENEN KONULAR</h2>
	<?php $sgkn = DB::get('SELECT * FROM makale order by makale_id desc LIMIT 10'); 
	if (is_array($sgkn))
	{
	foreach ($sgkn as $sn) {
		echo '<h3>';
		?> <a href="icerik.php?id=<?php echo $sn->makale_id; ?>">
		<?php
		
		echo $sn->makale_baslik; ?>
		 
		 </a></h3>
	<?php } }?>
	</div>
	<div class="sag3"> 
	<h2>SON YORUMLAR</h2>
	<h3>
	<b><img src="images/avatar.jpg" alt="" /></b>
	bu bir deneme yorumudur <br/><span style="font-size:17px;">mehmet</span></h3>
	<h3>
	<b><img src="images/avatar.jpg" alt="" /></b>
	deneme yorumu...<br/><span style="font-size:17px;">ahmet</span></h3>
	<h3>
	<b><img src="images/avatar.jpg" alt="" /></b>
	deneme yorumu...<br/><span style="font-size:17px;">ali</span></h3>
	
	</div>
	</div>
	
	
	</div>
	<div style="clear:both;"></div>
	
	<div class="sayfalama"> 
	
	<b>Geri</b>  <b style="float:right;">Ileri</b>
	<div style="clear:both;"></div>
	</div>
	<div class="footer"> 
	<h2 class="footeryazi"><a href="admin/">PANEL</a> Copyright © 2018 SEYYAH | by MUHAMMET INCI</h2>
	</div>
	
	</div>

</body>
</html>


