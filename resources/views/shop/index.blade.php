<x-app-layout>
    @section('title')
        {{ 'Sklep' }}
    @endsection

    <x-header title="Katalog produktów" />

    <div class="p-6">
        <livewire:shop-search />
    </div>
</x-app-layout>
