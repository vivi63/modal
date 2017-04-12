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
$form_values_valid = false;
$tableauvoyages = Voyage::getAllVoyage($dbh);





if(isset($_POST["id"]) && $_POST["id"] != ""){
$voyage = Voyage::getVoyage($dbh, $_POST["id"]);
if(Voyage::ifVoyage($_POST["id"]) != NULL){
echo "<h3>".$voyage->__ToString()."</h3>";
echo "<br>";
echo "<div class='container-fluid'>"."<div class='row'>"."<div class='col-md-8'>";
echo "<p>".$voyage->__ToStringInformation()."</p>";
echo "</div>"."</div>"."</div>";
echo "<h4>"."<a href='http://localhost/Project/index.php?page=destinations'>Lance une nouvelle recherche</a>"."</h4>";
$form_values_valid = true;
}
else{
echo "<h4>"."Voyage inconnu, veuillez entrer un nouvel identifiant"."</h4>";
}
}

if(isset($_POST["section"]) && $_POST["section"] != ""){
$tableauvoyage = Voyage::getVoyageSection($dbh, $_POST["section"]);
}
if(isset($_POST["promotion"]) && $_POST["promotion"] != ""){
$tableauvoyage = Voyage::getVoyagePromotion($dbh, $_POST["promotion"]);
}


if (!$form_values_valid) {
printSearchForm();
}


echo<<<EOS
    <button id="aa">Recherche par section</button>
    <button id="bb">Recherche par promotion</button>
EOS;

    echo <<<EOS
        <div id="A" >
EOS;
            printSearchFormSection();
            echo "</div>";

        echo <<<EOS
            <div id="B" >
EOS;
                printSearchFormPromotion();
       echo "</div>";


echo <<<EOS
  <div id="maCarte"></div>
EOS;



 ?>
<script>

    
    function initMap() {
        var map = new google.maps.Map(document.getElementById('maCarte'), {
            zoom: 4,
            center: {lat: 20.856614, lng: 2.3522219}
        });

        var bounds = {
            north: 20.856614,
            south: 2.01,
            east: 2.3522219,
            west: 15.45
        };

        // Display the area between the location southWest and northEast.
        map.fitBounds(bounds);

       
        <?php
        foreach($tableauvoyage as $voya) {
            
            echo ("var marker = new google.maps.Marker({");
            echo ("position: {");
            echo $voya->__localisation();
            echo ("},");
            echo ("map: map });");
            echo ("attachSecretMessage(marker, " . '"' . $voya->description()  . '"' . "," . $voya->getId() . ");");
        }
        ?>
    }
            
            
                

    // Attaches an info window to a marker with the provided message. When the
    // marker is clicked, the info window will open with the secret message.
    function attachSecretMessage(marker, secretMessage, id) {
        var infowindow = new google.maps.InfoWindow({
            content: secretMessage
        });

        marker.addListener('click', function () {
            infowindow.open(marker.get('maCarte'), marker);
            document.getElementById("id").value = id;
        });
    }
    
</script>


