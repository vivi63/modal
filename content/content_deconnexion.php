<?php
echo "<h3>"."Se déconnecter"."</h3>";
printLogoutForm('welcome');
if (isset($_POST['todo'])) {
                if ($_POST['todo'] == 'logout') {
                    echo "Voulez vous vraiment vous déconnecter ?";
                    Utilisateur::logOut();
                }
            }
?>