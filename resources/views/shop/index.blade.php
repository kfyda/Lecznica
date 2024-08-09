<x-app-layout>
    <div class="p-6">
        <h1 class="text-[64px] text-green-500 text-center font-semibold underline underline-offset-[16px]">Sklep</h1>

        <div>
            @foreach($items as $item)
                <h2>{{ $item->name }}</h2>
            @endforeach
        </div>
    </div>
</x-app-layout>
