<?php
session_start();
include_once("config/config.php");
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
        // lisää tietokantaan
        // INSERT INTO aa_Images VALUES ('5', 'uploads/kuvatiedosto.jpg', 'UserID', '0', '0'); 
        $imageid=$GET_['i'];
        $kuvaaja=$_SESSION['UserID'];
        $faili=$_FILES["fileToUpload"]["name"];
        $pic = $DBH->prepare("INSERT INTO aa_Images VALUES (".'"'.$imageid.'"'.", " . "'".$target_dir . $faili."', " . "'".$kuvaaja."', '0', '0');"); 
        $pic->execute();
    } else {
        echo "Sorry, there was an error uploading your file.";
        //echo $target_file;
        // echo $_FILES["fileToUpload"]["tmp_name"];
        echo fileperms ( $target_dir );
    }
}
?>
<br />
<br />
    <button onclick="goMain()">Go Back</button>
    <script>
        function goMain() {
        window.location = '/PICker';
    }
    </script>

<?php
/*
$kommentti=$_GET['k'];
$kuvanumero=$_SESSION['ImageID'];
$kuvaaja=$_SESSION['UserID'];
//$meili=$_SESSIOn['Email']
//$kuvaaja = 100;
$pic = $DBH->prepare("INSERT INTO aa_Comments (Comm, UserID, ImageID) VALUES(".'"'.$kommentti.'"'.", " . "'".$kuvaaja."', " . "'".$kuvanumero."');");
//$pic = $DBH->prepare("INSERT INTO aa_Comments (Comm, UserID, ImageID) VALUES(".'"'.$kommentti.'"'.",10, " . "'".$kuvanumero."');");
//$pic = $DBH->prepare("INSERT INTO aa_Comments (Comm, UserID, ImageID) VALUES('teshhjhjhhjhjti', 24, 1);");
$pic->execute();
?>
*/
?>

