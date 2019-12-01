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
      $metoda = $_POST['metoda'];
      $wyrazenie = $_POST['wyrazenie'];
      $wyrazenie = trim($wyrazenie);
      if (!$metoda || !$wyrazenie)
      {
        echo 'IMBECYLU OD TEJ KAWY JUZ ZAPOMNIALES DO CZEGO TO SIE UZYWA';
        exit;
      }
      if (!get_magic_quotes_gpc())
      {
        $metoda = addslashes($metoda);
        $wyrazenie = addslashes($wyrazenie);
      }
      @ $db = new mysqli('localhost','root','','biznesmordo');
      
      if (mysqli_connect_errno())
      {
        echo 'ADRIAN ZNOWU COS ZJEBALES IDZ SIE LECZ';
        exit;
      }
      $db->query('SET NAMES utf8');
      $db->query('SET CHARACTER_SET utf8_unicode_ci');
      $zapytanie = "select * from zwierzeta where ".$metoda. " like '%".$wyrazenie."%'";
      $wynik = $db->query($zapytanie);
      $ile_znaleziono = $wynik->num_rows;
      echo '<p> Liczba znalezionych zwierzat: '.$ile_znaleziono.'</p>';
      for ($i=0;$i<$ile_znaleziono;$i++)
      {
        $wiersz = $wynik->fetch_assoc();
        echo '<p>Imie: '.stripslashes($wiersz['imie']).'<br />';
        echo 'Wlasciciel: '.stripslashes($wiersz['id_klienta']).'<br />';
        echo 'Notatki: '.stripslashes($wiersz['notatki']).'</p>';
        echo '<td> <a href="remove_pet.php?id='.$wiersz['id_pupila'].'"><button class="button3"><i class="fas fa-user-minus"></i> zdechł!</button></a> </td>';
      }
     
      $MAMJUZDOSCTEGOZADANIA = $wiersz['id_klienta'];
      $wynik->free();


      $zapytanie1 = "select * from klienci where id_klienta = '$MAMJUZDOSCTEGOZADANIA'";
      $wynik1 = $db->query($zapytanie1);
      $ile_znaleziono = $wynik1->num_rows;
      echo '<p> Liczba znalezionych wlascicieli: '.$ile_znaleziono.'</p>';
      for ($i=0;$i<$ile_znaleziono;$i++)
      {
        $wiersz1 = $wynik1->fetch_assoc();
        echo '<p>Imie: '.$wiersz1['imie'].'<br />';
        echo 'Nazwisko: '.$wiersz1['nazwisko'].'<br />';
        echo 'Telefon: '.$wiersz1['nr_telefonu'].'</p>';
      }
    
      $wynik1->free();
      $db->close();
    ?> 
    <a href="dashboard.php"><button class="button2"><i class="fas fa-arrow-left"></i> Powrót</button></a>
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