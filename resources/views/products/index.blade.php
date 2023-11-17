<x-default-layout>
    <section class="bg-white">
        <div class="container px-4 pb-5 md:pb-7 mx-auto">
            {{-- START SEARCH FILTER --}}
            <div class="flex flex-col mx-auto mb-16 mt-5 max-w-5xl">
                <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-md">
                    <form class="" method="POST" action="{{ route('product.index') }}">
                        @csrf
                        <div class="relative mb-10 w-full flex  items-center justify-between rounded-md">
                            <svg class="absolute left-2 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" class=""></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
                            </svg>
                            <input type="name" name="search" value="{{ request()->search }}"
                                class="h-12 w-full cursor-text rounded-md border border-gray-100 bg-gray-100 py-4 pr-40 pl-12 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Rechercher par nom du produit" />
                        </div>

                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                            <div class="flex flex-col">
                                <label for="name" class="text-sm font-medium text-stone-600">Nom de
                                    l'artisan</label>
                                <input type="text" id="name" placeholder="John Doe" name="artisan"
                                    value="{{ request()->search }}"
                                    class="mt-2 block w-full rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                            </div>
                            <div class="flex flex-col">
                                <label for="status" class="text-sm font-medium text-stone-600">Note d'artisan</label>

                                <select id="status" name="artisanRating"
                                    class="mt-2 block w-full cursor-pointer rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="">Choisir</option>
                                    <option value="0" @if (request()->artisanRating == 0) selected @endif>0
                                    </option>
                                    <option value="1" @if (request()->artisanRating == 1) selected @endif>1</option>
                                    <option value="2" @if (request()->artisanRating == 2) selected @endif>2</option>
                                    <option value="3" @if (request()->artisanRating == 3) selected @endif>3</option>
                                    <option value="4" @if (request()->artisanRating == 4) selected @endif>4</option>
                                    <option value="5" @if (request()->artisanRating == 5) selected @endif>5</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label for="manufacturer" class="text-sm font-medium text-stone-600">Type de
                                    produit</label>

                                <select id="manufacturer" name="productType"
                                    class="mt-2 block w-full rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="">Choisir</option>
                                    <option value="sucree" @if (request()->productType == 'sucree') selected @endif>Sucré
                                    </option>
                                    <option value="salee" @if (request()->productType == 'salee') selected @endif>Salé
                                    </option>
                                </select>
                            </div>

                            <div class="flex flex-col">
                                <label for="date" class="text-sm font-medium text-stone-600">Note du produit</label>
                                <select id="manufacturer" name="productRating"
                                    class="mt-2 block w-full rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="">Choisir</option>
                                    <option value="0" @if (request()->productRating == 0) selected @endif>0
                                    </option>
                                    <option value="1" @if (request()->productRating == 1) selected @endif>1</option>
                                    <option value="2" @if (request()->productRating == 2) selected @endif>2
                                    </option>
                                    <option value="3" @if (request()->productRating == 3) selected @endif>3
                                    </option>
                                    <option value="4" @if (request()->productRating == 4) selected @endif>4
                                    </option>
                                    <option value="5" @if (request()->productRating == 5) selected @endif>5
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-6 grid w-full grid-cols-2 justify-end space-x-4 md:flex">
                            <button
                                class="rounded-lg bg-gray-200 px-8 py-2 font-medium text-gray-700 outline-none hover:opacity-80 focus:ring">Réinitialiser</button>
                            <button
                                class="rounded-lg bg-blue-600 px-8 py-2 font-medium text-white outline-none hover:opacity-80 focus:ring">Rechercher</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- END SEARCH FILTER --}}
            <div class="lg:flex lg:-mx-2 items-center justify-center">
                <div class="mt-6 lg:mt-0 lg:px-2 ">
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
                    <div>
                        <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                            @forelse ($products as $product)
                                <a href="{{ route('product.show', $product) }}"
                                    class="group relative block overflow-hidden">
                                    <button
                                        class="absolute end-4 top-4 z-10 rounded-full bg-white p-1.5 text-gray-900 transition hover:text-gray-900/75">
                                        <span class="sr-only">Wishlist</span>

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                        </svg>
                                    </button>

                                    <img src="{{ str_starts_with($product->images[0], 'http') ? $product->images[0] : asset('storage/' . $product->images[0]) }}"
                                        class="h-64 w-full object-cover transition duration-500 group-hover:scale-105" />

                                    <div class="relative border border-gray-100 bg-white p-4">
                                        <span
                                            class="whitespace-nowrap bg-blue-500 text-white px-2 py-1.5 text-xs font-medium">
                                            {{ $product->categorie === 'sucree' ? 'Sucrée' : 'Salée' }}
                                        </span>

                                        <h3 class="mt-4 font-medium text-gray-900">{{ $product->nom }}</h3>

                                        <p class="mt-1.5 text-sm text-gray-700">{{ $product->prix }} DA</p>

                                        <form class="mt-4">
                                            <button wire:click.prevent="store({{ $product->id }})"
                                                class="block w-full rounded bg-blue-500 p-4 text-sm font-medium text-white transition hover:scale-105">
                                                Ajouter au panier
                                            </button>
                                        </form>
                                    </div>
                                </a>
                            @empty
                                <p class="text-center text-gray-700">Aucun produit</p>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="mb-5 md:px-11 px-4">
            {{ $products->links() }}
        </div>
    </section>
</x-default-layout>
