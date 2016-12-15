<?php
if(isset($_POST["save"])) {     // Onko painettu submit-painiketta?
    // Tallennetaan annetut arvot assosiatiiviseen taulukkoon.
    //echo("jotain");
    $datat['name'] = $_POST['givenName'];
    $datat['email'] = $_POST['givenEmail'];
    //$datat['password'] = md5($givenPw['pwd'].'!!');
    $datat['password'] = hash(sha512, $_POST['givenPw']."5uola");  // 5uola on salasanaan lisätty suola.
    //$datat['password'] = hash(sha256, $_POST['givenPw']."5uola");  // 5uola on salasanaan lisätty suola.
    // Tallennetaan kantaan $DBH.
    // Onko email oikeanlainen: tarkistus palvelimella PHP:n avulla
    // PUUTTUU: Onko annettu email jo käytössä?
    if(filter_var($datat['email'], FILTER_VALIDATE_EMAIL)) {
        try {
            $stm = $DBH->prepare("INSERT INTO aa_Users (UserName, Passwd, Email) VALUES(:name, :password, :email);");
            if($stm->execute($datat)){
                // Rekisteröityminen onnistui.
                //echo("Register ok!");
                //$_SESSION['name'] = $datat['name'];
                //$_SESSION['email'] = $datat['email'];
                //$_SESSION['loggedIn'] = 'yes'; // Jos halutaan että onnistuneen rekisteröinnin jälkeen on samantien loggautuneena sisään. 
                $_SESSION['message'] = "Great! You're authorized to login, " . $datat['name'] . "!";
                redirect("index.php");
            } else {
                $_SESSION['message'] = "Register failed!";
                redirect("index.php");
            }
        } catch(PDDException $e) {
            $_SESSION['message'] = "Database error!";
            redirect("index.php");
        }
    } else {
        $_SESSION['message'] = "Email address rejected!";
    }
}
?>