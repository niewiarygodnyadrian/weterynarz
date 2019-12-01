
<?php
$con = mysqli_connect('127.0.0.1','root','');

if(!$con) {
	echo 'Not Connected To Server!';
}

if(!mysqli_select_db($con, 'biznesmordo')) {
	echo 'Database Not Selected';
}

$notatka = $_POST['notatka'];
$sql = "UPDATE `zwierzeta` SET `notatki`= $notatka WHERE $wiersz['id_pupila']";
if (!mysqli_query($con,$sql)) {
	echo 'Not Inserted';
}else{
	echo 'Inserted';
}
header("refresh:2; url=index.php");
?>

