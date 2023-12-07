<div class="relative" id="home" class="flex items-center justify-center">
    <div aria-hidden="true" class="absolute inset-0 grid grid-cols-2 -space-x-52 opacity-5">
        <div class="blur-[106px] h-56 bg-gradient-to-br from-blue-600 to-sky-300"></div>
        <div class="blur-[106px] h-32 bg-gradient-to-r from-cyan-400 to-sky-300"></div>
    </div>
    <div class="relative md:pt-10 flex items-center justify-between">
        <div class="mx-auto flex flex-col just gap-48 md:flex-row md:px-11 px-5">
            <div>
                <h1 class="text-gray-900 font-light text-3xl md:text-6xl">Explorez des <span
                        class="font-bold text-transparent bg-clip-text bg-gradient-to-br from-blue-600 to-indigo-400">Délices</span>
                </h1>
                <h1 class="text-gray-900 font-bold text-[27px] md:text-6xl">Sucrés et Salés <span
                        class="font-bold text-transparent bg-clip-text bg-gradient-to-br from-blue-600 to-indigo-400">unique</span>
                </h1>
                <div class="mt-3">
                    <p class="text-gray-700">Apportez la Qualité Culinaire a votre Porte en Quelques Clics Faciles.</p>
                    <a href="{{ route('product.index') }}"
                        class="relative mt-4 flex h-11 w-full items-center justify-center px-6 before:absolute before:inset-0 before:rounded-full before:bg-blue-500 before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max">
                        <span class="relative text-base font-semibold text-white">Voir Maintenant</span>
                    </a>
                </div>
            </div>
            <img src="{{ asset('assets/cooking.svg') }}" alt="hero"
                class="hidden md:block scale-110 inset-0 m-auto w-80 h-80 -mt-16" />
        </div>
    </div>
</div>
