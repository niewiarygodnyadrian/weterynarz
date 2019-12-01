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
	<title>FETE-rynarz</title>
</head>

<body>
<div id="container">

<img src="/logo.png" class="center" />

<?php

	echo "<a href='logout.php'><button class='button3'><i class='fas fa-sign-out-alt'></i> Wyjdz!</button></a> | Jesteś zalogowany jako<b> ".$_SESSION['user']."</b>! Twoje id to <b>".$_SESSION['id']."</b>.";

	
?>
<h2>Lista Twoich klientów:</h2>
<hr>
<br>
<?php
function lacz_bd()
{  
  $db = new mysqli('localhost', 'root', '', 'biznesmordo');  
    if (! $db)
      return false;
   $db->autocommit(TRUE);
   return $db;
}
$db = lacz_bd();
$idkurcze = $_SESSION['id'];
$zapytanie = "SELECT * FROM `klienci` WHERE `id_weterynarza` = $idkurcze ";
$wynik = $db->query($zapytanie);
$ile_znalezionych = $wynik->num_rows;
echo '<table>';
echo '<tr><td><b>Operacje</b></td><td><b>ID</b></td><td><b>Imię</b></td><td><b>Nazwisko</b></td><td><b>Pupile</b></td></tr>';
for ($i=0; $i <$ile_znalezionych; $i++)
        {
                $wiersz = $wynik->fetch_assoc();
				echo '<tr>';
				echo '<td> <a href="remove_record.php?id='.$wiersz['id_klienta'].'"><i style="color: red;"class="fas fa-user-minus"></i>
				</a> </td>';
				echo '<td>'.$wiersz['id_klienta'].'</td>';
                echo '<td>'.$wiersz['imie'].'</td>';
				echo '<td>'.$wiersz['nazwisko'].'</td>';

					$jestprawie10idostajejuzszalu = $wiersz['id_klienta'];
					$zapytanie1 = "SELECT * FROM `zwierzeta` WHERE `id_klienta` = $jestprawie10idostajejuzszalu";
					$wynik1 = $db->query($zapytanie1);
					$ile_znalezionych1 = $wynik1->num_rows;
					echo '<td>';
					for ($o=0; $o <$ile_znalezionych1; $o++) {

					$wiersz1 = $wynik1->fetch_assoc();
					echo $wiersz1['imie'].', ';}
					
						
				echo '</td></tr>';
				
		}
		


echo '</tr></table class="null">';
?>
<br>
<h2>Zarządzanie nad światem</h2>
<hr>
<br>
<table>
<tr>
      <td><b>Dodawanie klientów</b></td> <td><b>Dodawanie zwierząt</b></td> <td><b>Wyszukiwarka</b></td>
   </tr>	
<tr><td>
<br />
<form action="insert.php" method="post">
Imie:<br />
<input type="text" name="imie" /><br />
Nazwisko:<br />
<input type="text" name="nazwisko" /><br />
NR telefonu:<br />
<input maxlength='9' type="text" name="nr_telefonu" /><br />
<button class="button1" type="submit" ><i class='fas fa-plus'></i> Zatwierdź</button>
</form></td>

<td>
<br />
<form action="insert1.php" method="post">
Imię:<br />
<input type="text" name="imie" /><br />
Notatka:<br />
<input type="text" name="notatka" /><br />
Id klienta / własciciela:<br />
<input type="text" name="id_klienta" /><br />
<button class="button1" type="submit" ><i class='fas fa-plus'></i> Zatwierdź</button>
</form></td>
<br /><td>
<form action="result.php" method="post">
Wyszukaj pupila według:<br>
      <select style="width: 200px;" name="metoda">
	   <option value="id_pupila" />ID 
       <option value="id_klienta" />ID Właściciela
       <option value="imie" />Imie
      </select>
      <br />
      Treść:<br>
      <input type="text" name="wyrazenie" /><br>
      <button class="button2" type="submit" ><i class='fas fa-search'></i> Wyszukaj</button>
	</form>
	</td></tr></table>
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