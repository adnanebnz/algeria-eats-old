<x-dashboard-layout :isArtisan=true>
    <div class="bg-white pt-8 md:px-5 rounded-md w-full">
        <div class=" flex items-center justify-between">
            <div>
            </div>
            <div class="md:ml-40 md:space-x-4">
                <a href="{{ route('artisan.products.new') }}"
                    class="bg-blue-600 px-4 py-2.5 rounded-md text-white font-semibold tracking-wide hover:bg-blue-700">Ajouter
                    un Produit</a>

            </div>
        </div>
    </div>
    <div class="bg-white md:px-4 px-1 rounded-md w-full">
        <div class="flex items-center justify-between pb-6">
        </div>
        <div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Id
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Image
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    titre
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Categorie
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    sous-Categorie
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Prix
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $product->id }}
                                    </td>
                                    <td>
                                        <img src="{{ str_starts_with($product->images[0], 'http') ? $product->images[0] : asset('storage/' . $product->images[0]) }}"
                                            alt="" class="w-20 h-20 object-cover">
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $product->nom }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $product->categorie === 'sucree' ? 'Sucré' : 'Salé' }}</td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $product->sous_categorie }}</td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $product->prix }}
                                        DA</td>
                                    <td class="px-5 py-5 bg-white text-sm flex items-center justify-center gap-3 mt-1">
                                        <a href="{{ route('artisan.products.show', ['product' => $product]) }}"
                                            class="bg-indigo-700 text-white px-3 py-2 rounded-md hover:bg-indigo-500">Voir</a>
                                        <a href="{{ route('artisan.products.edit', ['product' => $product]) }}"
                                            class="bg-green-600 text-white px-3 py-2 rounded-md hover:bg-green-300">Modifier</a>
                                        <form action="{{ route('artisan.products.destroy', ['product' => $product]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-400">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-slate-400 text-center p-4" colspan="7">Aucun résultat.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
