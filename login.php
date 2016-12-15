<?php
session_start();
require_once("includes/header.php");
// Tultiinko tälle lomakkeelle submit-painikkeella?
//echo("rivi 4");
if(isset($_POST['login'])) {
    // Onnistuuko kirjautuminen?
    // Jos ok, saadaan käyttäjän kaikki tiedot.
    $user = login($_POST["givenEmail"], $_POST["givenPw"], $DBH);
    //echo("rivi 8".$_POST["givenEmail"]. $_POST["givenPw"]) ;
    if($user){  // Löydettiinkö?
        //echo("rivi 10");
        // Tallennetaan käyttäjän tiedot sessiomuuttujiin.
        $_SESSION['loggedIn'] = "yes";
        $_SESSION['name'] = $user->Username;
        $_SESSION['email'] = $user->Email;
        $_SESSION['UserID'] = $user->UserID;
        //unset($_SESSION['message']);
        //$_SESSION['message']="Voit kirjautua ID= " . $_SESSION['UserID'] ;
        redirect("index.php");
    } else {
        $_SESSION['message'] = "Wrong password or email!";
        //redirect("register.php");
    }
} else if (isset($_POST['cancel'])) {
    // Tultiinko sivulle cancel-painikkeella?
    // Palatan etusivulle.
    unset($_SESSION['message']);
    redirect("index.php");
} 
?>
<!--<head><title>PICker - Login</title></head>
<h3>PICker Login</h3>
<form method="POST">
    <input type="text" name="givenEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Email address" required /><br />
    <input type="password" name="givenPw" placeholder="Password" required /><br />
    <input type="submit" value="Login" name="login" />
    <input type="reset" value="Reset" /><br />
    
    
    
</form>

    <button onclick="goBack()">Go Back</button>
    <script>
        function goBack() {
        window.history.back();
    }
    </script>-->