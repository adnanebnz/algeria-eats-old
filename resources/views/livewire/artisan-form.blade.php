<form wire:submit.prevent="submit" method="POST" novalidate>
    @csrf
    <div class="flex flex-col gap-8">
        <div class="flex flex-row gap-8">
            <div class="w-1/2 flex flex-col gap-4">
                <x-input name="nom" label="Nom" type="text" />
                <x-input name="prenom" label="Prénom" type="text" />
                <x-input name="num_telephone" label="Numéro de teléphone" type="text" />
                <x-input name="adresse" label="Adresse" type="text" />
                <x-input name="wilaya" label="Wilaya" type="text" />
                {{-- TODO REPLACE WITH SEELCT --}}
                <x-textarea name="desc_entreprise" label="Description Entreprise" />

            </div>
            <div class="w-1/2 flex flex-col gap-4">
                <x-input name="heure_ouverture" label="Heure d'ouverture" type="time" />
                <x-input name="heure_fermeture" label="Heure de fermeture" type="time" />
                <div>
                    <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Type Service</label>
                    <select name="type_service" wire:model='type_service'
                        class="form-select w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
                        <option value="sucree">Sucré</option>
                        <option value="salee">Salé</option>
                        <option value="sucree_salee">Sucré et Salé</option>
                    </select>
                </div>
                <x-input name="email" label="Email" type="email" />
                <x-input name="password" label="Mot de passe" type="password" />
                <x-input name="password_confirmation" label="Confirmer le Mot de passe" type="password" />
            </div>
        </div>
        <div class="flex items-center justify-center gap-4" x-data="{ imageSrc: null }">
            <label
                class="text-blue-500 border-blue-500 flex w-64 cursor-pointer flex-col items-center rounded-lg border transition-all hover:bg-white hover:text-black hover:border-black px-4 py-6 uppercase tracking-wide shadow-lg">
                <svg class="h-8 w-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                </svg>
                <span class="mt-2 text-base leading-normal text-center">Selectionner votre photo</span>
                <input type="file" class="hidden" wire:model='image' name="image"
                    @change="imageSrc = URL.createObjectURL($event.target.files[0])" />
            </label>
            <div class="my-3">
                <img x-bind:src="imageSrc" class="h-36 w-36 object-cover rounded-full" x-show="imageSrc">
            </div>
        </div>
        <div>
            <button type="submit"
                class="flex w-full justify-center rounded-md bg-blue-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-500">Créer
                votre compte</button>
        </div>
    </div>
</form>
