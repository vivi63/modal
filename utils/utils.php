
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8"/>
        <meta name="author" content="Nom de l'auteur"/>
        <meta name="keywords" content="Mots clefs relatifs à cette page"/>
        <meta name="description" content="Descriptif court"/>
        <title>Info VOS</title>
    </head>

    <body>
    </body>
</html>


<?php

function generateHTMLHeader($title) {
    echo <<<EOS
           
          <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
          <link href="../bootstrap/css/perso.css" rel="stylesheet"/>
         <link  href="style.css" rel="stylesheet"  />
         <head>
        <meta charset="UTF-8"/>
        <meta name="author" content="Nom de l'auteur"/>
        <meta name="keywords" content="Mots clefs relatifs à cette page"/>
        <meta name="description" content="Descriptif court"/>
        <title>$title</title>
        </head>
EOS;
}

function generateHTMLFooter() {
    echo "</html>";
}

/*
 * Nav Bar dynamique hors connection 
 */
$page_listhc = array(
    array(
        "name" => "welcome",
        "title" => "Accueil de notre site",
        "menutitle" => "Accueil"),
    array(
        "name" => "destinations",
        "title" => "Les destinations précédentes",
        "menutitle" => "Voir les destinations précédentes"),
    array(
        "name" => "connexion",
        "title" => "Connecte toi ! ",
        "menutitle" => "Connexion"),
    array(
        "name" => "inscription",
        "title" => "Comment s'inscrire ?",
        "menutitle" => "Inscription"),
    array(
        "name" => "contacts",
        "title" => "Qui sommes-nous ?",
        "menutitle" => "Nous contacter"),
);

/*
 * Nav Bar dynamique connection respo vos
 */

$page_listco = array(
    array(
        "name" => "welcome",
        "title" => "Accueil",
        "menutitle" => "Accueil"),
    array(
        "name" => "destinations",
        "title" => "Les destinations précédentes",
        "menutitle" => "Voir les destinations précédentes"),
    
    array(
        "name" => "respovos",
        "title" => "Retex détaillé",
        "menutitle" => "Espace Responsable VOS"),
    array(
        "name" => "account",
        "title" => "Gérer mon Compte",
        "menutitle" => "Mon Compte"),
    array(
        "name" => "deconnexion",
        "title" => "Déconnexion",
        "menutitle" => "Déconnexion"),
    array(
        "name" => "contacts",
        "title" => "Qui sommes-nous ?",
        "menutitle" => "Nous contacter"),
);
if (isset($_SESSION["loggedIn"])) {
    $page_list = $page_listco;
} else {
    $page_list = $page_listhc;
}

function checkPage($askedPage) {
    global $page_list;
    foreach ($page_list as $name => $array) {
        if ($askedPage == $array["name"]) {
            return TRUE;
        }
    }
    return FALSE;
}

$pageTitle = "Erreur";

function getPageTitle($askedPage) {
    global $pageTitle;
    global $page_list;
    foreach ($page_list as $name => $array) {
        if ($askedPage == $array["name"]) {
            $pageTitle = $array["title"];
        }
    }
  echo "<h1>";
    echo "$pageTitle";
    echo "</h1>";
}

function generateMenu($askedPage) {
    global $page_list;
    echo <<<EOS
         <div class="navbar fixed-top navbar-light bg-faded" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
EOS;
    foreach ($page_list as $name => $array) {
        if ($array['name'] == $askedPage) {
            echo "<li>";
        } else {
            echo "<li class='active'>";
        }
        echo "<a href='index.php?page=" . $array['name'] . "'>";
        echo $array['menutitle'];
        echo "</a>";
        echo "</li>";
    }
    echo <<<EOS
         
                        </ul>
                    </div>
                </div>
            </div>
EOS;
}
?>



