<x-app-layout>
    @section('title')
        {{ 'Przedmiot '. $item->name }}
    @endsection

    <h1>{{ $item->name }}</h1>
</x-app-layout>
