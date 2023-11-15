<div>
    <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @forelse ($products as $product)
            <a href="{{ route('product.show', $product) }}" class="group relative block overflow-hidden">
                <button
                    class="absolute end-4 top-4 z-10 rounded-full bg-white p-1.5 text-gray-900 transition hover:text-gray-900/75">
                    <span class="sr-only">Wishlist</span>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                </button>

                <img src="{{ str_starts_with($product->images[0], 'http') ? $product->images[0] : asset('storage/' . $product->images[0]) }}"
                    class="h-64 w-full object-cover transition duration-500 group-hover:scale-105" />

                <div class="relative border border-gray-100 bg-white p-4">
                    <span class="whitespace-nowrap bg-blue-500 text-white px-2 py-1.5 text-xs font-medium">
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
        <div class="mt-10">
            {{ $products->links() }}
        </div>
    </div>
</div>
