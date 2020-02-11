<?php include 'config.php'; 
$id = $_GET['id'];
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
	<div class="sol"> 
	
	
	
	
	<div class="sol3"> 
		<?php 
		
		$makalee = DB::get('SELECT * from makale where Onay=1 and makale_id=?',array($id));  
		foreach	($makalee as $makale)	
		{
		
		echo '<h2>';
		 echo $makale->makale_baslik; 
		echo '</h2>'; ?>
		<div class="bilgi"><?php echo $makale->tarih;  ?> · <?php $cb= $makale->makale_yazan; 
		$k = DB::getVar('SELECT kullanici_adi from admin where admin_id=?',array($cb)); echo $k; ?>
	</div>
		<div class="buyukresim">
	<img src="images/<?php echo $makale->resim; ?>" alt="" />
	</div>
	
		<p>
		<?php echo $makale->makale_uzun;?>
		</p>
	</div>
	<?php } ?>
	
	
	
	
	
	
	</div>
	
	
	<div class="sag"> 
	
	
	
	
	
	<div class="sag3"> 
	<h2>KATEGORILER</h2>
	<ul> 
	<?php $sgkt = DB::get('SELECT * FROM KATEGORILER where kategori_ustid is null'); 
	foreach ($sgkt as $st) {
		echo '<li>';
		?> <a href="index.php?id=<?php echo $st->kategori_id; ?>">
		<?php
		
		echo $st->kategori_adi; ?>
		 
		 </a></li>
	<?php }?>
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
	
	
	<div class="footer"> 
	<h2 class="footeryazi"><a href="admin/admin.php">PANEL</a> Copyright © 2018 SEYYAH | by MUHAMMET INCI</h2>
	</div>
	
	</div>

</body>
</html>