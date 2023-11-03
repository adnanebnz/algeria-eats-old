<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
{{-- todo install library --}}
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="antialiased pt-5">
    {{-- Conteneur global --}}
    <div>
        {{-- Header --}}
        <div x-data="{ open: false }" x-cloak
            class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="flex flex-row items-center justify-between p-4">
                <a href="{{ route('index') }}"
                    class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">
                    <img src="{{ asset('assets/AlgeriaEats.png') }}" class="h-16" />
                </a>
                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{ 'flex': open, 'hidden': !open }"
                class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
                <a class="p-4 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-blue-100 focus:bg-blue-100 focus:outline-none focus:shadow-outline"
                    href="#">Contact</a>
                <a class="p-4 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-blue-100 focus:bg-blue-100 focus:outline-none focus:shadow-outline"
                    href="#">À propos de nous</a>
                <a class="p-4 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-blue-100 focus:bg-blue-100 focus:outline-none focus:shadow-outline"
                    href="#">Produits</a>
                @guest

                    <a class="p-4 mt-2 text-sm font-semibold bg-transparent rounded-lg 
                    border solid border-blue-500
                    transition-all md:mt-0 md:ml-4 focus:text-gray-900 hover:bg-blue-500 hover:text-white focus:bg-blue-100 focus:outline-none focus:shadow-outline"
                        href="{{ route('login') }}">Se Connecter</a>
                    <a class="p-4 mt-2 text-sm font-semibold rounded-lg md:mt-0 md:ml-4
                    bg-blue-500 text-white hover:bg-blue-600 focus:bg-blue-100 focus:outline-none focus:shadow-outline
                    "
                        href="{{ route('register') }}">Créer un compte</a>
                @endguest
                @auth
                    <div @click.away="open = false" class="relative" x-data="{ open: false }" x-cloak>
                        <button @click="open = !open"
                            class="flex flex-row text-gray-900 bg-gray-200 items-center w-full p-4 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-blue-100 focus:bg-blue-100 focus:outline-none focus:shadow-outline">
                            <span>
                                {{ auth()->user()->prenom }}
                            </span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 w-full md:max-w-[280px] md:w-screen mt-2 origin-top-right">
                            <div class="px-2 pt-2 pb-4 bg-gray-50 rounded-md shadow-xl">
                                <div class="grid grid-cols-1 gap-4">
                                    {{-- TODO FIX NAVBAR LINKS FOR ALL ROLE CASES --}}
                                    @if (auth()->user()->artisan)
                                        <a class="flex row items-start rounded-lg bg-transparent p-2 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                            href="{{ route('artisan.index', ['user' => auth()->user()]) }}">
                                            <div class="bg-blue-500 text-white rounded-lg p-3">
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                    class="md:h-6 md:w-6 h-4 w-4"">
                                                    <path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                                    <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-3">
                                                <p class="font-semibold">Tableau de bord</p>
                                                <p class="text-sm">Voir et gerer vos données</p>
                                            </div>
                                        </a>
                                    @endif
                                    @if (auth()->user()->admin)
                                        <a class="flex row items-start rounded-lg bg-transparent p-2 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                            href="{{ route('admin.index', ['user' => auth()->user()]) }}">
                                            {{-- TODO CREATE VIEW --}}
                                            <div class="bg-blue-500 text-white rounded-lg p-3">
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                    class="md:h-6 md:w-6 h-4 w-4"">
                                                    <path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                                    <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-3">
                                                <p class="font-semibold">Tableau de bord</p>
                                                <p class="text-sm">Voir et gerer vos données</p>
                                            </div>
                                        </a>
                                    @endif
                                    @if (auth()->user()->deliveryMan)
                                        <a class="flex row items-start rounded-lg bg-transparent p-2 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                            href="{{ route('deliveryMan.index', ['user' => auth()->user()]) }}">
                                            {{-- TODO CREATE VIEW --}}
                                            <div class="bg-blue-500 text-white rounded-lg p-3">
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                    class="md:h-6 md:w-6 h-4 w-4">
                                                    <path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                                    <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-3">
                                                <p class="font-semibold">Tableau de bord</p>
                                                <p class="text-sm">Voir et gerer vos données</p>
                                            </div>
                                        </a>
                                    @endif
                                    <a class="flex row items-start rounded-lg bg-transparent p-2 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="{{ route('profile', ['user' => auth()->user()]) }}">
                                        <div class="bg-blue-500 text-white rounded-lg p-3">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                class="md:h-6 md:w-6 h-4 w-4">
                                                <path
                                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="font-semibold">Profile</p>
                                            <p class="text-sm">Voir et modifier votre profile</p>
                                        </div>
                                    </a>
                                    <a class="flex row items-start rounded-lg bg-transparent p-2 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        href="{{ route('logout') }}">
                                        <div class="bg-blue-500 text-white rounded-lg p-3">

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="md:h-6 md:w-6 h-4 w-4">

                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                            </svg>

                                        </div>
                                        <div class="ml-3">
                                            <p class="font-semibold">Déconnexion</p>
                                            <p class="text-sm">Déconnecter vous de votre compte</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
            </nav>
        </div>
        @if (session('status'))
            <div class="mt-10 rounded-md bg-green-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">{{ session('status') }}</p>
                    </div>
                </div>
            </div> @endif

        <main class="mt-10
        md:mt-12 lg:mt-16 border-b p-4 rounded-md">
    {{ $slot }}
    </main>
    </div>
    <footer class="relative bg-blueGray-200 pt-8 pb-6">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap text-left lg:text-left">
                <div class="w-full lg:w-6/12 px-4">
                    <img src="{{ asset('assets/AlgeriaEats.png') }}" class="h-16" />
                    <div class="mt-6 lg:mb-0 mb-6">
                        {{-- TODO ADD SOCIAL MEDIA LINKS HERE --}}
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="flex flex-wrap items-top mb-6">
                        <div class="w-full lg:w-4/12 px-4 ml-auto">
                            <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Liens
                                Rapides</span>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="text-gray-900  hover:text-gray-700 font-semibold block pb-2 text-sm"
                                        href="#">À propos de nous</a>
                                </li>

                                <li>
                                    <a class="text-gray-900  hover:text-gray-700 font-semibold block pb-2 text-sm"
                                        href="#">Produits</a>
                                </li>
                                <li>
                                    <a class="text-gray-900  hover:text-gray-700 font-semibold block pb-2 text-sm"
                                        href="#">Contactez nous</a>
                                </li>
                            </ul>
                        </div>
                        <div class="w-full lg:w-4/12 px-4">
                            <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Autre
                                liens</span>
                            <ul class="list-unstyled">

                                <li>
                                    <a class="text-gray-900  hover:text-gray-700 font-semibold block pb-2 text-sm"
                                        href="#">Terms &amp;
                                        Conditions</a>
                                </li>
                                <li>
                                    <a class="text-gray-900  hover:text-gray-700 font-semibold block pb-2 text-sm"
                                        href="#">Confidentialité</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-blueGray-300">
            <div class="flex flex-wrap items-center md:justify-between justify-center">
                <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                    <div class="text-sm text-blueGray-500 font-semibold py-1 flex items-center gap-2 justify-center">
                        <p>
                            Copyright © <span id="get-current-year">{{ date('Y') }}
                            </span>
                        </p>
                        <p>Algeria Eats</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @livewireScripts
    </body>

</html>
