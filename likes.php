<?php
session_start();
include_once("config/config.php");
?>
<p>Awesome pic, right?</p>
<?php
$_GET[''];
$kuvapolku=$_SESSION['ImagePath'];
$stm2 = $DBH->prepare("UPDATE aa_Images SET Likes = Likes + 1 WHERE ImagePath = " . "'".$kuvapolku."'");
$stm2->execute();
?>
<?php
/*$_GET[''];
$stm = $DBH->prepare("SELECT Likes FROM aa_Images WHERE ImagePath =  " . "'".$kuvapolku."'");
$stm->execute();
$tulos = $stm->fetch();
echo ($tulos['Likes']);*/
?>
