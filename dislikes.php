<?php
session_start();
include_once("config/config.php");
?>
<p>Did not like it, huh?</p>
<?php
$_GET[''];
$kuvapolku=$_SESSION['ImagePath'];
$stm2 = $DBH->prepare("UPDATE aa_Images SET Dislikes = Dislikes + 1 WHERE ImagePath =  " . "'".$kuvapolku."'");
$stm2->execute();
?>
<?php
/*$_GET[''];
$stm = $DBH->prepare("SELECT Dislikes FROM aa_Images WHERE imagePath =  " . "'".$kuvapolku."'");
$stm->execute();
$tulos = $stm->fetch();
echo ($tulos['Dislikes']);*/
?>