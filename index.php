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

	<?php include 'menu.php'; ?>


		<div style="clear:both;"></div>
		<div class="content">
			<div class="sol">
				<?php
				if ($katid) {

					$allcategories = [];
					array_push($allcategories, $katid);
					$first_degree_categories = DB::get('SELECT kategori_id from kategoriler where kategori_ustid IN (' . implode(',', $allcategories) . ')');
					foreach ($first_degree_categories as $result) {
						array_push($allcategories, $result->kategori_id);
					}
					$second_degree_categories = DB::get('SELECT kategori_id from kategoriler where kategori_ustikiid IN (' . implode(',', $allcategories) . ')');
					foreach ($second_degree_categories as $result) {
						array_push($allcategories, $result->kategori_id);
					}

					if ($allcategories) {
						$contents = DB::get('SELECT * FROM makale where Onay=1 and makale_kategori IN (' . implode(',', $allcategories) . ') order by tarih desc');
						foreach ($contents as $con) {
				?>
							<div class="sol2">
								<h2><?php echo $con->makale_baslik; ?></h2>
								<div class="bilgi">kategori : <?php $catid = $con->makale_kategori;
																$x = DB::getVar('SELECT kategori_adi from kategoriler where kategori_id=?', array($catid));
																echo $x; ?> yazan : <?php $authorid = $con->makale_yazan;
																					$authorname = DB::getVar('SELECT kullanici_adi from admin where admin_id=?', array($authorid));
																					echo $authorname; ?> okunma : 5 yorum : 3
									<span style="float:right;">tarih : <?php echo $con->tarih; ?></span>
								</div>
								<div class="resim">
									<img src="images/<?php echo $con->resim; ?>" alt="" />
								</div>
								<div class="kisayazi">
									<?php echo $con->makale_kisa; ?>
								</div>
								<div class="devam">
									<a href="icerik.php?id=<?php echo $con->makale_id; ?>">DEVAM</a>
								</div>
								<div style="clear:both;"></div>
							</div>
						<?php } ?>






					<?php }
				} else { ?>




					<?php






					$b = DB::get('SELECT * FROM makale where Onay=1 order by makale_id desc');


					foreach ($b as $bb) {



					?>


						<div class="sol2">
							<h2><?php echo $bb->makale_baslik; ?></h2>
							<div class="bilgi">kategori : <?php $ff = $bb->makale_kategori;
															$x = DB::getVar('SELECT kategori_adi from kategoriler where kategori_id=?', array($ff));
															echo $x; ?> yazan : <?php $cb = $bb->makale_yazan;
																			$k = DB::getVar('SELECT kullanici_adi from admin where admin_id=?', array($cb));
																			echo $k; ?> okunma : 5 yorum : 3
								<span style="float:right;">tarih : <?php echo $bb->tarih; ?></span>
							</div>
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










				<?php
				} ?>
			</div>
			
			<?php include 'aside.php'; ?>


		</div>
		<div style="clear:both;"></div>

		<div class="sayfalama">

			<b>Geri</b> <b style="float:right;">Ileri</b>
			<div style="clear:both;"></div>
		</div>

		<?php include 'footer.php'; ?>

	</div>

</body>

</html>