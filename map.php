<!DOCTYPE html >
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Google Map</title>
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
    </style>
</head>

<html>
<body>
    <div id="map"></div>

    <script>
    var customLabel = {
        Park: {
        label: 'P'
        },
        Departmentstore: {
        label: 'D'
        },
        Temple: {
        label: 'T'
        }
    };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(13.694000,100.645767),
        zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
        downloadUrl('http://localhost/maps/xml.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
            var id = markerElem.getAttribute('id');
            var name = markerElem.getAttribute('name');
            var address = markerElem.getAttribute('address');
            var type = markerElem.getAttribute('type');
            var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));

            var infowincontent = document.createElement('div');
            var strong = document.createElement('strong');
            strong.textContent = name
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));

            var text = document.createElement('text');
            text.textContent = address
            infowincontent.appendChild(text);
            var icon = customLabel[type] || {};
            var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
            });
            marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
            });
            });
        });
        }



    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
        if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {}
    </script>
    
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfJRU0wxWzMCTR6yn0YE7BgFeV2UJBM3U&callback=initMap"
type="text/javascript"></script>

</body>
</html>