<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: dashboard.php');
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
	
	<form action="zaloguj.php" method="post">
	
		Login: <br /> <input type="text" name="login" /> <br />
		Hasło: <br /> <input type="password" name="haslo" /> <br />
		<input type="submit" value="Zaloguj się" />
	
	</form>
	<br><hr><br>

<iframe frameborder='0' height='250px' scrolling='no' src='https://www.ratujemyzwierzaki.pl/remont-macierzystej-siedziby/banner' width='300px'></iframe>
<iframe frameborder='0' height='250px' scrolling='no' src='https://www.ratujemyzwierzaki.pl/akcjaratunkowa/banner' width='300px'></iframe>

	
<?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
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