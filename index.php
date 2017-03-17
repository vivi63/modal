<?php
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
    require('utils/utils.php');
    require('log/printForms.php');
    require('DataBaseClass.php');



    $dbh = Database::connect();

    $askedPage = "";
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
    $askedPage = "";

    function ini() {
        global $askedPage;
        if (isset($_GET['page'])) {
            $askedPage = $_GET['page'];
        }
    }

    ini();

    $authorized = checkPage($askedPage);
    if ($authorized == TRUE) {
        $pageTitle = getPageTitle($askedPage);
    }
    generateHTMLHeader($pageTitle, "bootstrap.css");
    ?>

    <body>
        <div class="container">
            <?php
            generateMenu($askedPage);
            ?>

            <div class="jumbotron">
                <h1>Info VOS<br> </h1>
            </div>

            <div id="content">
                <div>
                    <?php
                    getPageTitle($askedPage);
                    if ($authorized == TRUE) {
                        require "content/content_$askedPage.php";
                    }
                    ?>
                </div>

                
                <div id="footer">
                    <p>Site réalisé en Modal Web </p>
                </div>

            </div>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="js/jquery.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.js"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9eT0FeDkrXqf1-IHAn0hE54hMDrCo5Ws&callback=initMap&signed_in=true" async defer>
        </script>
        </div>
        
    </body>
    <?php
    generateHTMLFooter();
    ?>

