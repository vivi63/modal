

<script>
    $(document).ready(function () {
            $("#A").hide();
            $("#B").hide();
        
        $("#aa").click(function () {
            $("#A").show();
            $("#B").hide();
        });
        $("#bb").click(function () {
            $("#B").show();
            $("#A").hide();
        })

    }
    )

</script>

<?php

echo <<<EOS
<button id="aa">Supprimer mon compte</button>
<button id="bb">Changer mon mot de passe</button>
EOS;

echo <<<EOS
<div id="A" >
EOS;
printdeleteUser();
echo "</div>";

echo <<<EOS
<div id="B" >
EOS;
printchangeRegisterForm();
echo "</div>";



if (isset($_POST["id"]) && $_POST["id"] != "" &&
        isset($_POST["password"]) && $_POST["password"] != "" &&
        isset($_POST["todo"])) {
    if ($_POST["todo"] == "change") {
        $user = Utilisateur::getUtilisateur($dbh, $_POST["id"]);
        if ($user != null) {
            if ($user->password == SHA1($_POST["password"])) {
                $dbh = Database::connect();
                $id = $_POST["id"];
                $password = SHA1($_POST["newpassword"]);
                $query = "UPDATE `utilisateur` SET `password` ='$password' WHERE `id` = '$id' ";
                $sth = $dbh->prepare($query);
                $request_succeeded = $sth->execute();
                echo "<h3>" . "Changement effectuée" . "</h3>";
                echo "<br>";

                $form_values_valid = true;
            } else {
                echo "Mauvais mot de passe";
            }
        }
    }
    if ($_POST["todo"] == "delete") {
        $user = Utilisateur::getUtilisateur($dbh, $_POST["id"]);
        if ($user != null) {
            if ($user->password == SHA1($_POST["password"])) {
                $dbh = Database::connect();
                $id = $_POST["id"];
                $query = "DELETE FROM `utilisateur` WHERE `id`='$id'";
                $sth = $dbh->prepare($query);
                $request_succeeded = $sth->execute();
                Utilisateur::logOut();
                echo "Changement effectuée";
                echo "<br>";
            } else {
                echo "mauvais mot de passe";
            }
        }
    }
}


?>