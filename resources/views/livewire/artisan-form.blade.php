<form wire:submit.prevent="submit" method="POST" novalidate>
    @csrf
    <div class="flex flex-col gap-8">
        <div class="flex flex-row gap-8">
            <div class="w-1/2 flex flex-col gap-4">
                <x-input name="nom" label="Nom" type="text" />
                <x-input name="prenom" label="Prénom" type="text" />
                <x-input name="num_telephone" label="Numéro de teléphone" type="text" />
                <x-input name="adresse" label="Adresse" type="text" />
                <x-select name="wilaya" label="Wilaya" :list="$wilayas" :optionsValues="'wilaya_name_ascii'" :optionsSubTexts="'wilaya_code'"
                    :optionsTexts="'wilaya_name_ascii'" />
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
        <div x-data="{ image: null }">
            <label class="block text-sm font-medium text-white">
                Image
            </label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-4 text-center">
                    <template x-if="image">
                        <img x-bind:src="image" alt="Uploaded Image"
                            class="h-32 mx-auto mb-4 rounded-full border">
                    </template>
                    <div class="flex flex-col gap-1 items-center justify-center">
                        <template x-if="!image">
                            <svg class="h-14 w-14 text-gray-600" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </template>
                        <div class="flex text-sm text-gray-800">
                            <label for="file-upload"
                                class="relative cursor-pointer rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                <span class="">Upload a file</span>
                                <input id="file-upload" name="image" wire:model='image' type="file" class="sr-only"
                                    accept="image/*" x-on:change="image = URL.createObjectURL($event.target.files[0])">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs">
                            JPEG, JPG, GIF Maximum 4 méga.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button type="submit"
                class="flex w-full justify-center rounded-md bg-blue-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-500">Créer
                votre compte</button>
        </div>
    </div>
</form>
