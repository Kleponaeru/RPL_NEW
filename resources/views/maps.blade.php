<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maps</title>
    <!-- Add Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        #map {
            height: 814px;
            width: 1684px;
        }
    </style>
</head>

<body>
    <div id="map"></div>
</body>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    var map = L.map('map').setView([0, 0], 30);
    // Add a basemap (e.g., OpenStreetMap)
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href = "http://www.openstreetmap.org/copyright" > OpenStreetMap < /a>'
        }).addTo(map);
    // Get the user's geolocation and add a marker
    navigator.geolocation.getCurrentPosition(function(position) {
        var lat = position.coords.latitude;
        var lon = position.coords.longitude;
        map.setView([lat, lon], 18);
        var userLocation = L.marker([lat, lon]).addTo(map);
        userLocation.bindPopup('You are here!').openPopup();
    });
    // Add a marker to the all destinations
    var locations = <?php echo json_encode($locations); ?>;
            locations.forEach(function(location) {
                L.marker([location.latitude, location.longitude])
                    .addTo(map)
                    .bindPopup('<strong>' + location.nama + '</strong><br>' +
                        'Latitude: ' + location.latitude + '<br>Longitude: ' + location.longitude)
                    .openPopup().on('click', function(){
                        window.location.href = '/' + location.nama;
                    })
            });
</script>

</html>
