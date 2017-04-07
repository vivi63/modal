<?php
        if (isset($_SESSION["loggedIn"])) {
               echo "Bravo vous êtes bien connecté";
               echo "<br>";
               echo "<a href='http://localhost/Project/index.php?page=welcome'>Retour à l'accueil</a>";
               
         
        } else {
            printLoginForm($askedPage);
            
        }







        $dbh = null;
        ?>