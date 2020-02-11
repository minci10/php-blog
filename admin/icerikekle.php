<?php session_start();
include("../config.php");
if(!isset($_SESSION["login"]))
{echo '<h1><center>BU SAYFAYI GORME YETKINIZ YOKTUR !!!!!!!!!!</h1></center>';}
else { ?>
	<!DOCTYPE html>
<head>
<title>MAKALE EKLE</title>
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
	cursor:pointer;

}
input.ekle:hover {
	background-color : #468499;
}

.tdekle {
	border:0px;
}
</style>
</head>
<body>
<div class="makaleeklemealani">

<form method="post" action="makaleekle.php" enctype="multipart/form-data">

<table cellpadding="5" cellspacing="5">
<caption><center><h1>MAKALE EKLE</h1></center></caption>
<tr> 
		<td><center><p><b> KATEGORI </b></p><select name="kat">
		<option></option>
        
		<?php $kategoriler = DB::get('SELECT * FROM kategoriler'); 
		foreach ($kategoriler as $p)
		{   
		echo '<option value="'.$p->kategori_id.'">'.$p->kategori_adi.'</option>';
			
		}
		
		?>
      </select></center></td>
		</tr>
		<tr> 
		<td><center><p><b> BASLIK </b></p><input type="text" name="baslik" class="baslik"/></center></td>
		</tr>
		<tr>
		
		<td> <center><p><b> ICERIK </b></p> <textarea name="icerik" id="icerik" rows="10" cols="80"></textarea></center></td>
		</tr>
		<tr>
		<td><center><p><b> RESIM </b></p><input type="file" name="resim" id="resim"></center></td>
		</tr>
		<tr>
		<td class="tdekle"><center><input type="submit" value="EKLE" class="ekle"/></center></td>
		</tr>
		
		</table>
  
</form>
</div>
<script>
            
            CKEDITOR.replace( 'icerik' );
        </script>
</body>
<?php } ?>
