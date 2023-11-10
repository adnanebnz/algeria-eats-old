<x-default-layout>
    <section class="bg-white">
        <div class="container px-4 pb-20 mx-auto">
            <div class="lg:flex lg:-mx-2">
                <div class="space-y-3 lg:w-1/5 lg:px-2 lg:space-y-4">
                    <div class="block font-semibold text-gray-800">CATEGORIES</div>
                    <a href="#" class="block font-medium text-gray-500 hover:underline">Sucré</a>
                    <a href="#" class="block font-medium text-gray-500  hover:underline">Salé</a>
                </div>

                <div class="mt-6 lg:mt-0 lg:px-2 lg:w-4/5 ">
                    <div class="flex items-center justify-between text-sm tracking-widest uppercase ">

                        <div class="flex items-center gap-2">
                            <p class="text-gray-500 ">TRIER</p>
                            <select class="font-medium text-gray-700 bg-transparent focus:outline-none">
                                <option value="#">Recommandé</option>
                                <option value="#">Note</option>
                                <option value="#">Prix</option>
                            </select>
                        </div>
                    </div>
                    <livewire:product-component />
                </div>
            </div>
        </div>
    </section>
</x-default-layout>
