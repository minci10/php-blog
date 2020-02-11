<?php

$id = $_GET["id"];
if ($id)
	{
		if($_POST) {
			
			$katadi = $_POST["katadi"];
			
			$insert = DB::insert('insert into kategoriler (kategori_adi,kategori_ustid) values (?,?)',array($katadi,$id));
			
			if ($insert)
			{
				?>
		<div class="iceriksil"> 
			<center><h2>KATEGORI EKLENDI...</h2><img src="css/tik2.png"></img></center>;
			
		 </div> <?php
				
				header("refresh: 2; url=/blog/admin/?do=kategoriler");
				
				
			}
			else {
				echo 'Kategori eklemede hata !!!';
				header("refresh: 2; url=/blog/admin/?do=kategoriler");
			}
			
		}
		
			
			
			
	
		?>
		

		<form action="" method="post" class="ortala">
		<table cellpadding="5" cellspacing="5">
		<tr>
		<td style="font-weight:bold;text-align:center;letter-spacing:2px;font-size:20px;text-shadow:0px 1px 1px rgba(28,110,164,0.72);">Kategori Adi</td>
		</tr>
		<tr>
		<td><input type="text" name="katadi" class="textt"/></td>
		</tr>
		<tr>
		<td><center><input type="submit" value="EKLE" class="btnn"/></center></td>
		</tr>
		
		</table>
		</form>

		<?php
	
	
}


?>