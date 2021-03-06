<?php

//   sécurité 
function secure($tab) {
    foreach ($tab as $cle => $valeur) {
        $tab[$cle] = htmlspecialchars($valeur);
    }
    return $tab;
}

//    connexion à la base de données
class Database {

    public static function connect() {
        $dsn = 'mysql:dbname=modal;host=127.0.0.1';
        $user = 'root';
        $password = "";
        $dbh = null;
        try {
            $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit(0);
        }
        return $dbh;
    }

}

// Opération fondamentale liée à la base 



function insererUtilisateur($id, $nom, $prenom, $password, $statut, $section, $promotion) {
    $dbh = Database::connect();
    $sth = $dbh->prepare("INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `password`, `statut`, `section`, `promotion`) VALUES(?,?,?,SHA1(?),?,?,?)");
    $sth->execute(array("$id", "$nom", "$prenom", "$password", "$statut", "$section", "$promotion"));
    $dbh = null;
}

function insererVoyage($nom, $section, $promotion, $latitude, $longitude, $information) {
    $dbh = Database::connect();
    $sth = $dbh->prepare("INSERT INTO `voyage` (`nom`, `section`, `promotion`,  `latitude`, `longitude`, `information`) VALUES(?,?,?,?,?,?)");
    $sth->execute(array("$nom", "$section", "$promotion", "$latitude", "$longitude", "$information"));
    $dbh = null;
}

function getName() {
    $dbh = Database::connect();
    $query = "SELECT * FROM `utilisateur`";
    $sth = $dbh->prepare($query);
    $request_succeeded = $sth->execute();
    while ($courant = $sth->fetch(PDO::FETCH_ASSOC)) {
        echo $courant['nom'] . " " . $courant['prenom'];
        echo "<br>";
    }
    $dbh = null;
}

// classe utilisateur

class Utilisateur {

    public $id;
    public $nom;
    public $prenom;
    public $password;
    public $statut;
    public $section;
    public $promotion;

    public function _toString() {
        return '[' . "$this->login" . ']' . " " . "$this->prenom" . " " . $this->nom . ", X" . "$this->promotion" . "<br>";
    }

    public static function getUtilisateur($dbh, $id) {

        $query = "SELECT * FROM `utilisateur` WHERE `id`='$id'";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute();
        $user = $sth->fetch();
        $sth->closeCursor();
        return $user;
    }

    public static function getStatut($dbh, $id) {

        $query = "SELECT * FROM `utilisateur` WHERE `id`='$id'";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute();
        $user = $sth->fetch();
        $sth->closeCursor();
        return $user->statut;
    }

    public static function getPromotion($dbh, $id) {

        $query = "SELECT * FROM `utilisateur` WHERE `id`='$id'";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute();
        $user = $sth->fetch();
        $sth->closeCursor();
        return $user->promotion;
    }

    public static function getSection($dbh, $id) {

        $query = "SELECT * FROM `utilisateur` WHERE `id`='$id'";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute();
        $user = $sth->fetch();
        $sth->closeCursor();
        return $user->section;
    }

    public static function testerMdp($dbh, $id, $password) {
        $query = "SELECT * FROM `utilisateur` WHERE `id`='$id'";
        $sth = $dbh->prepare($query);
        $request_succeeded = $sth->execute();
        while ($courant = $sth->fetch(PDO::FETCH_ASSOC)) {
            if ($courant['password'] == sha1($password)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

//   On stocke l'id ainsi que le statut de l'utilisateur dans une variable de session (id pour récupérer certaines informations pour les sondages, 
//    le statut pour générer certaines pages en fonction du niveau de l'utilisateur)
    public static function logIn($dbh) {
        if ((isset($_POST["id"]) && (isset($_POST["password"])))) {
            $id = $_POST["id"];
            $user = Utilisateur::getUtilisateur($dbh, $id);
            if (($user != NULL) && (Utilisateur::testerMdp($dbh, $id, $_POST["password"]))) {
                $_SESSION['loggedIn'] = Utilisateur::getStatut($dbh, $_POST["id"]);
                $_SESSION['id'] = $_POST["id"];
                echo 'Bonjour ' . $_POST["id"];
            }
        }
    }

    public static function logOut() {
        unset($_SESSION['loggedIn']);
        session_destroy();
    }

}

//    classe voyage
class Voyage {

    public $id;
    public $nom;
    public $section;
    public $promotion;
    public $latitude;
    public $longitude;
    public $information;

    public function __toString() {

        return "Voyage réalisé en " . "$this->nom" . " par la section " . $this->section . " " . $this->promotion;
    }

    public function description() {
        return "VOS_à_" . "$this->nom" . "_fait_par_" . "$this->section" . "_" . "$this->promotion" . "_ID_:_" . "$this->id";
    }

    public function getId() {
        return "$this->id";
    }

    public function __toStringInformation() {
        return "$this->information";
    }

    public function __localisation() {
        return "lat: " . "$this->latitude" . ", " . "lng: " . "$this->longitude";
    }

    public static function getVoyage($dbh, $id) {
        $query = "SELECT * FROM `voyage` WHERE `id`='$id'";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Voyage');
        $sth->execute();
        $voy = $sth->fetch();
        $sth->closeCursor();
        return $voy;
    }

    public static function getAllVoyage($dbh) {
        $query = "SELECT * FROM `voyage`";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Voyage');
        $sth->execute();
        $voy = $sth->fetchAll();
        $sth->closeCursor();
        return $voy;
    }

    public static function getVoyageSection($dbh, $section) {
        $query = "SELECT * FROM `voyage` WHERE `section` = '$section'";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Voyage');
        $sth->execute();
        $voy = $sth->fetchAll();
        $sth->closeCursor();
        return $voy;
    }

    public static function getVoyagePromotion($dbh, $promotion) {
        $query = "SELECT * FROM `voyage` WHERE `promotion` = '$promotion'";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Voyage');
        $sth->execute();
        $voy = $sth->fetchAll();
        $sth->closeCursor();
        return $voy;
    }

    public static function ifVoyage($id) {
        global $dbh;
        $query = "SELECT * FROM `voyage` WHERE `id`='$id'";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Voyage');
        $sth->execute();
        $voy = $sth->fetch();
        $sth->closeCursor();
        return $voy;
    }

}
