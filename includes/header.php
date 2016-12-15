
<?php
require_once("config/config.php");
session_start();

// Näytetään rekisteröinti, kirjaudu tai kirjautuneen käyttäjätieto

// Oletuksena nyt rekisteröinti (sivulle)

?>
<!doctype html>
<head>
    <title>PICker</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="css/header.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/loginform.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/index.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/commentform.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/upload.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/register.css" type="text/css" media="all">
    
        <!--[if IE]> <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.1/fetch.min.js"></script>
</head>

<body>

<header>

<a href="/PICker" id="logo"><img src="img/PICker.png" alt="PICker" /></a>


<nav>

<!--<a href="#" id="menu-icon"></a>-->


<!--<li><a href="#" class="current">Home</a></li>-->

<p><?php
        //echo($_SESSION['message']);
        if($_SESSION['loggedIn'] == "yes") {
        echo("Logged in: " . $_SESSION['name']);?><br /><?php/*
        echo("E-mail: " . $_SESSION['email']);
        //echo($_SESSION['UserID']);
*/?>
    <a href="logout.php" id="logout">Log out</a>
    <br />
    <button onclick="document.getElementById('myModal').style.display='block'" class="upload"><a>Upload new image</a>
    </button></p>
<?php include ("upload.php");?>
<?php
} else {
?>
<!-- <li><a href="login.php">Login</a></li> -->

<button onclick="document.getElementById('id01').style.display='block'"><a>Login</a></button>
 <?php include ("loginform.php");?>
<button onclick="document.getElementById('id02').style.display='block'"><a>Register</a></button>
<?php include ("register.php");?>
<?php
}
?>


    

</nav>

</header>


</body>