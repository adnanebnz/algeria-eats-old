<div>

    @if (!empty($feedbackMessage))
        <livewire:feedback-message :message='$feedbackMessage' :type='$feedbackMessageType' />
    @endif
    <section class="pb-6" x-data="{ currentImageIndex: 0 }">

        <div class="max-w-6xl px-4 mx-auto">
            <div class="flex flex-wrap mb-24 -mx-4">
                <div class="w-full px-4 mb-8 md:w-1/2 md:mb-0">
                    <div class="sticky top-0 overflow-hidden">
                        <div class="relative mb-6 lg:mb-10 lg:h-96">
                            <button class="absolute hidden md:block left-0 transform lg:ml-2 top-1/2 translate-1/2"
                                x-on:click="currentImageIndex = (currentImageIndex - 1 + {{ count($product->images) }}) % {{ count($product->images) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="w-5 h-5 text-orange-500 hover:text-orange-200 bi bi-chevron-left"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z">
                                    </path>
                                </svg>
                            </button>
                            @foreach ($product->images as $key => $image)
                                <img class="object-contain w-full lg:h-full"
                                    x-bind:class="{ 'hidden': currentImageIndex !== {{ $key }} }"
                                    src="{{ str_starts_with($image, 'http') ? $image : asset('storage/' . $image) }}"
                                    alt="">
                            @endforeach
                            <button class="absolute right-0 hidden md:block transform lg:mr-2 top-1/2 translate-1/2"
                                x-on:click="currentImageIndex = (currentImageIndex + 1) % {{ count($product->images) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor"
                                    class="w-5 h-5 text-orange-500 hover:text-orange-200 bi bi-chevron-right"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="-mx-2 flex">
                            @foreach ($product->images as $key => $image)
                                <div class="w-1/3 p-2 sm:w-1/5">
                                    <button class="block border border-gray-200 hover:border-orange-400"
                                        x-on:click="currentImageIndex = {{ $key }}">
                                        <img class="object-contain w-full lg:h-28" src="{{ $image }}"
                                            alt="">
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2">
                    <div class="lg:pl-20">
                        <div class="mb-6 ">
                            <h2
                                class="max-w-xl mt-6 mb-2 text-xl font-semibold leading-loose tracking-wide text-gray-700 md:text-2xl">
                                {{ $product->nom }}
                            </h2>
                            <div class="flex flex-wrap items-center mb-2">
                                <div class="mb-4 mr-2 lg:mb-0">
                                    <p class="text-sm text-gray-600">Note du produit</p>
                                    <x-star-rating :rating="$product->rating" />
                                </div>
                            </div>
                            <div class="flex flex-col mb-6">
                                <p class="text-sm text-gray-600">De: <a
                                        class="font-medium text-gray-900 hover:text-orange-500 hover:underline underline-offset-2"
                                        href="{{ route('profile', $product->artisan->user) }}">{{ $product->artisan->user->getFullName() }}</a>
                                </p>
                                <x-star-rating :rating="$product->artisan->rating" />
                            </div>
                            <p class="inline-block text-2xl font-semibold text-gray-700">
                                <span>{{ $product->prix }} DA</span>
                                <span class="ml-3 text-base font-normal text-gray-500 line-through">10 DA</span>
                            </p>

                        </div>
                        <div class="mb-6">
                            <h2 class="mb-2 text-lg font-bold text-gray-700">Description : </h2>
                            <span class="text-gray-600">
                                {{ $product->description }}
                            </span>
                        </div>
                        <div class="mb-6">
                            <h2 class="mb-2 text-lg font-bold text-gray-700">Informations : </h2>
                            <div class="bg-gray-100 rounded-xl">
                                <div class="p-3 lg:p-5 ">
                                    <div class="p-2 rounded-xl lg:p-6 bg-gray-50">
                                        <div
                                            class="flex flex-wrap justify-center items-center gap-x-10 gap-y-5 md:gap-y-0">
                                            <div class="w-full md:w-2/5">
                                                <div class="flex ">
                                                    <span class="mr-3 text-gray-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-7 h-7">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.87c1.355 0 2.697.055 4.024.165C17.155 8.51 18 9.473 18 10.608v2.513m-3-4.87v-1.5m-6 1.5v-1.5m12 9.75l-1.5.75a3.354 3.354 0 01-3 0 3.354 3.354 0 00-3 0 3.354 3.354 0 01-3 0 3.354 3.354 0 00-3 0 3.354 3.354 0 01-3 0L3 16.5m15-3.38a48.474 48.474 0 00-6-.37c-2.032 0-4.034.125-6 .37m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.17c0 .62-.504 1.124-1.125 1.124H4.125A1.125 1.125 0 013 20.625v-5.17c0-1.08.768-2.014 1.837-2.174A47.78 47.78 0 016 13.12M12.265 3.11a.375.375 0 11-.53 0L12 2.845l.265.265zm-3 0a.375.375 0 11-.53 0L9 2.845l.265.265zm6 0a.375.375 0 11-.53 0L15 2.845l.265.265z" />
                                                        </svg>



                                                    </span>
                                                    <div>
                                                        <p class="mb-2 text-sm font-medium text-gray-500">
                                                            Catégorie
                                                        </p>
                                                        <h2 class="text-base font-semibold text-gray-700">
                                                            {{ $product->category === 'sucree' ? 'Sucrée' : 'Salée' }}
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-full md:w-2/5">
                                                <div class="flex">
                                                    <span class="mr-3 text-gray-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-7 h-7">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6 6h.008v.008H6V6z" />
                                                        </svg>

                                                    </span>
                                                    <div>
                                                        <p class="mb-2 text-sm font-medium text-gray-500">
                                                            Sous-Categorie
                                                        </p>
                                                        <h2 class="text-base font-semibold text-gray-700">
                                                            {{ $product->sous_categorie }}
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6 mt-10"></div>
                        <div class="flex flex-wrap items-center justify-center">
                            <div class="mb-4 mr-4 lg:mb-0">
                                <div class="w-28">
                                    <div class="relative flex flex-row w-full h-10 bg-transparent rounded-lg">
                                        <button wire:click="decrementQuantity"
                                            class="w-20 h-full text-gray-600 bg-gray-100 border-r rounded-l outline-none cursor-pointer hover:text-gray-700 hover:bg-gray-300">
                                            <span class="m-auto text-2xl font-thin">-</span>
                                        </button>
                                        <input type="number" wire:model="quantity"
                                            class="flex items-center w-full font-semibold text-center text-gray-700 placeholder-gray-700 bg-gray-100 outline-none focus:outline-none text-md hover:text-black"
                                            placeholder="1">
                                        <button wire:click="incrementQuantity"
                                            class="w-20 h-full text-gray-600 bg-gray-100 border-l rounded-r outline-none cursor-pointer hover:text-gray-700 hover:bg-gray-300">
                                            <span class="m-auto text-2xl font-thin">+</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button wire:click="addToCart()"
                                class="w-full px-4 py-3 text-center text-orange-600 bg-orange-100 border border-orange-600 hover:bg-orange-600 hover:text-gray-100 lg:w-1/2 rounded-xl">
                                Ajouter au panier
                            </button>
                        </div>
                    </div>
                </div>
                @auth
                    <livewire:comment-form :product='$product' />
                @endauth
                <livewire:comment-component :product='$product' />
            </div>
        </div>
    </section>
</div>
