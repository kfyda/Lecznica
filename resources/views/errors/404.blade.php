<x-app-layout>
    <div class="flex flex-col items-center justify-center min-h-screen py-20">
        <h1 class="text-4xl font-bold text-gray-800">Błąd 404</h1>
        <p class="mt-4 text-lg text-gray-600">Nie odnaleziono strony.</p>
        <a href="{{ route('home') }}" class="mt-6 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
            Powrót do strony głównej
        </a>
    </div>
</x-app-layout>
