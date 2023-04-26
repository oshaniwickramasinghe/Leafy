<!DOCTYPE html>
<!--
 @license
 Copyright 2019 Google LLC. All Rights Reserved.
 SPDX-License-Identifier: Apache-2.0
-->
<html>
  <head>
    <title>Distance Matrix Service</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script>
      /**
       * @license
       * Copyright 2019 Google LLC. All Rights Reserved.
       * SPDX-License-Identifier: Apache-2.0
       */
      function initMap() {
        const bounds = new google.maps.LatLngBounds();
        const markersArray = [];
        const map = new google.maps.Map(document.getElementById("map"), {
          center: { lat:7.873053999999999, lng:80.77179699999999 },
          zoom: 8,
        });
        // initialize services
        const geocoder = new google.maps.Geocoder();
        const service = new google.maps.DistanceMatrixService();
        // build request

        const origin1 = { lat:6.850943099999999, lng: 79.9058735 };
        // const origin2 = "University of Jayawardanapura, Colombo";
        // const destinationA = "Homagama, Colombo";
        const destinationB = { lat: 6.8432762, lng: 80.0031833};
        const request = {
          origins: [origin1],
          destinations: [ destinationB],
          travelMode: google.maps.TravelMode.DRIVING,
          unitSystem: google.maps.UnitSystem.METRIC,
          avoidHighways: false,
          avoidTolls: false,
        };

        // put request on page
        document.getElementById("request").innerText = JSON.stringify(
          request,
          null,
          2
        );
        // get distance matrix response
        service.getDistanceMatrix(request).then((response) => {
          
          // put response
          document.getElementById("response").innerText = JSON.stringify(
            response,
            null,
            2
          );

          // show on map
          const originList = response.originAddresses;
          const destinationList = response.destinationAddresses;

          deleteMarkers(markersArray);

          const showGeocodedAddressOnMap = (asDestination) => {
            const handler = ({ results }) => {
              map.fitBounds(bounds.extend(results[0].geometry.location));
              markersArray.push(
                new google.maps.Marker({
                  map,
                  position: results[0].geometry.location,
                  label: asDestination ? "D" : "O",
                })
              );
            };
            return handler;
          };

          for (let i = 0; i < originList.length; i++) {
            const results = response.rows[i].elements;

            geocoder
              .geocode({ address: originList[i] })
              .then(showGeocodedAddressOnMap(false));

            for (let j = 0; j < results.length; j++) {
              geocoder
                .geocode({ address: destinationList[j] })
                .then(showGeocodedAddressOnMap(true));
            }
          }
        });
      }

      function deleteMarkers(markersArray) {
        for (let i = 0; i < markersArray.length; i++) {
          markersArray[i].setMap(null);
        }

        markersArray = [];
      }

      window.initMap = initMap;
    </script>
    <style>
      /**
       * @license
       * Copyright 2019 Google LLC. All Rights Reserved.
       * SPDX-License-Identifier: Apache-2.0
       */
      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      #container {
        height: 100%;
        display: flex;
      }

      #sidebar {
        flex-basis: 15rem;
        flex-grow: 1;
        padding: 1rem;
        max-width: 30rem;
        height: 100%;
        box-sizing: border-box;
        overflow: auto;
      }

      #map {
        flex-basis: 0;
        flex-grow: 4;
        height: 100%;
      }

      #sidebar {
        flex-direction: column;
      }
    </style>
  </head>
  <body>
    <div id="container" style="height: 500px; width: 700px;   margin-left: 20%;  margin-top:10%">
      <div id="map"  ></div>
      <div id="sidebar">
        <h3 style="flex-grow: 0">Request</h3>
        <pre style="flex-grow: 1" id="request"></pre>
        <h3 style="flex-grow: 0">Response</h3>
        <pre style="flex-grow: 1" id="response"></pre>
      </div>


      
    </div>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADhAqLTBZnH5b4b8FFWd7o_1lq6sDrGZY&callback=initMap&v=weekly"
      defer
    ></script>
    <?php


?>
    
  </body>
</html>





