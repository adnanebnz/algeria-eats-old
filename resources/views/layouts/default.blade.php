<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
        <div x-data="{ open: false }"
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
                    href="#">Link</a>
                <a class="p-4 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-blue-100 focus:bg-blue-100 focus:outline-none focus:shadow-outline"
                    href="#">Contact</a>
                @guest

                    <a class="p-4 mt-2 text-sm font-semibold bg-transparent rounded-lg 
                    border solid border-blue-500 dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white 
                    transition-all dark-mode:text-gray-200 md:mt-0 md:ml-4 focus:text-gray-900 hover:bg-blue-500 hover:text-white focus:bg-blue-100 focus:outline-none focus:shadow-outline"
                        href="{{ route('login') }}">Login</a>
                    <a class="p-4 mt-2 text-sm font-semibold rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4
                    bg-blue-500 text-white hover:bg-blue-600 focus:bg-blue-100 focus:outline-none focus:shadow-outline
                    "
                        href="{{ route('register') }}">Register</a>
                @endguest
                @auth
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
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
                                                <p class="font-semibold">Dashboard</p>
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
            </div>
        @endif

        <main class="mt-10 md:mt-12 lg:mt-16 border-b p-4 rounded-md">
            {{ $slot }}
        </main>
    </div>
    <footer class="text-slate-600">
        <div
            class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
            <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left md:mt-0 mt-10">
                <a class="flex items-center md:justify-end md:mr-12 justify-center text-gray-900">
                    <img src="{{ asset('assets/AlgeriaEats.png') }}" class="h-16">

                </a>
                <p class="mt-2 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel qui
                    delectus ea obcaecati libero cupiditate consequatur quidem repudiandae ipsam, sint vitae est nam
                    consectetur temporibus deserunt eius magnam hic commodi.</p>
            </div>
            <div class="flex-grow flex flex-wrap md:pr-20 -mb-10 md:text-left text-center order-first">
                <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                    <h2 class="font-medium text-gray-900 tracking-widest text-lg mb-3">
                        Liens Rapides
                    </h2>
                    <nav class="list-none mb-10 space-y-2">
                        <li>
                            <a class="text-gray-600 hover:text-gray-800" href="{{ route('index') }}">
                                Acceuil
                            </a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800" href="Link">
                            </a>
                        </li>
                        <li>
                            <a class="text-gray-600 hover:text-gray-800" href="#">Contact us</a>
                        </li>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
    @livewireScripts
</body>

</html>
