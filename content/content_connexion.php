<?php

 

        if (isset($_SESSION["loggedIn"])) {
            printLogoutForm($askedPage);
               echo "<a href='http://localhost/TD4/changePassword.php'>Changer de mot de passe</a>";
               echo "<br>";
               echo "<a href='http://localhost/TD4/deleteUser.php'>Supprimer son compte</a>";
            if (isset($_POST['todo'])) {
                if ($_POST['todo'] == 'logout') {
                    echo "Voulez vous vraiment vous déconnecter ?";
                    Utilisateur::logOut();
                }
            }
        } else {
            printLoginForm($askedPage);
            echo "<a href='http://localhost/TD4/register.php'>S'enregistrer</a>";
        }







        $dbh = null;
        ?>