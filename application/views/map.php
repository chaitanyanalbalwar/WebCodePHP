<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Map View</title>
        <link href="<?php echo base_url();?>images/logo/logo.jpeg" rel="icon">

    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>
    <div id="floating-panel">
    <b>Mode of Travel: </b>
    <select id="mode">
      <option value="DRIVING">Driving</option>
      <option value="WALKING">Walking</option>
      <option value="BICYCLING">Bicycling</option>
      <option value="TRANSIT">Transit</option>
    </select>
    </div>
    <input type="hidden" id="lat">
        <input type="hidden" id="long">

    <div id="map"></div>
    <div id="msg"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEUpMCzyUSq20aQbmtH90UvrQZUvGyQkg&callback=initMap">
    </script>
    <script>
      function initMap() {
          
          navigator.geolocation.getCurrentPosition(
            function( position ){ // success cb

                /* Current Coordinate */
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                var google_map_pos = new google.maps.LatLng( lat, lng );

                /* Use Geocoder to get address */
                var google_maps_geocoder = new google.maps.Geocoder();
                google_maps_geocoder.geocode(
                    { 'latLng': google_map_pos },
                    function( results, status ) {
                        if ( status == google.maps.GeocoderStatus.OK && results[0] ) {
                                                console.log(results[0].address_components[6].long_name );
                        console.log(results);
                        var lat11=results[0].geometry.viewport.Va.i;
                        var long12=results[0].geometry.viewport.Za.i;
                        
                        sessionStorage.setItem("lat31", lat11);
                        sessionStorage.setItem("long32", long12);

                        $("#lat").val(lat11);
                        $("#long").val(long12);
                        
                
                        }
                    }
                );
            },
            function(){ // fail cb
            }
        );
          
          
        var directionsRenderer = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: {lat: 15.2993, lng: 74.1240}
        });
        directionsRenderer.setMap(map);

        calculateAndDisplayRoute(directionsService, directionsRenderer);
        document.getElementById('mode').addEventListener('change', function() {
          calculateAndDisplayRoute(directionsService, directionsRenderer);
        });
      }

      function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        var selectedMode = document.getElementById('mode').value;
        var lat21=sessionStorage.getItem("lat31");
        var long22=sessionStorage.getItem("long32");
        directionsService.route({
          origin: {lat: <?php echo $restaurant->latitude;?> , lng: <?php echo $restaurant->longitude;?>},  // Haight.
          destination: {lat: parseFloat(long22), lng: parseFloat(lat21)},  // Ocean Beach.
          // Note that Javascript allows us to access the constant
          // using square brackets and a string value as its
          // "property."
          travelMode: google.maps.TravelMode[selectedMode]
        }, function(response, status) {
          if (status == 'OK') {
            directionsRenderer.setDirections(response);
                    var directionsData = response.routes[0].legs[0]; // Get data about the mapped route
                    if (!directionsData) {
                      window.alert('Directions request failed');
                      return;
                    }
                    else {
                        document.getElementById('msg').innerHTML='';
                      document.getElementById('msg').innerHTML += " Distance is " + directionsData.distance.text + " (" + directionsData.duration.text + ").";
                    }

          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
   
  </body>
</html>

