<x-app-layout>
    <div class="flex flex-col justify-center p-6">
        <h1 class="text-[64px] text-green-500 text-center font-semibold underline underline-offset-[16px]">Ogłoszenia</h1>

        <section class="mt-6 p-6 w-4/5 bg-blue-300 space-y-12">
            {{--Ogłoszenia--}}
            <div class="flex gap-4">
                {{--Zdjęcie--}}
                <div class="bg-red-500 w-1/3"></div>
                {{--Ogłoszenie 1--}}
                <article class="w-2/3">
                    <h3 class="text-2xl mb-3">Ogłoszenie 1</h3>
                    <p class="text-justify">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat malesuada euismod.
                        Vestibulum imperdiet lorem eget convallis tempor. Suspendisse accumsan lorem ultricies urna
                        tristique, nec tristique nunc cursus. Proin eu ipsum pellentesque, accumsan est ac, consequat velit.
                        Sed metus turpis, scelerisque at orci sed, fermentum placerat leo. Donec convallis lorem nec nisl
                        commodo rhoncus. Maecenas sit amet vehicula leo, at malesuada dolor. Vestibulum ante ipsum primis in
                        faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque in leo enim. Morbi maximus mi
                        nisl, id interdum enim vehicula quis. Morbi quis tincidunt ligula. Curabitur dapibus orci dignissim
                        scelerisque pretium. Vivamus hendrerit nec massa eget commodo. Duis pulvinar eget orci id
                        dictum.
                    </p>
                </article>
            </div>

            <div class="flex gap-4">
                {{--Zdjęcie--}}
                <div class="bg-blue-500 w-1/3"></div>
                {{--Ogłoszenie 2--}}
                <article class="w-2/3">
                    <h3 class="text-2xl mb-3">Ogłoszenie 2</h3>
                    <p class="text-justify">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat malesuada euismod.
                        Vestibulum imperdiet lorem eget convallis tempor. Suspendisse accumsan lorem ultricies urna
                        tristique, nec tristique nunc cursus. Proin eu ipsum pellentesque, accumsan est ac, consequat velit.
                        Sed metus turpis, scelerisque at orci sed, fermentum placerat leo. Donec convallis lorem nec nisl
                        commodo rhoncus. Maecenas sit amet vehicula leo, at malesuada dolor. Vestibulum ante ipsum primis in
                        faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque in leo enim. Morbi maximus mi
                        nisl, id interdum enim vehicula quis. Morbi quis tincidunt ligula. Curabitur dapibus orci dignissim
                        scelerisque pretium. Vivamus hendrerit nec massa eget commodo. Duis pulvinar eget orci id
                        dictum.
                    </p>
                </article>
            </div>
        </section>
    </div>
</x-app-layout>
