<form wire:submit.prevent="submit">
    @csrf
    <div class="flex flex-col gap-8">
        <div class="flex flex-row items-center gap-8">
            <div class="w-1/2 flex flex-col gap-4">
                <x-input name="image" label="Photo de profile" type="file" />
                <x-input name="nom" label="Nom" type="text" />
                <x-input name="prenom" label="Prénom" type="text" />
                <x-input name="num_telephone" label="Numéro de teléphone" type="text" />
            </div>
            <div class="w-1/2 flex flex-col gap-4">
                <x-input name="adresse" label="Adresse" type="text" />
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
