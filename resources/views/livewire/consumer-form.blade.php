<form wire:submit.prevent="submit">
    @csrf
    <div class="flex flex-col gap-8">
        <div class="flex flex-row gap-8">
            <div class="w-1/2 flex flex-col gap-4">
                <x-input name="nom" label="Nom" type="text" />
                <x-input name="prenom" label="Prénom" type="text" />
                <x-input name="num_telephone" label="Numéro de teléphone" type="text" />
                <x-input name="adresse" label="Adresse" type="text" />
            </div>
            <div class="w-1/2 flex flex-col gap-4">
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
