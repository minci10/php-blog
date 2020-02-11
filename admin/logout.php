<?php
session_start();
ob_start();
session_destroy();
echo '<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
<div class="cik">
<center><h2>ÇIKIŞ YAPTINIZ...ANASAYFAYA YONLENDIRILIYORSUNUZ...</h2>
<img src="css/bye.png"></img></center>
</div>
</body>';
header("Refresh: 2; url=admin.php");
ob_end_flush();
?>