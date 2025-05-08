<?php

require "partials/header.php";
require "partials/navbar.php";

?>

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<style>
    html, body {
        height: 100%;
        margin: 0;
        overflow: hidden; /* Prevent scrolling */
    }
</style>

<div class="flex flex-col items-center justify-center h-screen px-4">
    <h1 class="text-3xl font-bold text-blue-600 mb-4">Delivery route</h1>

    <!-- Display the address here -->
    <div id="addressDisplay" class="text-xl font-semibold text-white bg-blue-600 p-3 rounded-lg shadow-lg mb-4 w-full max-w-xl text-center"></div>

    <div id="map" class="w-full max-w-5xl flex-grow h-[60%] rounded-lg shadow-lg border border-gray-300"></div>
</div>

<script>
    const apiKey = "5b3ce3597851110001cf6248a5e3ccc158c3437e942ea6a063b11bef";
    let map;
    let selectedLocation = null;

    function initMap() {
        map = L.map("map").setView([49.6117, 6.13], 13);
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        }).addTo(map);
    }

    function findLocation() {
        if (!selectedLocation) {
            alert("No address selected!");
            return;
        }

        const lon = selectedLocation.geometry.coordinates[0];
        const lat = selectedLocation.geometry.coordinates[1];

        const end = [lon, lat];
        getRoute(end);
    }

    function getRoute(end) {
        navigator.geolocation.getCurrentPosition((position) => {
            const start = [position.coords.longitude, position.coords.latitude];

            const url = `https://api.openrouteservice.org/v2/directions/driving-car?api_key=${apiKey}&start=${start[0]},${start[1]}&end=${end[0]},${end[1]}`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (!data.features || data.features.length === 0) {
                        throw new Error("No route found.");
                    }

                    const routeCoords = data.features[0].geometry.coordinates.map(coord => [coord[1], coord[0]]);

                    map.setView([start[1], start[0]], 13);
                    map.eachLayer(layer => {
                        if (layer instanceof L.Polyline || layer instanceof L.Marker) {
                            map.removeLayer(layer);
                        }
                    });

                    L.polyline(routeCoords, {
                        color: "blue"
                    }).addTo(map);
                    L.marker([start[1], start[0]]).addTo(map).bindPopup("Start").openPopup();
                    L.marker([end[1], end[0]]).addTo(map).bindPopup("Destination").openPopup();
                })
                .catch(error => {
                    console.error("Routing Error:", error);
                    alert("Error retrieving route.");
                });
        }, (error) => {
            console.error("Geolocation Error:", error);
            alert("Could not get your current location.");
        });
    }

    window.onload = () => {
        initMap();

        const urlParams = new URLSearchParams(window.location.search);
        const address = decodeURIComponent(urlParams.get("address"));

        if (address) {
            document.getElementById("addressDisplay").textContent = `Selected address: ${address}`;

            fetch(`https://api.openrouteservice.org/geocode/search?api_key=${apiKey}&text=${encodeURIComponent(address)}&boundary=administrative&boundary.country=LU`)
                .then(response => response.json())
                .then(data => {
                    if (data.features.length === 0) {
                        alert("No matching location found.");
                        return;
                    }
                    selectedLocation = data.features[0];
                    findLocation();
                })
                .catch(error => console.error("Error with auto-fetching address:", error));
        }
    };
</script>

<?php

require "partials/footer.php";

?>
