<?php
session_name("Session");
// ne pas mettre d'espace dans le nom de session !
session_start();
if (!isset($_SESSION['initiated'])) {
    session_regenerate_id();
    $_SESSION['initiated'] = true;
}
// Décommenter la ligne suivante pour afficher le tableau $_SESSION pour le debuggage
// print_r($_SESSION);
?>


<html>

    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/code.js"></script>


    <?php
    require('utils/utils.php');
    require('log\logInOut.php');
    require('log\printForms.php');

    class Database {

        public static function connect() {
            $dsn = 'mysql:dbname=td3;host=127.0.0.1';
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

    $dbh = Database::connect();
   
    $askedPage = "";
    if (isset($_POST['page'])) {
        $askedPage = $_POST["page"];
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
                <h1>Info VOS<br> <small> Tout savoir sur les VOS des années précédentes</small> </h1>
            </div>


            <div id="content">
                <div>

                    <?php
                    getPageTitle($askedPage);

                    if ($authorized == TRUE) {
                        require "content\content_$askedPage.php";
                        generate();
                    }
                    ?>

                </div>
                <div class="row">
                    <div class="col-md-3 col-md-offset-2">
                        <h3>Vivien Chbicheb</h3>
                        <p>Dieu</p>
                    </div>
                    <div class="col-md-3 col-md-offset-2">
                        <h3>Victor Chomel</h3>
                        <p>Satan</p>
                    </div>
                </div>
            </div>

            <div id="footer">
                <p>Site réalisé en Modal Web </p>
            </div>

        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.js"></script>
    </body>
    <?php
    generateHTMLFooter();
    ?>

