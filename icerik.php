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
	
	
	<?php include 'menu.php'; ?>
	
	
	
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
	
	
	<?php include 'aside.php'; ?>
	
	</div>
	<div style="clear:both;"></div>
	
	
	<?php include 'footer.php'; ?>
	
	</div>

</body>
</html>