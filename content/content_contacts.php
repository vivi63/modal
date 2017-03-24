<?php
echo <<<EOS
     <div class="row">
                    <div class="col-md-3 col-md-offset-2">
                        <h3>Vivien Chbicheb</h3>
                        <p>Sous-fifre</p>
                    </div>
                    <div class="col-md-3 col-md-offset-2">
                        <h3>Victor Chomel</h3>
                        <p>PDG</p>
                    </div>
                </div>
            </div>
    
    <div id="maCarte"></div>
               
EOS;

$voyages=Voyage::getAllVoyage($dbh);
foreach($voyages as $voya) {
    echo $voya->__ToString();
}
$voyage=Voyage::getVoyage($dbh, 1);
echo $voyage->__localisation();

?>
<script>

    
    function initMap() {
        var map = new google.maps.Map(document.getElementById('maCarte'), {
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
        var message = 'VOS de natation';
        var secretMessages = [message, '2eme VOS', 'Chez moi', 'Nul Part', '3eme VOS'];
        var listeLong = [];
        var listeLat = [];
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
        
        var marker = new google.maps.Marker({
            position: {
                <?php 
                $voyag=Voyage::getVoyage($dbh, 1);
                echo $voyag->__localisation();
                ?>
            },
            map: map
        });
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
