<?php
session_start();
include_once("config/config.php");
?>
<?php
$kommentti=$_GET['k'];
$kuvanumero=$_SESSION['ImageID'];
$kuvaaja=$_SESSION['UserID'];
//$meili=$_SESSIOn['Email']
//$kuvaaja = 100;
if (!empty($kommentti)) {
$stm2 = $DBH->prepare("INSERT INTO aa_Comments (Comm, UserID, ImageID) VALUES(".'"'.$kommentti.'"'.", " . "'".$kuvaaja."', " . "'".$kuvanumero."');");
//$stm2 = $DBH->prepare("INSERT INTO aa_Comments (Comm, UserID, ImageID) VALUES(".'"'.$kommentti.'"'.",10, " . "'".$kuvanumero."');");
//$stm2 = $DBH->prepare("INSERT INTO aa_Comments (Comm, UserID, ImageID) VALUES('teshhjhjhhjhjti', 24, 1);");
$stm2->execute();
}
?>
<?php
$stm = $DBH->prepare("SELECT Comm FROM aa_Comments WHERE ImageID = ".'"'.$kuvanumero.'"'.";");
$stm->execute();
while($kommentti = $stm->fetch()){
    $kommentit[] = $kommentti; //Lisätään objekti taulukon loppuun
}
$jsonString = json_encode($kommentit);
echo($jsonString);
?>