<!DOCTYPE html>
<html>

<head>
    <title>Ma carte</title>
    <!-- Inclure des liens vers les bibliothèques Leaflet CSS et JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
</head>

<body>
    <?php
    // Connexion à la base de données
    $servername = "192.168.64.200";
    $username = "root";
    $password_db = "root";
    $dbname = "TpGPS";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Vérifiez la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Récupérez les coordonnées GPS depuis la base de données
    $sql = "SELECT latitude, longitude, date FROM trame";
    $result = $conn->query($sql);

    $locations = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $locations[] = array("latitude" => $row["latitude"], "longitude" => $row["longitude"], "date" => $row["date"]);
        }
    }

    $conn->close();
    ?>



    <div id="map" style="width: 1650px; height: 600px;"></div>
    <script>
        var map = L.map('map').setView([49.8951, 2.3022], 8);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var locations = <?php echo json_encode($locations); ?>; // Assurez-vous que $locations est un tableau JSON

        var markers = [];

        // Ajoutez des marqueurs et stockez-les dans le tableau markers
        locations.forEach(function(location) {
            var marker = L.marker([location.latitude, location.longitude])
                .bindPopup('Coordonnées GPS : ' + location.latitude + ', ' + location.longitude + '<br>Date : ' + location.date)
                .addTo(map);
            markers.push(marker);
        });

        // Créez une polyline à partir des coordonnées des marqueurs
        var polyline = L.polyline(markers.map(function(marker) {
            return marker.getLatLng();
        })).addTo(map);
    </script>

</body>

</html>