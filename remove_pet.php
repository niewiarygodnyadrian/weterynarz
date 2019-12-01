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
<br><hr><br>

<?php

 
$id = (int)$_GET['id'];
$con = mysqli_connect('127.0.0.1','root','');

if(!$con) {
	echo 'Not Connected To Server!';
}

if(!mysqli_select_db($con, 'biznesmordo')) {
	echo 'Database Not Selected';
}

$sql = "DELETE FROM zwierzeta WHERE id_pupila= '$id'";
if (!mysqli_query($con,$sql)) {
    echo 'JA PIERDOLE NIE DZIALA';

}else{
    echo 'Wszystko przebiegło pomyślnie.';

}
mysqli_close($con);
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