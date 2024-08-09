<x-app-layout>
    <!-- Wyśrodkowany nagłówek -->
    <div class="p-6 text-center">
        <h1 class="text-6xl text-green-500 font-semibold underline underline-offset-4">
            Kontakt
        </h1>
    </div>

    <!-- Mapa na pełną stronę -->
    <div id="map" class="w-full h-screen"></div>

    <!-- Skrypt Google Maps API -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChoSm7vMADJiut434Gld8tRP4TjD8Al9U&callback=initMap&v=weekly"
        defer
    ></script>

    <script>
        function initMap() {
            const location = { lat: 49.6281411, lng: 20.9574381 }; // Współrzędne lokalizacji
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: location,
            });
            new google.maps.Marker({
                position: location,
                map: map,
                title: "Lecznica Weterynaryjna 'Soczek'",
            });
        }
    </script>
</x-app-layout>
