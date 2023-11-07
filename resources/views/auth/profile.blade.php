<x-default-layout title='Profile'>
    <div x-data="{ openform: false, opencompte: true }" x-cloak class="w-full flex justify-center items-center md:pb-16 pb-4">
        <div x-show="opencompte" class="bg-gray-100 w-3/4 p-4 mx-auto my-auto rounded-lg shadow-lg">
            <img class="rounded-full w-40 h-40 mx-auto my-4" src="https://placehold.co/160"
                alt="marach 3adna les donnés t3 les artisanes" />

            @if (auth()->user()->artisan)
                <div class="flex items-center justify-center">
                    <x-star-rating :rating="$user->artisan->rating" />
                </div>
            @endif
            @if (auth()->user()->deliveryMan)
                <h1 class="center">Rating !</h1>
            @endif
            {{-- SECTION D'INFORMATIONS PERSONELLES --}}
            <div class="font-extrabold text-center my-10">
                <h1 class="text-4xl">{{ $user->nom }}</h1>
                <h2 class="text-xl">{{ $user->prenom }}</h2>
            </div>
            <div class="my-12 border border-gray-300 rounded-md p-4">
                <h1 class="font-extrabold text-2xl">Informations personnelles</h1>
                <div class="mt-3 flex flex-col gap-2">
                    <div class="flex items-center gap-2">
                        <h1 class="font-medium leading-6 text-gray-900">Email : </h1>
                        <p class="font-semibold text-lg">{{ $user->email }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <h1 class="font-medium leading-6 text-gray-900">Numéro de téléphone : </h1>
                        <p class="font-semibold text-lg">{{ $user->num_telephone }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <h1 class="font-medium leading-6 text-gray-900">Adresse : </h1>
                        <p class="font-semibold text-lg">{{ $user->adresse }}</p>
                    </div>
                </div>
            </div>
            {{-- SECTION ENTREPRISE ARTISAN --}}
            <div class="border border-gray-300 rounded-md p-4">
                <div>

                </div>
                <h1 class="text-2xl font-extrabold">Entreprise</h1>
                @if (auth()->user()->artisan)
                    <div class="mt-4">
                        <h1 class="text-lg font-bold">Horraires de Travail</h1>
                        <div class="font-medium text-lg my-2 flex flex-col gap-3 items-center">
                            <p class="font-semibold">Heure d'ouverture : {{ $user->artisan->heure_ouverture }}</p>
                            <p class="font-semibold">Heure de Fermeture : {{ $user->artisan->heure_fermeture }}</p>
                        </div>
                        <div class="mt-4">
                            <h1 class="text-lg font-bold">Descriptin d'Entreprise </h1>
                            <p class="font-semibold text-lg my-2 w-full h-48 bg-white rounded-sm p-3">
                                {{ $user->artisan->desc_entreprise }}</p>
                        </div>
                        <div class="flex flex-row justify-between py-4">
                            <div class="flex items-center gap-2.5 bg-gray-900 text-white px-3 py-2 rounded-lg">
                                <h1 class="font-medium text-lg my-2">Type
                                    Service
                                </h1>
                                <span
                                    class="bg-gray-100/25 rounded-full px-2 py-1">{{ $user->artisan->type_service }}</span>
                            </div>
                            <button x-on:click="openform = true , opencompte= false"
                                class="bg-blue-700 hover:bg-blue-800 px-6 py-2 rounded-lg mt-4 text-white">MODIFIER</button>
                        </div>
                    </div>
                @endif
            </div>

            @if (auth()->user()->deliveryMan)
                <h1 class="font-medium text-lg mb-4">La disponibilité</h1>
            @endif
        </div>
        <div x-show="openform" class="bg-gray-100 w-3/4 p-4 mx-auto my-auto rounded-lg">
            <form action="{{ route('profile.update', ['user' => auth()->user()]) }}" method="POST" class="mb-12">
                @csrf
                @method('PUT')
                <div class="flex flex-row gap-8">
                    <div class="w-1/2 flex flex-col gap-4">
                        <x-input name="nom" label="Nom" type="text" :value="auth()->user()->nom" />
                        <x-input name="adresse" label="Adresse" type="text" :value="auth()->user()->adresse" />
                        <x-input name="email" label="Email" type="email" :value="auth()->user()->email" />
                        @if (auth()->user()->artisan)
                            <x-input name="heure_ouverture" label="Heure d'ouverture" type="time"
                                :value="auth()->user()->artisan->heure_ouverture" />
                        @endif
                        {{-- TODO FIX FORM FOR DELIVERYMAN AND ADD DELETE ACCOUNT BUTTON --}}
                    </div>
                    <div class="w-1/2 flex flex-col gap-4">
                        <x-input name="prenom" label="Prénom" type="text" :value="auth()->user()->prenom" />
                        <x-input name="num_telephone" label="Numéro de teléphone" type="text" :value="auth()->user()->num_telephone" />
                        <x-input name="password" label="Mot de passe" type="password" />
                        @if (auth()->user()->artisan)
                            <x-input name="heure_fermeture" label="Heure de fermeture" type="time"
                                :value="auth()->user()->artisan->heure_fermeture" />
                        @endif
                        @if (auth()->user()->deliveryMan)
                            <div>
                                <label
                                    class="block text-sm font-medium leading-6 text-gray-900 mb-2">Disponible?</label>
                                <select
                                    class="form-select w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                    name="est_disponible" label="Êtes-vous disponible ?">
                                    <option>Choisir</option>
                                    <option value="true" @if (old('est_disponible', auth()->user()->deliveryMan->est_disponible) == true) selected @endif>Disponible
                                    </option>
                                    <option value="false" @if (old('est_disponible', auth()->user()->deliveryMan->est_disponible) == false) selected @endif>Non
                                        disponible
                                    </option>
                                </select>
                            </div>
                        @endif
                    </div>
                </div>
                <button type="submit"
                    class="bg-blue-700 hover:bg-blue-800 px-6 py-2 rounded-md mt-4 text-white">MODIFIER
                    VOS INFORMATIONS</button>
            </form>
            <button x-on:click="openform= false ,opencompte= true"
                class="bg-red-700 hover:bg-red-800 px-6 py-2 rounded-lg text-white">Annuler</button>
        </div>
    </div>
</x-default-layout>
