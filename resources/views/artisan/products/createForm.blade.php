<x-dashboard-layout :isArtisan=true>
    <form action="{{ route('artisan.products.store') }}" method="POST" enctype="multipart/form-data"
        class="md:px-20 px-3 shadow-sm p-1 pb-4 md:pb-10 mt-5">
        @csrf
        <div>
            <div class="border-gray-900/10 pb-12">
                <h1 class="text-xl font-bold leading-7 text-gray-700">
                    Créer un produit
                </h1>

                <div class="mt-10 flex  flex-col items-center justify-center gap-6">
                    <div class="flex flex-col gap-5 w-full">
                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id" />
                        <x-input name="nom" label="Nom" />
                        <x-textarea name="description" label="Description" />
                    </div>
                    <div class="flex flex-col gap-5 w-full">
                        <div>
                            <label class="block text-sm font-medium leading-6 text-gray-900">
                                Catégorie
                            </label>
                            <select name="categorie"
                                class="form-select block w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6  mt-2">
                                <option>Choisir une catégorie</option>
                                <option value="sucree">Sucré</option>
                                <option value="salee">Salé</option>
                            </select>
                        </div>
                        <x-input name="sous_categorie" label="Sous Categorie" />
                        <x-input name="prix" label="Prix" />
                    </div>
                    <div class="px-6 md:px-0">
                        <x-input name="images[]" type="file" label="Insérer les Images" />
                        @error('images')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit"
                class="rounded-md bg-blue-600 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                Créer le produit
            </button>
        </div>
    </form>
</x-dashboard-layout>
