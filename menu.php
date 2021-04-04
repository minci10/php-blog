<div class="menu">
			<ul><a href="index.php"><img src="images/logo3.png"></a></ul>

			<ul>
				<li><a href="/blog/icerik.php?id=1">VIZESIZ ULKELER</a></li>
			</ul>

			<?php
			function ikialtkategori($id = 0)
			{
				$a = DB::get('SELECT * FROM kategoriler where kategori_ustikiid=? and kategori_ustid is null and kategori_ustikiid>0 order by kategori_id desc', array($id));
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

			function kategori($id = 0)
			{

				$a = DB::get('SELECT * FROM kategoriler where kategori_ustid=? order by kategori_id desc', array($id));

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
					<ul>
						<li><a href="index.php">ANASAYFA</a></li>
					</ul>

		</div>