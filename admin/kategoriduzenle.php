<?php

$id = $_GET["id"];

if ($id)
	{
		if($_POST) {
			
			$katadi = $_POST["katadi"];
			
			$update = DB::exec('UPDATE kategoriler SET kategori_adi=? where kategori_id=?',array($katadi,$id));
			
			if ($update)
			{ ?>
				<div class="iceriksil"> 
			<center><h2>KATEGORI DUZENLENDI...</h2><img src="css/tik2.png"></img></center>;
			</div>
				<?php
				header("refresh: 2; url=/blog/admin/?do=kategoriler");
				
				
			}
			else {
				echo 'Kategori duzenlemede hata !!!';
				header("refresh: 2; url=/blog/admin/?do=kategoriler");
			}
			
		}
		
		else {
			$islem = DB::getRow('SELECT * from kategoriler WHERE kategori_id=?',array($id));
			
			
			
			
			
	
	
	if($islem) {
		?>
		
		<form action="" method="post" class="ortala">
		<table cellpadding="5" cellspacing="5">
		<tr>
		<td style="font-weight:bold;text-align:center;letter-spacing:2px;font-size:20px;text-shadow:0px 1px 1px rgba(28,110,164,0.72);">Kategori Adi</td>
		</tr>
		<tr>
		<td><input type="text" name="katadi" value="<?php echo $islem->kategori_adi; ?>" class="textt"/></td>
		</tr>
		<tr>
		<td><center><input type="submit" value="DUZENLE" class="btnn"/></center></td>
		</tr>
		
		</table>
		</form>

		<?php
	}
	else { echo '<h2>kategori bulunamadi..</h2>';}
		}
	
}


?>