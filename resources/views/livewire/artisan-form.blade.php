<form wire:submit.prevent="submit" method="POST" novalidate>
    @csrf
    <div class="space-y-4">
        <div class="flex flex-row gap-8">
            <div class="w-1/2 flex flex-col gap-4">
                <x-input name="nom" label="Nom" type="text" />
                <x-input name="prenom" label="Prénom" type="text" />
                <x-input name="num_telephone" label="Numéro de teléphone" type="text" />
                <x-input name="adresse" label="Adresse" type="text" />
                <x-textarea name="desc_entreprise" label="Description Entreprise" />

            </div>
            <div class="w-1/2 flex flex-col gap-4">
                <x-input name="heure_ouverture" label="Heure d'ouverture" type="time" />
                <x-input name="heure_fermeture" label="Heure de fermeture" type="time" />
                <div>
                    <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Type Service</label>
                    <select name="type_service" wire:model='type_service'
                        class="form-select w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6">
                        <option value="sucree">Sucrée</option>
                        <option value="salee">Salée</option>
                        <option value="sucree_salee">Sucrée et Salée</option>
                    </select>
                </div>
                <x-input name="email" label="Email" type="email" />
                <x-input name="password" label="Mot de passe" type="password" />
                <x-input name="password_confirmation" label="Confirmer le Mot de passe" type="password" />
            </div>
        </div>
        <div>
            <button type="submit"
                class="flex w-full justify-center rounded-md bg-blue-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-500">Créer
                votre compte</button>
        </div>
    </div>
</form>
