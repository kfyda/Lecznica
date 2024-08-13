<x-app-layout>
    @section('title')
        {{ 'Kontakt ' }}
    @endsection

    <x-header title="Kontakt" />

    <!-- Kontener na godziny pracy i mapę -->
    <div class="flex flex-col md:flex-row p-3 lg:p-6">
        <!-- Godziny pracy -->
        <div class="w-full md:w-1/2 p-6 bg-gray-100 border-r border-gray-300">
            <h2 class="text-2xl font-semibold mb-4 text-center">Godziny pracy</h2>
            <div class="space-y-2">
                <div class="flex justify-between px-4 py-2 bg-white shadow-sm rounded-md">
                    <span><strong>poniedziałek:</strong></span>
                    <span class="text-green-700">08:00 - 18:00</span>
                </div>
                <div class="flex justify-between px-4 py-2 bg-white shadow-sm rounded-md">
                    <span><strong>wtorek:</strong></span>
                    <span class="text-green-700">08:00 - 18:00</span>
                </div>
                <div class="flex justify-between px-4 py-2 bg-white shadow-sm rounded-md">
                    <span><strong>środa:</strong></span>
                    <span class="text-green-700">08:00 - 18:00</span>
                </div>
                <div class="flex justify-between px-4 py-2 bg-white shadow-sm rounded-md">
                    <span><strong>czwartek:</strong></span>
                    <span class="text-green-700">08:00 - 18:00</span>
                </div>
                <div class="flex justify-between px-4 py-2 bg-white shadow-sm rounded-md">
                    <span><strong>piątek:</strong></span>
                    <span class="text-green-700">08:00 - 18:00</span>
                </div>
                <div class="flex justify-between px-4 py-2 bg-white shadow-sm rounded-md">
                    <span><strong>sobota:</strong></span>
                    <span class="text-green-700">08:00 - 13:00</span>
                </div>
                <div class="flex justify-between px-4 py-2 bg-white shadow-sm rounded-md">
                    <span><strong>niedziela:</strong></span>
                    <span class="text-red-500 font-bold">ZAMKNIĘTE</span>
                </div>
            </div>

            <!-- Dane do kontaktu -->
            <div class="mt-6">
                <h2 class="text-2xl font-semibold mb-4 text-center">Dane do kontaktu</h2>
                <div class="space-y-2">
                    <div class="flex justify-between px-4 py-2 bg-white shadow-sm rounded-md">
                        <span><strong>Adres lecznicy:</strong></span>
                        <a href="https://www.google.com/maps/place/Lecznica+Weterynaryjna+%22Soczek%22/@49.6280425,20.9572105,134m/data=!3m1!1e3!4m6!3m5!1s0x473dc2822f10277f:0xc76b84267a0a0310!8m2!3d49.6281411!4d20.9574381!16s%2Fg%2F1tg_kdq4?entry=ttu" class="text-black-500 hover:underline">Biała Niżna 345, Grybów, Polska</a>
                    </div>
                    <div class="flex justify-between px-4 py-2 bg-white shadow-sm rounded-md mt-2">
                        <span><strong>Telefon:</strong></span>
                        <a href="tel:184450409" class="text-black-500 hover:underline">18 445 04 09</a>
                    </div>
                    <div class="flex justify-between px-4 py-2 bg-white shadow-sm rounded-md mt-2">
                        <span><strong>Adres e-mail:</strong></span>
                        <a href="mailto:soczek@post.pl" class="text-black-500 hover:underline">soczek@post.pl</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mapa -->
        <div class="w-full md:w-1/2 p-6 flex justify-center md:justify-end">
            <div id="map" class="w-full h-[400px] md:w-[800px] md:h-[600px] bg-gray-200"></div>
        </div>
    </div>

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
