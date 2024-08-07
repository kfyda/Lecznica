<footer class="bg-[#F1FFF0] text-grey-800 py-8 bottom-0">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
        <!-- Logo lecznicy -->
        <div class="text-center mb-4 w-full md:w-1/3 pl-8">
            <img class="border-2 border-green-600 rounded-lg" src="{{ asset('Images/logo_lecznicy.jpg') }}" alt="Logo Lecznica Weterynaryjna Soczek" class="w-32 mx-auto mb-4">
        </div>

        <!-- Centralne informacje -->
        <div class="text-center mb-6 w-full md:w-1/3">
            <h3 class="text-4xl font-bold mb-6">Lecznica Weterynaryjna "SOCZEK"</h3>
{{--            <p class="text-sm">Zapewniamy najlepszą opiekę dla Twoich zwierząt</p>--}}
            <p class="text-1xl">Kotek, piesek, koń czy krowa się przy Soczku dobrze chowa...</p>
        </div>

        <!-- Sekcja z danymi kontaktowymi -->
        <div class="flex flex-col md:flex-row items-start mb-6 md:mb-0 w-full md:w-1/3 md:justify-end pr-4 md:pr-10">
            <div class="mb-6 md:mb-0">
                <h4 class="text-xl font-semibold mb-2">Kontakt</h4>
                <div class="flex items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="1 0 24 24" fill="currentColor" class="w-6 h-6 mr-2">
                        <path d="M12 2C8.14 2 5 5.14 5 9c0 4.33 4.22 8.94 6.38 10.88.37.33.9.33 1.28 0C14.78 17.94 19 13.33 19 9c0-3.86-3.14-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                    </svg>
                    <p class="text-sm">Biała Niżna 345, Grybów, Polska</p>
                </div>
                <div class="flex items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2">
                        <path d="M6.62 10.79a15.3 15.3 0 006.59 6.59l2.2-2.2a1.01 1.01 0 011.11-.23c1.12.45 2.33.7 3.6.7.55 0 1 .45 1 1v3.5c0 .55-.45 1-1 1C10.24 22 2 13.76 2 3.5c0-.55.45-1 1-1H6.5c.55 0 1 .45 1 1 0 1.27.25 2.48.7 3.6.13.35.04.75-.24 1.03l-2.2 2.2z"/>
                    </svg>
                    <p class="text-sm">18 445 04 09</p>
                </div>
                <div class="flex items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2">
                        <path d="M12 12.713L.015 3.427A2.988 2.988 0 0 1 3 2h18c1.19 0 2.229.667 2.984 1.427L12 12.713zM12 14.287l-2.063-1.592L2 20h20l-7.937-7.305L12 14.287zM0 4.697v14.605l7.938-7.937L0 4.697zm24 0l-7.938 7.938L24 19.302V4.697z"/>
                    </svg>
                    <p class="text-sm">soczek@post.pl</p>
                </div>
                <!-- Sekcja z logo Facebooka -->
                <div class="flex items-center mb-6 md:mb-0 w-full md:justify-end pr-4 md:pr-20 mt-12">
                    <a href="https://www.facebook.com/Lecznica.Soczek/?locale=pl_PL" class="text-blue-600 hover:text-blue-400 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-16 h-16" viewBox="0 0 24 24">
                            <path d="M22.675 0H1.325C.594 0 0 .593 0 1.326v21.348C0 23.406.594 24 1.325 24H12.82v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.894-4.788 4.659-4.788 1.325 0 2.464.099 2.797.143v3.243l-1.918.001c-1.504 0-1.794.714-1.794 1.76v2.308h3.587l-.467 3.622h-3.12V24h6.116c.73 0 1.325-.594 1.325-1.326V1.326C24 .593 23.406 0 22.675 0z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Prawa autorskie na dole -->
    <div class="text-center">
        <p class="text-sm text-gray-500">© 2024 Lecznica Weterynaryjna "SOCZEK". Wszelkie prawa zastrzeżone.</p>
    </div>
</footer>
