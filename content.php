<?php
session_start();
include_once("config/config.php");
?>
 
<?php
    $stm = $DBH->prepare("SELECT ImagePath FROM aa_Images ORDER BY RAND() LIMIT 1 ;");
    $stm->execute();
    $stm->setFetchMode(PDO::FETCH_OBJ);
    $kuva=$stm->fetch();
    $_SESSION['ImagePath']=$kuva->ImagePath;
    
    
    $meili=$_SESSION['email'];
    $std=$DBH->prepare("SELECT UserID FROM aa_Users WHERE Email 
    ='$meili';");
    $std->execute();
    $std->setFetchMode(PDO::FETCH_OBJ);
    $kommentoiva=$std->fetch();
   // $_SESSION['UserID']=$kommentoiva->UserID;
    
    $kuvanid=$DBH->prepare("SELECT ImageID FROM aa_Images WHERE ImagePath='$kuva->ImagePath';");
    $kuvanid->execute();
    $kuvanid->setFetchMode(PDO::FETCH_OBJ);
    $kuvanoikeaid=$kuvanid->fetch();
    $_SESSION['ImageID']=$kuvanoikeaid->ImageID;
    
    ?>
    
    <img src="<?php echo($kuva->ImagePath);?>" alt="kuva" id="photo" />
    <br />
    <br />
    <button type="button" onclick="likeMinus();document.getElementById('punNappi').disabled=true;document.getElementById('vihrNappi').disabled=true;" id="punNappi"><img src="img/1miinusta.png" alt="dislike"/></button>
    <!-- <button type="button" onclick="likePlus();document.getElementById('vihrNappi').disabled=true;document.getElementById('punNappi').disabled=true;" id="vihrNappi"><img src="img/vihr_test.png" /></button> -->
    <button type="button" onclick="likePlus();document.getElementById('vihrNappi').disabled=true;document.getElementById('punNappi').disabled=true;vaihdaPlussa();" id="vihrNappi"><img src="img/plussaa.png" alt="like" /></button>
<br />
<br />
<h3>Dislikes:</h3>
<?php
$_GET[''];
$kuvapolku=$_SESSION['ImagePath'];
$stm = $DBH->prepare("SELECT Dislikes FROM aa_Images WHERE imagePath =  " . "'".$kuvapolku."'");
$stm->execute();
$tulos = $stm->fetch();
    echo ($tulos['Dislikes']);
    ?>
    <h3>Likes:</h3>
    <?php
$stm = $DBH->prepare("SELECT Likes FROM aa_Images WHERE imagePath =  " . "'".$kuvapolku."'");
$stm->execute();
$tulos = $stm->fetch();
echo ($tulos['Likes']);
?>

    <!-- <a href="index.php"><img src="img/eteenpain.png" width="6%" height="6%" /></a> -->
    <!-- <a href="index.php"><img src="img/eteenpain_12.png" /></a> -->
    <br />
    <button type="button" onclick="location.reload();document.getElementById('punNappi').disabled=false;document.getElementById('vihrNappi').disabled=false;" id="eteenpain"><img src="img/eteenpain_02.png" alt="->"/></button>
    <!--<a href="upload.php">Upload a New Image</a>-->
    <!-- <li onclick="document.getElementById('myModal').style.display='block'" class="liup"><a>Upload new image
    </a></li> -->
    <!-- <button onclick="document.getElementById('myModal').style.display='block'" class="liup"><a>Upload new image
    </a> -->
<!--    <button onclick="document.getElementById('myModal').style.display='block'"><a>Upload new image</a>
    </button> -->
<?php //include ("upload.php");?>
    <br />
    <br />
    <div id="likes">
    </div>


