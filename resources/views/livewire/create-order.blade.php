<div>
    <form method="POST" wire:submit.prevent='store()'>
        <div>
            <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">Adresse de
                livraison</label>
            <div class="flex flex-col">
                <div class="relative flex-shrink-0 w-full">
                    <input type="text" id="billing-address" name="adresse" wire:model='adresse'
                        class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Adresse" />
                    <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                        <img class="h-4 w-6 border" src="{{ asset('assets/algeria.png') }}" />
                    </div>
                </div>
                @error('adresse')
                    <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
                @enderror
                <select type="text" name="wilaya_name_ascii" wire:model='wilaya_name_ascii'
                    class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500 mt-5">
                    <option value="">Wilaya</option>
                    @foreach ($wilayas as $wilaya)
                        <option value="{{ $wilaya->wilaya_name_ascii }}">{{ $wilaya->wilaya_code }} -
                            {{ $wilaya->wilaya_name_ascii }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('wilaya_name_ascii')
                <p class="text-red-500 text-sm mt-1.5">{{ $message }}</p>
            @enderror
            <div class="mt-6 flex items-center justify-between md:px-4 px-2">
                <p class="text-md font-medium text-gray-900">Total</p>
                <p class="text-2xl font-semibold text-gray-900">{{ $total }} DA</p>
            </div>
        </div>
        <button type="submit"
            class="mt-4 mb-3 w-full rounded-md bg-blue-500 hover:bg-blue-600 px-6 py-3 font-medium text-white">


            <span wire:loading.remove wire:target='store'>Confirmer la commande</span>
            <div wire:loading.inline-flex wire:target='store' wire:loading.class='cursor-not-allowed'
                wire:loading.attr='disabled' class="flex items-center justify-center w-full">
                <svg class="animate-spin h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 6.627 5.373 12 12 12v-4a7.963 7.963 0 01-5.657-2.343zM17.657 6.343A7.963 7.963 0 0120 12h4c0-6.627-5.373-12-12-12v4a7.963 7.963 0 012.343-5.657z">
                    </path>
                </svg>
                <span>
                    En cours...
                </span>
            </div>
        </button>
    </form>
    <form method="POST" wire:submit='cancel()'>
        @csrf
        <button type="submit"
            class="px-4 w-full py-2.5 bg-red-500 hover:bg-red-600 text-white rounded-md transition-all"
            wire:loading.class='cursor-not-allowed' wire:loading.attr='disabled'>
            <span>Annuler</span>
        </button>
    </form>
</div>
