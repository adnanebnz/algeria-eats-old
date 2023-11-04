<x-default-layout title='Créer un Produit'>
    <form action="{{ route('artisan.products.store') }}" method="POST" enctype="multipart/form-data"
        class="md:px-20 px-3 shadow-sm p-1 pb-4 md:pb-10">
        @csrf
        <div>
            <div class="border-gray-900/10 pb-12">
                <h1 class="text-base font-semibold leading-7 text-gray-900">
                    Créer un produit
                </h1>

                <div class="mt-10 flex md:flex-row flex-col items-center justify-center gap-14">
                    <div class="flex flex-col gap-5 md:w-1/2 w-full">
                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id" />
                        <x-input name="nom" label="Nom" />
                        <x-textarea name="description" label="Description" />
                    </div>
                    <div class="flex flex-col gap-5 md:w-1/2 w-full">
                        <x-input name="categorie" label="Categorie" />
                        <x-input name="sous_categorie" label="Sous Categorie" />
                        <x-input name="prix" label="Prix" />
                    </div>
                    <div class="px-6 md:px-0">
                        <x-input name="images[]" type="file" label="Insérer les Images" />
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit"
                class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                Créer
            </button>
        </div>
    </form>
</x-default-layout>
