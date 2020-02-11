<?php session_start();?>
<?PHP if(!isset($_SESSION["login"]))
{
header("Refresh: .1; url=/blog/admin/admin.php");}
else { ?>

<!DOCTYPE HTML>
<html lang="en_US">
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" href="css/admin.css"/>
<style>
.admin-menu {
	
	margin-left:-20px;
	
	
}
.admin-header {
	
	border:1px solid #ddd;
	height:150px;
	background:#ffcc00; /* skyblue de denenebilir*/
}

.admin-header h2 {
	
	margin: 15px 0px 0px 30px;
	font-size:23px;
}
.admin-header h3 {
	
	margin: -15px 0px 0px 30px;
}
.admin-icerik {
	
	margin-top:20px;
	
}


.admin-menu ul li {
	
	border:1px solid #ddd;
	padding:10px;
	font-size:20px;
	float:left;
	margin-left:10px;
}
    
    .admin-menu ul li a{
	
	font-weight: bold;
}

.admin-menu ul li:hover {
	
	background:#eee;
	
}
body {
	background-image: url(css/images.jpg);
	background-size: 225px 225px;
}

.admin-genel a {
	text-decoration:none;
}
</style>
</head>
<body>
	<div class="admin-genel"> 
			<div class="admin-header"> 
			<h2><a href="/blog/admin/">MUHAMMET INCI <span style="color:red;">ADMIN PANELI</span></a>
			<span style="float:right; margin-right:30px;"><a href="/blog/index.php">SITEYI GORUNTULE</a></span>
			</h2>
			
			<h3><br>Admin Paneline Hoş Geldiniz...</h3> 
			<div class="admin-menu"> 
			<ul> 
			<li><a href="/blog/admin/">ANASAYFA</a></li>
			<li><a href="/blog/admin/?do=icerikler">ICERIKLER</a></li>
			<li><a href="/blog/admin/?do=kategoriler">KATEGORILER</a></li>
			<li><a href="/blog/admin/?do=cikis">CIKIS</a></li>
			</ul>
			</div>
			</div>
			<div class="admin-icerik"> 


<?php
include("../config.php");

$do = @$_GET["do"];

switch ($do){
case "kategorisil":
include("kategorisil.php");
break;

case "cikis":
include("logout.php");
break;



case "kategoriduzenle":
include("kategoriduzenle.php");
break;



case "kategoritoplusil":
include("kategoritoplusil.php");
break;

case "altkategoriekle":
include("altkategoriekle.php");
break;

case "icerikler":
include("icerikler.php");
break;

case "icerikduzenle":
include("icerikduzenle.php");
break;


case "makaleduzenle":
include("makaleduzenle.php");
break;

case "makalesil":
include("makalesil.php");
break;

case "ikialtkategoriekle":
include("ikialtkategoriekle.php");
break;

case "kategoriler":
include("kategoriler.php");
break;

}

?>
</body>



</html>

<?php } ?>