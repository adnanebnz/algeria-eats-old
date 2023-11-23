<x-default-layout>
    <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32 pb-4 md:pb-16">
        <div class="md:px-4 px-3 md:pt-8">
            <p class="text-xl font-medium">Résumé de la commande</p>
            <p class="text-gray-400">Vérifiez vos articles.</p>
            <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
                @foreach ($cartItems as $cartItem)
                    <div class="flex flex-row items-center justify-between">
                        <div class="flex flex-col rounded-lg bg-white sm:flex-row">
                            <img class="m-2 h-24 w-28 rounded-md border object-cover object-center"
                                src="{{ str_starts_with($cartItem->product->images[0], 'http') ? $cartItem->product->images[0] : asset('storage/' . $cartItem->product->images[0]) }}"
                                alt="" />
                            <div class="flex w-full flex-col px-4 py-4">
                                <span class="font-semibold">{{ $cartItem->product->nom }}</span>
                                <span class="float-right text-gray-400">Catégorie :
                                    {{ $cartItem->product->categorie === 'sucree' ? 'Sucré' : 'Salé' }}</span>
                                <p class="text-lg font-bold">{{ $cartItem->product->prix }} DA</p>
                            </div>
                        </div>
                        <p class="font-semibold text-xl mr-2.5 md:mr-0">
                            &times; {{ $cartItem->quantity }}
                        </p>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="mt-10 bg-gray-50 px-4 py-8 lg:mt-0 rounded-md">
            <p class="text-xl font-medium">Détails du paiemet</p>
            <p class="text-gray-400">Finalisez votre commande en fournissant vos informations de paiement.</p>
            <form method="POST" action="{{ route('checkout.store') }}">
                @csrf
                <div>
                    <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">Adresse de
                        livraison</label>
                    <div class="flex flex-col gap-3">
                        <div class="relative flex-shrink-0 w-full">
                            <input type="text" id="billing-address" name="adresse"
                                class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Adresse" />
                            <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
                                <img class="h-4 w-6 border" src="{{ asset('assets/algeria.png') }}" />
                            </div>
                        </div>
                        <select type="text" name="wilaya_name_ascii"
                            class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Wilaya</option>
                            @foreach ($wilayas as $wilaya)
                                <option value="{{ $wilaya->wilaya_name_ascii }}">{{ $wilaya->wilaya_code }} -
                                    {{ $wilaya->wilaya_name_ascii }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <!-- Total -->
                    {{-- <div class="mt-6 border-t border-b py-2">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Subtotal</p>
                        <p class="font-semibold text-gray-900">$399.00</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Shipping</p>
                        <p class="font-semibold text-gray-900">$8.00</p>
                    </div>
                </div> --}}
                    <div class="mt-6 flex items-center justify-between md:px-4 px-2">
                        <p class="text-md font-medium text-gray-900">Total</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $total }} DA</p>
                    </div>
                </div>
                <button type="submit"
                    class="mt-4 mb-3 w-full rounded-md bg-blue-500 hover:bg-blue-600 px-6 py-3 font-medium text-white">Confirmer
                    la
                    commande</button>
            </form>
            <form method="POST" action="{{ route('checkout.cancel') }}">
                @csrf
                <button type="submit"
                    class="px-4 w-full py-2.5 bg-red-500 hover:bg-red-600 text-white rounded-md transition-all">Annuler</button>
            </form>
        </div>
    </div>

</x-default-layout>
