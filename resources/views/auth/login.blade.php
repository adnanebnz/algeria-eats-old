<x-auth-layout title="Se Connecter" :action="route('login')" submitMessage="Se Connecter" page="login">
    <x-input name="email" label="Email" type="email" />
    <x-input name="password" label="Mot de passe" type="password" />
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <input id="remember" name="remember" type="checkbox"
                class="form-checkbox h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600">
            <label for="remember" class="ml-3 block text-sm leading-6 text-gray-900">Rester Connecter</label>
        </div>
        <div class="text-sm">
            <a href="{{ route('password.request') }}"
                class="font-medium text-blue-600 hover:text-blue-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                Mot de passe oublié ?
            </a>
        </div>
    </div>
</x-auth-layout>
