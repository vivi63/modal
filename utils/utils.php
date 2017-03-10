
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8"/>
        <meta name="author" content="Nom de l'auteur"/>
        <meta name="keywords" content="Mots clefs relatifs à cette page"/>
        <meta name="description" content="Descriptif court"/>
        <title>Titre de ma page</title>
    </head>

    <body>
    </body>
</html>


<?php

function generateHTMLHeader($title, $link) {
    echo <<<EOS
          <link rel="stylesheet" type="text/css" href="Style.css" />
          <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
          <link href="../bootstrap/css/perso.css" rel="stylesheet">
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

$page_list= array(
    array(
        "name" => "welcome",
        "title" => "Accueil de notre site",
        "menutitle" => "Accueil"),
    array(
        "name" => "destinations",
        "title" => "Les destinations précédentes",
        "menutitle" => "Voir les destinations précédentes"),
    
    array(
        "name" => "photo",
        "title" => "Albums Photos",
        "menutitle" => "Voir les albums photos"),
    array(
        "name" => "respovos",
        "title" => "Retex détaillé",
        "menutitle" => "Espace Responsable VOS"),
     array(
        "name" => "inscription",
        "title" => "Comment s'inscrire ?",
        "menutitle" => "Inscription"),
     array(
        "name" => "connexion",
        "title" => "Connecte toi ! ",
        "menutitle" => "Connexion"),
    array(
        "name" => "contacts",
        "title" => "Qui sommes-nous ?",
        "menutitle" => "Nous contacter"),
);

function checkPage($askedPage) {
    global $page_list;
    foreach ($page_list as $name => $array) {
        if ($askedPage == $array["name"]) {
            return TRUE;
        }
    }
    return FALSE;
}

$pageTitle="Erreur";

function getPageTitle($askedPage){
    global $pageTitle;
    global $page_list;
    foreach ($page_list as $name => $array) {
        if ($askedPage == $array["name"]) {
            $pageTitle=$array["title"];
            
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
        if($array['name']==$askedPage){
            echo "<li>";
        }
        else{
            echo "<li class='active'>";
        }
        echo "<a href='index.php?page=".$array['name']."'>";
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



