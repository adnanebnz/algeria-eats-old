<div>
    {{-- TODO CART START --}}
    @auth
        <div>
            <div class="flex justify-center">
                <div class="relative">
                    <div class="flex flex-row cursor-pointer truncate p-2 px-4 rounded">
                        <div class="flex flex-row-reverse ml-2 w-full">
                            <a href="{{ route('cart.index') }}" slot="icon" class="relative">
                                <div
                                    class="absolute text-xs rounded-full -mt-1 -mr-2 px-1 font-bold top-0 right-0 bg-red-500 text-white">
                                    {{ $cartCount }}</div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-shopping-cart w-6 h-6 mt-2">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
</div>
