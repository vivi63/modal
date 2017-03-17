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

                <div id="MaCarte"></div>
        <script>
            function initMap() {
                var map = new google.maps.Map(document.getElementById('MaCarte'), {
                    zoom: 4,
                    center: {lat: -25.363882, lng: 131.044922}
                });

                var bounds = {
                    north: -25.363882,
                    south: -31.203405,
                    east: 131.044922,
                    west: 125.244141
                };

                // Display the area between the location southWest and northEast.
                map.fitBounds(bounds);

                // Add 5 markers to map at random locations.
                // For each of these markers, give them a title with their index, and when
                // they are clicked they should open an infowindow with text from a secret
                // message.
                var secretMessages = ['1er VOS', '2eme VOS', 'Chez moi', 'Nul Part', '3eme VOS'];
                var lngSpan = bounds.east - bounds.west;
                var latSpan = bounds.north - bounds.south;
                for (var i = 0; i < secretMessages.length; ++i) {
                    var marker = new google.maps.Marker({
                        position: {
                            lat: bounds.south + latSpan * Math.random(),
                            lng: bounds.west + lngSpan * Math.random()
                        },
                        map: map
                    });
                    attachSecretMessage(marker, secretMessages[i]);
                }
            }

            // Attaches an info window to a marker with the provided message. When the
            // marker is clicked, the info window will open with the secret message.
            function attachSecretMessage(marker, secretMessage) {
                var infowindow = new google.maps.InfoWindow({
                    content: secretMessage
                });

                marker.addListener('click', function () {
                    infowindow.open(marker.get('map'), marker);
                });
            }

        </script>
        

                <div id="footer">
                    <p>Site réalisé en Modal Web </p>
                </div>

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

