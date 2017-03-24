<!DOCTYPE html>

<html>

    <head>
        <title>Formulaire</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    </head>

    <body>
        <h1>Supprimer son compte</h1>

        <?php
        $form_values_valid = false;
        require('log/printForms.php');
        require('../utilisateur/SQL.php');
        $dbh = Database::connect();


        if (isset($_POST["login"]) && $_POST["login"] != "" &&
                isset($_POST["password"]) && $_GET["password"] != "")
                 {
            $user = Utilisateur::ifUtilisateur($dbh, $_POST["login"]);
            if ($user != null) {
                if ($user->mdp == SHA1($_POST["password"])) {
                    $dbh = Database::connect();
                    $login = $_POST["login"];
                    $query = "DELETE FROM `utilisateurs` WHERE `login`='$login'";
                    $sth = $dbh->prepare($query);
                    $request_succeeded = $sth->execute();
                    echo "Changement effectuée";
                    echo "<br>";
                    echo "<a href='http://localhost/TD4/index.php'>Connexion</a>";
                    $form_values_valid = true;
                } else {
                    echo "mauvais mot de passe";
                }
                
                
            }
        }

        if (!$form_values_valid) {
            printdeleteUser();
        }

        $dbh = null;
        ?>

    </body>

</html>