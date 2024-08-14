<x-app-layout>
    @section('title')
        {{ 'Przedmiot '. $item->name }}
    @endsection

    <div class="mt-20 p-6">
        <div class="flex">
            <aside>
                <img alt="coś" src="{{ $item->getURLImage() }}" />
            </aside>
            <section>
                <h1 class="text-3xl">{{ $item->name }}</h1>
                <p>{{ $item->getPrice() }}</p>
            </section>
        </div>
        <article class="">
            <p>{!! $item->description !!}</p>
        </article>
    </div>
</x-app-layout>
