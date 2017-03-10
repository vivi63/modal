<!DOCTYPE html>

<html>

    <head>
        <title>Formulaire</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    </head>

    <body>
        <h1>Changer de mot de passe</h1>

        <?php
        $form_values_valid = false;
        require('log\printForms.php');
        require('../utilisateur/SQL.php');
        $dbh = Database::connect();


        if (isset($_POST["login"]) && $_POST["login"] != "" &&
                isset($_POST["password"]) && $_POST["password"] != "" &&
                isset($_POST["newpassword"]) && $_POST["newpassword"] != "") {
            $user = Utilisateur::ifUtilisateur($dbh, $_POST["login"]);
            if ($user != null) {
                if ($user->mdp == SHA1($_POST["password"])) {
                    $dbh = Database::connect();
                    $login=$_POST["login"];
                    $mdp=SHA1($_POST["newpassword"]);
                    $query = "UPDATE `utilisateurs` SET `mdp` ='$mdp' WHERE `login` = '$login' ";
                    $sth = $dbh->prepare($query);
                    $request_succeeded = $sth->execute();
                    echo "Changement effectuée";
                    echo "<br>";

                    $form_values_valid = true;
                }
                else{
                    echo "mauvais mot de passe";
                }
            }
        }

        if (!$form_values_valid) {
            printchangeRegisterForm();
        }

        $dbh = null;
        ?>

    </body>

</html>