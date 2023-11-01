<x-auth-layout title="Créer un compte" :action="route('login')" submitMessage="Créer votre compte">
    <x-input name="nom" label="Nom" type="text" />
    <x-input name="prenom" label="Prénom" type="text" />
    <x-input name="num_telephone" label="Numéro de teléphone" type="text" pattern="^\b[Oo][5-7][0-9]{8}\b" />
    <x-input name="email" label="Email" type="email" />
    <x-input name="password" label="Mot de passe" type="password" />
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <input id="remember" name="remember" type="checkbox"
                class="form-checkbox h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600">
            <label for="remember" class="ml-3 block text-sm leading-6 text-gray-900">Rester Connecter</label>
        </div>
    </div>
</x-auth-layout>
