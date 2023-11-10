<div>
    {{-- TODO CART START --}}
    @auth
        <div x-data="{ isCartOpen: false }" x-cloak>
            <div class="flex justify-center">
                <div class="relative">
                    <div class="flex flex-row cursor-pointer truncate p-2 px-4 rounded">
                        <div></div>
                        <div class="flex flex-row-reverse ml-2 w-full">
                            <div slot="icon" class="relative" @click="isCartOpen=!isCartOpen">
                                <div
                                    class="absolute text-xs rounded-full -mt-1 -mr-2 px-1 font-bold top-0 right-0 bg-red-700 text-white">
                                    {{ $cartCount }}</div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-shopping-cart w-6 h-6 mt-2">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div x-show="isCartOpen" class="absolute w-full rounded-b border-t-0 z-30">
                        <div class="shadow-xl w-64">
                            @if ($cartCount > 0)
                                <div>
                                    @foreach ($cartItems as $item)
                                        <div
                                            class="p-2 flex bg-white hover:bg-gray-100 cursor-pointer border-b border-gray-100">
                                            <div class="p-2 w-12"><img src="{{ $item->product->images[0] }}" alt="image">
                                            </div>
                                            <div class="flex-auto text-sm w-32">
                                                <div class="font-bold">{{ $item->product->nom }}</div>
                                                <div class="truncate">{{ $item->product->description }}</div>
                                                <div class="text-gray-400">Qt: {{ '1' }}</div>
                                            </div>
                                            <div class="flex flex-col w-18 font-medium items-end">
                                                <button type="button" wire:click="remove('{{ $item->product->id }}')"
                                                    class="w-4 h-4 mb-6 hover:bg-red-200 rounded-full cursor-pointer text-red-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10" y2="17">
                                                        </line>
                                                        <line x1="14" y1="11" x2="14" y2="17">
                                                        </line>
                                                    </svg>
                                                </button>
                                                {{ $item->product->prix }} DA
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="p-4
        justify-center flex bg-white">
                                    <button
                                        class="text-base hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded-md font-bold cursor-pointer border duration-200 ease-in-out border-blue-600 transition">Checkout</button>
                                    {{-- todo calculate max price and show it here --}}
                                </div>
                            @else
                                <p class="p-4">Cart is empty</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    {{-- todo end cart --}}
</div>
