<?php
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
        echo "Voyage Enregistré";
        
    }
            }

    if (!$form_values_valid) {
        printRegisterFormV();
    }

?>


<div id="floating-panel">
    <input id="address" type="textbox" value="Sydney, NSW">
    <input id="submit" type="button" value="Geocode">
</div>



<div id="maCarte"></div>




<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('maCarte'), {
            zoom: 8,
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

echo()
