<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/27e705e8b1.js" crossorigin="anonymous"></script>
	<link rel=”icon” type=”image/png” href=”favicon.ico”/>
	<title>FETE-rynarz</title>
</head>

<body>
<div id="container">

<img src="/logo.png" class="center" />
<br>
<hr>
<br>
<?php
$con = mysqli_connect('127.0.0.1','root','');

if(!$con) {
	echo 'POLACZENIA NIE MA KUR**';
}

if(!mysqli_select_db($con, 'biznesmordo')) {
	echo 'BAZDY NIE WYBRALES ALBO AWARIA JAKOS DZWON DO HOSTINGU';
}

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$nr_telefonu = $_POST['nr_telefonu'];
$id_weterynarza = $_SESSION['id'];
$sql = "INSERT INTO `klienci`(`id_klienta`, `imie`, `nazwisko`, `nr_telefonu`, `id_weterynarza`) VALUES (NULL,'$imie','$nazwisko','$nr_telefonu','$id_weterynarza')";
if (!mysqli_query($con,$sql)) {
	echo 'BLOND I **UJ';
}else{
	echo 'Wszystko przebiegło poprawnie.';
}

header("refresh:1; url=index.php");
?>

<footer>
	<br>
<hr>
<br>
<!-- Auto Updating Copyright Script created with Rapid Purple Webmaster Tools (http://rapidpurple.com). -->
<script language="JavaScript">
<!--
function y2k(number) { return (number < 1000) ? number + 1900 : number; }
var today = new Date();
var year = y2k(today.getYear());
document.write('© '+year+' ADRIAN WAWROSZ GOŚCIU - All Rights Reserved');
//-->
</script>

</footer>

</div>
</body>
</html>