<x-dashboard-layout :isArtisan=true>
    <div class="bg-white p-8 rounded-md w-full">
        <div class=" flex items-center justify-between pb-0">
            <div>

            </div>

            <div class="lg:ml-40 ml-8 space-x-4">
                <button
                    class="bg-blue-600 mt-4 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">Ajouter
                    un Produit</button>
            </div>
        </div>
    </div>
    <div class="bg-white pb-8 pl-8 pr-8 rounded-md w-full">
        <div class="flex items-center justify-between pb-6">
            <!-- Add any header content here -->
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
                                    titre
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Type
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    sous-type
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
                            @foreach ($products as $product)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $product->id }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $product->nom }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $product->categorie }}</td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $product->categorie }}</td>
                                    {{-- TODO ADD COL TO DB --}}
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $product->prix }}
                                        DA</td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm flex items-center justify-center gap-3">
                                        <a href="#"
                                            class="bg-blue-700 text-white px-3 py-2 rounded-md hover:bg-blue-500">Voir</a>
                                        <a href="#"
                                            class="bg-green-600 text-white px-3 py-2 rounded-md hover:bg-green-300">Modifier</a>
                                        <button
                                            class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-400">Supprimer</button>
                                        {{-- TODO ADD LINKS AND PAGINATE THIS  --}}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
