<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Klinika weterynaryjna Soczek oferuje kompleksową opiekę nad zwierzętami. Leczenie, profilaktyka i porady weterynaryjne dla psów, kotów i innych zwierząt domowych.">
    <meta name="keywords"
          content="lecznica weterynaryjna, klinika weterynaryjna, weterynarz, weterynaria, weterynarz Grybów, opieka nad zwierzętami, leczenie zwierząt, Janusz Soczek, chirurgia tkanek miękkich, dermatologia, EKG, RTG, USG, fryzjerstwo dla zwierząt, ortopedia, sterylizacja, kastracja, okulistyka, stomatologia, badania laboratoryjne, szczepienia ochronne, rozród, położnictwo, chirurgia ogólna, opieka weterynaryjna, zdrowie zwierząt, szczepienia, profilaktyka, badania zwierząt">
    <meta name="robots" content="index, follow">
    <meta name="language" content="pl">
    <meta property="og:title" content="Lecznica Weterynaryjna Soczek - Grybów">
    <meta property="og:description"
          content="Profesjonalna opieka weterynaryjna w Grybowie. Specjalizujemy się w chirurgii tkanek miękkich, dermatologii, ortopedii, stomatologii, oraz wielu innych dziedzinach.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://www.lecznicasoczek.pl">
    <meta property="og:image" content="http://www.lecznicasoczek.pl/logo.jpg">


    <title>Lecznica "Soczek" - @yield('title')</title>

    <link rel="icon" href="{{ asset('Images/logo_lecznicy.jpg') }}">
    <!-- Fonts -->
    {{--        <link rel="preconnect" href="https://fonts.bunny.net">--}}
    {{--        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
          rel="stylesheet">
    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
    <body class="relative font-pt-sans antialiased">
        <div id="topRef"></div>
        @livewireScripts
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="text-black dark:text-white">
                {{ $slot }}
            </main>
            @include('layouts.footer')
        </div>

        <button onClick="document.getElementById('topRef').scrollIntoView({ behavior: 'smooth'});" class="topBtn"
                title="Wróć na początek strony">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                style="width: 24px; height: 24px; color: white;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75 12 3m0 0 3.75 3.75M12 3v18" />
            </svg>
        </button>
    </body>
</html>
