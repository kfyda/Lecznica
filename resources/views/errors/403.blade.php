<x-app-layout>
    <div class="flex flex-col items-center justify-center min-h-screen py-20">
        <h1 class="text-4xl font-bold text-gray-800">Błąd 403</h1>
        <p class="mt-4 text-lg text-gray-600">Brak dostępu.</p>
        <a href="{{ route('home') }}" class="mt-6 px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
            Powrót do strony głównej
        </a>
    </div>
</x-app-layout>
