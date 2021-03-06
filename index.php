<?php
//    connexion à la session
session_name("session");
session_start();
if (!isset($_SESSION['initiated'])) {
    session_regenerate_id();
    $_SESSION['initiated'] = true;
}
?>


<html>

    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/code.js"></script>
    
    <?php
    //    appel des fichiers 
    require('utils/utils.php');
    require('log/printForms.php');
    require('DataBaseClass.php');

    $dbh = Database::connect();
    $askedPage ="";
    if (isset($_POST['page'])) {
        $askedPage = $_POST["page"];
    }
    if (isset($_POST['todo'])) {
        if ($_POST['todo'] == "login") {
            Utilisateur::logIn($dbh);
        }
    }
    ?>
    
    <?php
    
     $askedPage="A";
    function ini() {
        global $askedPage;
        if (isset($_GET['page'])) {
            $askedPage = $_GET['page'];
        }
    }

    ini();
    //    vérification que l'on est sur une page au contenu valide
     $authorized = checkPage($askedPage);
     generateHTMLHeader($pageTitle);
     
     //    sécurisation des tableaux
     secure($_POST);
     secure($_GET);
     secure($_SESSION);
    
    ?>
    <body>
        <div class="container">
            <div class="page-header">
                 <img  src="pic/z.png" alt="avion"    height="60px" style="float:left;margin:22px 20px 0 0px;"/>
                <span class="titre">Info VOS</span>  
            </div>
            <?php
            //    générer barre de navigation
            generateMenu($askedPage); 
            ?>
            <div id="content">
                <div>
                    <?php
                    if ($authorized) {
                         getPageTitle($askedPage);
                        require "content/content_$askedPage.php";
                    }
                    else{
                        //    page par défaut
                         require "content/content_all.php";
                    }
                    ?>
                </div>

                 </div>
        
            <div id="footer">
                    <p>Site réalisé en Modal Web </p>
                </div>

           
           
        </div>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9eT0FeDkrXqf1-IHAn0hE54hMDrCo5Ws&callback=initMap&signed_in=true" async defer>
        </script>
    </body>
    <?php
    generateHTMLFooter();
    ?>

</html>

