<?php
        if (isset($_SESSION["loggedIn"])) {
               echo "Bravo vous êtes bien connecté";
               echo "<br>";
               echo "<a href='http://localhost/Project/index.php?page=welcome'>Retour à l'accueil</a>";
               
            if (isset($_POST['todo'])) {
                if ($_POST['todo'] == 'logout') {
                    echo "Voulez vous vraiment vous déconnecter ?";
                    Utilisateur::logOut();
                }
            }
        } else {
            printLoginForm($askedPage);
            
        }







        $dbh = null;
        ?>