<x-auth-layout title="Se Connecter" :action="route('login')" submitMessage="Se Connecter">
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
