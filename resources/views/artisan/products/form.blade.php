<x-default-layout title='Modifier le Produit'>
    <form action="{{ route('artisan.products.update', ['product' => $product]) }}" method="POST"
        enctype="multipart/form-data" class="md:px-20 px-3 shadow-sm p-1 pb-4 md:pb-10">
        @csrf
        @method('PUT')
        <div>
            <div class="border-gray-900/10 pb-12">
                <h1 class="text-base font-semibold leading-7 text-gray-900">
                    Modifier un Produit
                </h1>

                <div class="mt-10 flex md:flex-row flex-col items-center justify-center gap-14">
                    <div class="flex flex-col gap-5 md:w-1/2 w-full">
                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id" />
                        <x-input name="nom" label="Nom" :value="$product->nom" />
                        <x-textarea name="description" label="Description">{{ $product->description }}</x-textarea>
                    </div>
                    <div class="flex flex-col gap-5 md:w-1/2 w-full">
                        <div>
                            <label class="block text-sm font-medium leading-6 text-gray-900">
                                Catégorie
                            </label>
                            <select name="categorie"
                                class="form-select block w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 mt-2">
                                <option>Choisir une catégorie</option>
                                <option value="sucree" @if ($product->categorie === 'sucree') selected @endif>Sucré</option>
                                <option value="salee" @if ($product->categorie === 'salee') selected @endif>Salé</option>
                            </select>
                        </div>
                        <x-input name="sous_categorie" label="Sous Categorie" :value="$product->sous_categorie" />
                        <x-input name="prix" label="Prix" :value="$product->prix" />
                    </div>
                    <div class="px-6 md:px-0">
                        <p class="text-gray-900 text-sm">Images actuelles</p>
                        <div class="grid grid-cols-3 gap-3 my-3">
                            @foreach ($product->images as $image)
                                <img src="{{ str_starts_with($image, 'http') ? $image : asset('storage/' . $image) }}"
                                    alt="" class="w-20 h-20 object-cover rounded-sm">
                            @endforeach
                        </div>
                        <x-input name="images[]" type="file" label="Insérer les nouvelles images" />
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit"
                class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                {{ $product->exists() ? 'Mettre à jour' : 'Créer' }}
            </button>
        </div>
    </form>
</x-default-layout>
