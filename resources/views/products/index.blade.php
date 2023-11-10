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

                    <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        @forelse ($products as $product)
                            <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                                <img class="object-cover w-full rounded-md h-72 xl:h-80"
                                    src="{{ $product->images[0] }}">
                                <h4 class="mt-2 text-lg font-medium text-gray-700"> {{ $product->nom }}
                                </h4>
                                <p class="text-blue-500 font-medium">{{ $product->prix }} DA</p>

                                <button
                                    class="flex items-center justify-center w-full px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-1" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                    </svg>
                                    <a href="#" class="mx-1">Ajouter au panier</a>
                                </button>
                            </div>
                        @empty
                            <p class="text-center text-gray-700">Aucun produit</p>
                        @endforelse
                    </div>
                    <div class="mt-10">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-default-layout>
