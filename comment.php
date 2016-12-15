<?php
if(isset($_POST["comment"])) {     // Onko painettu submit-painiketta?
    // Tallennetaan annetut arvot assosiatiiviseen taulukkoon.
    //echo("jotain");
    $datat['name'] = $_POST['givenName'];
    

        try {
            $stm = $DBH->prepare("INSERT INTO aa_Comments (Comm) VALUES(:name, :password, :email);");
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

?> 