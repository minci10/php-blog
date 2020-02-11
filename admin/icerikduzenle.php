<?php 
$id = $_GET["id"];
if(!isset($_SESSION["login"]))
{echo '<h1><center>BU SAYFAYI GORME YETKINIZ YOKTUR !!!!!!!!!!</h1></center>';}
else { ?>

	<!DOCTYPE html>
<head>
<title>MAKALE DUZENLE</title>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<style>
table tr td 	{
	border: 1px solid #468499;
	border-style : double;
	border-radius: 3px;
	
}

form table tr td input {
	width : 450px;
	height: 30px;
	margin:10px;
}

form table tr td select {
	width : 250px;
	height: 30px;
	margin:10px;
	border:1px solid #468499;
	border-radius: 3px 3px 3px 3px;
	box-shadow: 1px 1px 5px 2px rgba(70,132,153,.8);
}
.baslik {
	margin:10px;
	border:1px solid #468499;
	border-radius: 3px 3px 3px 3px;
	box-shadow: 1px 1px 5px 2px rgba(70,132,153,.8);
}
body {
	background-image: url(css/bg.jpg);
}
.makaleeklemealani {
	margin:50px;
	margin-left:400px;
}
body table p {
	color:#034b59;
		font-size:20px;
		text-shadow: 0 0 1px maroon;
		letter-spacing:1.5px;
}

h1 {
	font-size: 40px;
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	text-shadow: 0 0 1px maroon;
		letter-spacing:1.5px;
}

form table tr td select option {
	font-weight: bold;
}


input.ekle{
	 color: #224059;
    background-color: #b5c9e2;
    border-top: 2px #cce3ff solid;
    border-left: 2px #cce3ff solid;
    border-bottom: 2px #31557f solid;
    border-right: 2px #31557f solid;
    font:bold 15px Arial, Helvetica, sans-serif;
	margin-top:20px;
	border-radius: 3px 3px 3px 3px;

}
input.ekle:hover {
	background-color : #468499;
}

.tdekle {
	border:0px;
}

.link {
	text-align:center;position:relative;top:20px;color:blue;text-decoration: none;font-size:25px;
	
}

.link:hover {
	color:#850000;
	font-size : 25px;;
}
</style>
</head>
<body>
<div class="makaleeklemealani">

<form method="post" action="/blog/admin/?do=makaleduzenle&id=<?php echo $id ?>" enctype="multipart/form-data">

<table cellpadding="5" cellspacing="5">
<caption><center><h1>MAKALE DUZENLE</h1></center></caption>
<tr> 
		<td><center><p><b> KATEGORI </b></p><select name="kat">
		<option></option>
        
		<?php $duzenle = DB::getRow('SELECT * from makale where makale_id=?',array($id)); 
		$kategoriler = DB::get('SELECT * FROM kategoriler'); 
		
		foreach ($kategoriler as $p)
		{   
		
		if	($duzenle->makale_kategori === $p->kategori_id) {
			
			echo '<option value="'.$p->kategori_id.'" selected>'.$p->kategori_adi.'</option>';
		}
		else {
			echo '<option value="'.$p->kategori_id.'">'.$p->kategori_adi.'</option>';
		}
			
		}
		
		?>
      </select></center></td>
	  
		</tr>
		<tr>
		<td><center><p><b> YAZAN </b></p><select name="yazan">
		<option></option>
        
		<?php $admin = DB::get('SELECT * FROM admin'); 
		
		foreach ($admin as $adm)
		{   
		if ($adm->admin_id === $duzenle->makale_yazan) {
			echo '<option value="'.$adm->admin_id.'" selected>'.$adm->kullanici_adi.'</option>';
		}
		else {
			echo '<option value="'.$adm->admin_id.'">'.$adm->kullanici_adi.'</option>';
		}
			
		}
		
		?>
      </select></center></td>
		
		</tr>
		<tr> 
		<td><center><p><b> BASLIK </b></p><input type="text" name="baslik" class="baslik" value="<?php echo $duzenle->makale_baslik; ?>"/></center></td>
		</tr>
		<tr>
		
		<td> <center><p><b> ICERIK </b></p> <textarea name="icerik" id="icerik" rows="10" cols="80" ><?php echo $duzenle->makale_uzun; ?></textarea></center></td>
		</tr>
		<tr> 
		<td><center><p><b> KISA HALI </b></p><input type="number" name="kisa" value="<?php echo strlen($duzenle->makale_kisa) ?>"/></center></td>
		</tr>
		<tr>
		<td><center><p><b> RESIM </b></p><input type="file" name="resim" id="resim"></center></td>
		</tr>
		<tr>
		<td><center><p><b> ONAY </b></p><select name="onay"> 
				<option value="1"<?php echo $duzenle->Onay == 1 ? 'selected' : null;?>>ONAYLI</option>
				<option value="0" <?php echo $duzenle->Onay == 0 ? 'selected' : null;?> >ONAYLI DEGIL</option>
				</select></center></td>
		
		</tr>
		<tr>
		<td class="tdekle"><center><input type="submit" value="GUNCELLE" class="ekle"/></center><center><b> <a href="/blog/admin/"  class="link">ANA MENU</a></b></center></td>
		
		</tr>
		 
		</table>

</form>
</div>
<script>
            
            CKEDITOR.replace( 'icerik' );
        </script>
</body>
<?php } ?>
