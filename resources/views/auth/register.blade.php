<x-auth-layout title="Créer un compte" :action="route('register')" submitMessage="Créer votre compte">
    <x-input name="role" label="Role" type="text" />
    <div class="flex flex-row gap-8">
        <div class="w-1/2">
            <x-input name="nom" label="Nom" type="text" />
            <x-input name="prenom" label="Prénom" type="text" />
            <x-input name="num_telephone" label="Numéro de teléphone" type="text" />
            <x-input name="adresse" label="Adresse" type="text" />
            {{-- TODO FIX LAYOUT AND ADD FIELDS FOR EACH ROLE --}}
        </div>
        <div class="w-1/2">
            <x-input name="email" label="Email" type="email" />
            <x-input name="password" label="Mot de passe" type="password" />
            <x-input name="password_confirmation" label="Confirmer le Mot de passe" type="password" />
        </div>
    </div>
</x-auth-layout>
