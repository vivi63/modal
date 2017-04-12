
<?php


    echo <<<EOS
      <h2>Bienvenue à toi !</h2>

<p>
 Tu trouveras sur ce site toutes les informations concernant les VOS de tes illustres anciens
</p>
 <blockquote>
<p>Ce site est génial, comme ma b*** </p>

  <p> Victor Chomel</p>
</blockquote>
<h2>Un aperçu des destinations des promotions précédentes</h2>
<p>
 
</p> 

    <div id="maCarte"></div>

EOS;

    
?>

<script>

    
    function initMap() {
        var map = new google.maps.Map(document.getElementById('maCarte'), {
            zoom: 4,
            center: {lat: 20.856614, lng: 12.3522219}
        });

        var bounds = {
            north: 20.856614,
            south: 2.01,
            east: 12.3522219,
            west: 15.45
        };

        // Display the area between the location southWest and northEast.
        map.fitBounds(bounds);

       
        <?php
        $voyagesTout=Voyage::getAllVoyage($dbh);
        foreach($voyagesTout as $voya) {
            
            echo ("var marker = new google.maps.Marker({");
            echo ("position: {");
            echo $voya->__localisation();
            echo ("},");
            echo ("map: map });");
            echo ("attachSecretMessage(marker, " . '"' . $voya->description()  . '"' . ");");
        }
        ?>
    }
            
            
                

    // Attaches an info window to a marker with the provided message. When the
    // marker is clicked, the info window will open with the secret message.
    function attachSecretMessage(marker, secretMessage) {
        var infowindow = new google.maps.InfoWindow({
            content: secretMessage
        });

        marker.addListener('click', function () {
            infowindow.open(marker.get('maCarte'), marker);
        });
    }
    
</script>





