<head><style>
body 
{
	background-image: url(css/images.jpg);
	background-size: 225px 225px;
}
a h2 {
	
	text-align:center;
	color:blue;
	text-decoration: none;
	font-size:25px;
	
}
a {
	text-decoration:none;
}

a h2:hover {
	color:#850000;
	font-size : 25px;;
}

</style></head><body><div class="kategoriler"><?php
	
	function ikialtkategori($id=0){
		$a = DB::get('SELECT * FROM kategoriler where kategori_ustikiid=? and kategori_ustid is null and kategori_ustikiid>0 order by kategori_id asc',array($id));
		echo '<ul>';
		foreach ($a as $aa) {
			echo '<li>';
			echo $aa->kategori_adi;
			
			if ($aa->kategori_ustid == ""){
				echo ' || <a href="?do=kategorisil&id='.$aa->kategori_id.'"> Sil </a>';
			}
			echo ' || <a href="?do=kategoriduzenle&id='.$aa->kategori_id.'"> Duzenle </a>';
			echo '</li>';
		}
		echo '</ul>';
	}
	
	
	function kategori($id=0) {
		
		$a = DB::get('SELECT * FROM kategoriler where kategori_ustid=? order by kategori_id asc',array($id));
		
		echo '<ul>';
		foreach ($a as $aa) {
			echo '<li>';
			echo $aa->kategori_adi;
			
			
			if ($aa->kategori_ustid == 0 && $aa->kategori_ustikiid == 0) {
				echo ' || <a href="?do=altkategoriekle&id='.$aa->kategori_id.'"> Alt Kategori Ekle </a>';
				
				
			}
			if ($aa->kategori_ustikiid == "") {
				echo ' || <a href="?do=ikialtkategoriekle&id='.$aa->kategori_id.'"> Alt Kategori Ekle </a> ||';
				?>
				<a onclick="return confirm('Bu kategori silindigi takdirde alt kategorileri de silinecektir!!!')" href="?do=kategoritoplusil&id=<?php echo $aa->kategori_id;?>">Sil</a>
				<?php
			}
			
			echo ' || <a href="?do=kategoriduzenle&id='.$aa->kategori_id.'"> Duzenle </a>';
			
			kategori($aa->kategori_id);
			ikialtkategori($aa->kategori_id);
			echo '</li>';
			
		}
		echo '</ul>';
	}
	kategori();
	
	
	
	
	?>
	
	</div>
	</body>