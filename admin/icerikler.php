<?php 
if(!isset($_SESSION["login"]))
{echo '<h1><center>BU SAYFAYI GORME YETKINIZ YOKTUR !!!!!!!!!!</h1></center>';
header("Refresh: 2; url=admin.php");}
else { 
$p = DB::get('SELECT * FROM makale ORDER BY makale_id desc');
?>   
<!DOCTYPE html>
<html>
<head>
<title>MAKALE GORUNTULEME</title>
<style>
table tr td img {
	width: 100px;
	height:100px;
}
table caption {
	font-size:30px;
	margin-bottom:10px;
}
.tablo {
	margin:auto;
}
body {
	background-image: url(css/images.jpg);
}
caption p {
	letter-spacing:3px;
	text-shadow: 0 0 1px #28284a;
}
a {
	 color: blue;
	 text-decoration: none;
	 
}
table tr td a:hover , table tr td a:active {
	color:#850000;
	font-size : 15px;
}
table caption a {
	letter-spacing:2px;
}
table caption a:hover {
	color:#850000;
	font-size : 30px;
}
    
    

</style>
</head>
<body>
<table border="1" cellpadding="5" class="tablo">
<caption><b><p><a href="/blog/admin/" style="float:left;">ANA MENU</a>EKLENEN ICERIKLER<a href="icerikekle.php" style="float:right;">ICERIK EKLE</a></p></b></caption>
<colgroup>
        <col style="background-color:skyblue;"> 
        <col style="background-color:#72c245"> 
        <col style="background-color:violet"> 
		 <col style="background-color:#fdd32b"> 
		 <col style="background-color:#bd0404"> 
		 <col style="background-color:#ffe4e1"> 
    </colgroup>
	 <thead>
        <tr>
            <th>KATEGORI</th>
            <th>BASLIK</th>
			<th>RESIM</th>
			<th>YAZAN</th>
			<th>DURUM</th>
			<th>ISLEMLER</th>
        </tr>
    </thead>
	<?php
	if ($p) {
		foreach ($p as $a) { ?>
			<tbody><tr><td><center> <?php $kid = $a->makale_kategori; $ka=DB::getVar('SELECT kategori_adi from kategoriler where kategori_id = ?',array($kid)); echo $ka; ?></center></td>
			<td> <?php echo $a->makale_baslik; ?></td>
			<td> <?php $ra=$a->resim; echo '<img src="../images/'. $ra .'"></img>';?> </td>
			<td><center> <?php $aid = $a->makale_yazan; $aa=DB::getVar('SELECT kullanici_adi from admin where admin_id = ?',array($aid)); echo $aa; ?></center></td>
			<td> <center><span class="onay"><?php echo $a->Onay; ?></span></center></td>
			<td><center><span style="margin-left:3px;margin-right:3px;">
					<a href="/blog/admin/?do=icerikduzenle&id=<?php echo $a->makale_id;?>">DUZENLE</a></span> 
					<span style="margin-left:3px;margin-right:3px;"><a onclick="return confirm('ICERIGI SILMEK ISTEDIGINIZDEN EMIN MISINIZ?')" 
					href="/blog/admin/?do=makalesil&id=<?php echo $a->makale_id;?>">SIL</a></span></center></td>
			
			
			</tr>
			</tbody>
			<?php
		}
	}
	?>
	
        
            
            
			
        
        
    
</table>








</body>

</html>
	
	
<?php }
?>