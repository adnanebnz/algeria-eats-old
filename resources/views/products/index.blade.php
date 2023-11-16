<x-default-layout>
    <section class="bg-white">
        <div class="container px-4 pb-20 mx-auto">
            {{-- START SEARCH FILTER --}}
            <div class="flex flex-col mx-auto mb-16 mt-5 max-w-5xl">
                <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-md">
                    <form class="">
                        <div class="relative mb-10 w-full flex  items-center justify-between rounded-md">
                            <svg class="absolute left-2 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" class=""></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
                            </svg>
                            <input type="name" name="search"
                                class="h-12 w-full cursor-text rounded-md border border-gray-100 bg-gray-100 py-4 pr-40 pl-12 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Rechercher par nom, type, nom d'artisan, etc" />
                        </div>

                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                            <div class="flex flex-col">
                                <label for="name" class="text-sm font-medium text-stone-600">Nom de
                                    l'artisan</label>
                                <input type="text" id="name" placeholder="John Doe"
                                    class="mt-2 block w-full rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                            </div>
                            <div class="flex flex-col">
                                <label for="status" class="text-sm font-medium text-stone-600">Note d'artisan</label>

                                <select id="status"
                                    class="mt-2 block w-full cursor-pointer rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label for="manufacturer" class="text-sm font-medium text-stone-600">Type</label>

                                <select id="manufacturer"
                                    class="mt-2 block w-full rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option>Sucré</option>
                                    <option>Salé</option>
                                </select>
                            </div>

                            <div class="flex flex-col">
                                <label for="date" class="text-sm font-medium text-stone-600">Note du produit</label>
                                <select id="manufacturer"
                                    class="mt-2 block w-full rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-6 grid w-full grid-cols-2 justify-end space-x-4 md:flex">
                            <button
                                class="rounded-lg bg-gray-200 px-8 py-2 font-medium text-gray-700 outline-none hover:opacity-80 focus:ring">Reset</button>
                            <button
                                class="rounded-lg bg-blue-600 px-8 py-2 font-medium text-white outline-none hover:opacity-80 focus:ring">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- END SEARCH FILTER --}}
            <div class="lg:flex lg:-mx-2">
                <div class="mt-6 lg:mt-0 lg:px-2 ">
                    <div class="flex items-center justify-between text-sm tracking-widest uppercase ">

                        <div class="flex items-center gap-2">
                            <p class="text-gray-500 ">TRIER</p>
                            <select class="font-medium text-gray-700 bg-transparent focus:outline-none">
                                <option value="#">Recommandé</option>
                                <option value="#">Note</option>
                                <option value="#">Prix</option>
                            </select>
                        </div>
                    </div>
                    <livewire:product-component />
                </div>
            </div>
        </div>
    </section>
</x-default-layout>
