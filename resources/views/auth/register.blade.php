<x-auth-layout title="Créer un compte" submitMessage="Créer votre compte" page="register">
    <div x-data="{ selectedAccountType: 'consumer' }">
        <select x-model="selectedAccountType"
            class="form-select w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 mb-4">
            <option value="consumer">Client</option>
            <option value="artisan">Artisan</option>
            <option value="delivery_man">Livreur</option>
        </select>
        {{-- TODO CHECK WITH REGISTER FORM AND LIMIT THE CHARACTERS OF PHONE NUMBER --}}
        <div x-show="selectedAccountType === 'consumer'">
            <livewire:consumer-form />
        </div>
        <div x-show="selectedAccountType === 'artisan'">
            <livewire:artisan-form />
        </div>
        <div x-show="selectedAccountType === 'delivery_man'">
            <livewire:delivery-man-form />
        </div>
    </div>
</x-auth-layout>
