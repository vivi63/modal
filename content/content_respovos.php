
<div id="floating-panel">
    <input id="address" type="textbox" value="Sydney, NSW">
    <input id="submit" type="button" value="Rentre ta ville">
</div>



<div id="maCarte"></div>




<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('maCarte'), {
            zoom: 4,
            center: {lat: -34.397, lng: 150.644}
        });
        var geocoder = new google.maps.Geocoder();

  document.getElementById('submit').addEventListener('click', function() {
    geocodeAddress(geocoder, map);
  });
}

function geocodeAddress(geocoder, resultsMap) {
  var address = document.getElementById('address').value;
  geocoder.geocode({'address': address}, function(results, status) {
   
   
   if (status === google.maps.GeocoderStatus.OK) {
      resultsMap.setCenter(results[0].geometry.location);
      
      var res = results[0].geometry.location;
      document.getElementById("latitude").value = results[0].geometry.location.lat();
      document.getElementById("longitude").value = results[0].geometry.location.lng();

      
      var marker = new google.maps.Marker({
        map: resultsMap,
        position: res
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
    
  });
}

</script>



<?php
if($_SESSION["loggedIn"]=="1"||$_SESSION["loggedIn"]=="2"){

if (isset($_SESSION["loggedIn"])) {
    echo "<h3>" . 'Rentre ton voyage' . "</h3>";
    $form_values_valid = false;

    if (isset($_POST["nom"]) && $_POST["nom"] != "" &&
            isset($_POST["section"]) && $_POST["section"] != "" &&
            isset($_POST["promotion"]) && $_POST["promotion"] != "" &&
            isset($_POST["latitude"]) && $_POST["latitude"] != "" &&
            isset($_POST["longitude"]) && $_POST["longitude"] != "" &&
            isset($_POST["information"]) && $_POST["information"] != "") {
        insererVoyage($_POST["nom"], $_POST["section"], $_POST["promotion"], $_POST["latitude"], $_POST["longitude"], $_POST["information"]);
        $form_values_valid = true;
        echo "<h4>"."Voyage Enregistré"."</h4>";
        
    }
            }

    if (!$form_values_valid) {
        $promotion=Utilisateur::getPromotion($dbh, $_SESSION['id']);
        $section=Utilisateur::getSection($dbh, $_SESSION['id']);
        printRegisterFormV($promotion,$section);
    }
}
else {
    echo "<h3>"."Tu n'es pas respo VOS"."</h3>"; 
}
?>