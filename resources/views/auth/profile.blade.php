    <x-default-layout title='Profile'>
        <div class="w-full flex flex-col gap-8 justify-center items-center md:pb-16 pb-4">
            <div class="bg-gray-50 md:w-3/4 w-full p-4 mx-auto my-auto rounded-lg shadow-lg">
                <img class="rounded-full w-40 h-40 mx-auto my-4 object-cover border border-solid border-gray-300"
                    src="{{ $user->image ? (str_starts_with($user->image, 'http') ? $user->image : asset('storage/' . $user->image)) : asset('assets/user.png') }}" />


                @if ($user->isArtisan())
                    <div class="flex items-center justify-center">
                        <x-star-rating :rating="$user->artisan->rating" />
                    </div>
                @endif
                @if ($user->isDeliveryMan())
                    <div class="flex items-center justify-center">
                        <x-star-rating :rating="$user->deliveryMan->rating" />
                    </div>
                @endif
                {{-- SECTION D'INFORMATIONS PERSONELLES --}}
                <div class="font-extrabold text-center my-10">
                    <h1 class="md:text-4xl text-2xl">{{ $user->nom }}</h1>
                    <h2 class="md:text-xl text-lg">{{ $user->prenom }}</h2>
                </div>
                <div class="my-12 border border-gray-300 rounded-md p-4">
                    <h1 class="font-extrabold md:text-2xl text-lg">Informations personnelles</h1>
                    <div class="md:mt-3 flex flex-col gap-2">
                        <div class="flex items-center gap-2">
                            <h1 class="font-medium leading-6 text-gray-900 text-sm md:text-base">Email : </h1>
                            <p class="font-semibold md:text-lg">{{ $user->email }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <h1 class="font-medium leading-6 text-gray-900 text-sm md:text-base">Numéro de téléphone :
                            </h1>
                            <p class="font-semibold md:text-lg">{{ $user->num_telephone }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <h1 class="font-medium leading-6 text-gray-900 text-sm md:text-base">Adresse: </h1>
                            <p class="font-semibold md:text-lg">{{ $user->adresse }}</p>
                        </div>
                    </div>
                </div>
                {{-- SECTION ENTREPRISE ARTISAN --}}
                @if ($user->isArtisan())
                    <div class="border border-gray-300 rounded-md p-4">
                        <div>
                        </div>
                        <h1 class="text-2xl font-extrabold">Entreprise</h1>
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
                                        class="bg-gray-100/25 rounded-full px-2 py-1">{{ ($user->artisan->type_service === 'sucree' ? 'Sucré' : $user->artisan->type_service === 'salee') ? 'Salé' : 'Sucré et Salé' }}</span>
                                </div>

                            </div>
                        </div>
                @endif
                @if ($user->isDeliveryMan())
                    <h1 class="font-medium text-lg mb-4">Disponible? :
                        <span
                            class="rounded-full bg-blue-500 text-white px-2 py-1">{{ $user->deliveryMan->est_disponible === 'true' ? 'Oui' : 'Non' }}</span>
                    </h1>
                @endif
            </div>
        </div>
        @if (auth()->id() === $user->id)
            <h1 class="md:text-3xl text-xl font-black md:px-40 px-4 mb-5 mt-5 self-start">Modifier votre Profile
            </h1>
            <div class="bg-gray-50 md:w-3/4 w-full p-4 mx-auto my-auto rounded-lg">
                <form action="{{ route('profile.update', ['user' => auth()->user()]) }}" method="POST" class="mb-12">
                    @csrf
                    @method('PUT')
                    <div class="flex md:flex-row flex-col gap-8">
                        <div class="md:w-1/2 flex flex-col gap-4">
                            <x-input name="nom" label="Nom" type="text" :value="auth()->user()->nom" />
                            <x-input name="adresse" label="Adresse" type="text" :value="auth()->user()->adresse" />
                            <x-input name="email" label="Email" type="email" :value="auth()->user()->email" />
                            @if (auth()->user() && auth()->user()->artisan)
                                <x-textarea name="desc_entreprise" label="Description d'entreprise"
                                    type="text">{{ auth()->user()->artisan->desc_entreprise }}</x-textarea>
                            @endif
                            {{-- TODO ADD DELETE ACCOUNT BUTTON --}}
                        </div>
                        <div class="md:w-1/2 flex flex-col gap-4">
                            <x-input name="prenom" label="Prénom" type="text" :value="auth()->user()->prenom" />
                            <x-input name="num_telephone" label="Numéro de teléphone" type="text"
                                :value="auth()->user()->num_telephone" />
                            <x-input name="password" label="Mot de passe" type="password" />
                            @if (auth()->user() && auth()->user()->artisan)
                                <div>
                                    <label class="block text-sm font-medium leading-6 text-gray-900 mb-2">Type
                                        Service</label>
                                    <select
                                        class="form-select w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                        name="type_service">
                                        <option value="sucree" @if (old('type_service', auth()->user()->artisan->type_service) == 'sucree') selected @endif>
                                            Sucré
                                        </option>
                                        <option value="salee" @if (old('type_service', auth()->user()->artisan->type_service) == 'salee') selected @endif>
                                            Salé
                                        </option>
                                        <option value="sucree_salee" @if (old('type_service', auth()->user()->artisan->type_service) == 'sucree_salee') selected @endif>
                                            Sucré et Salé
                                        </option>
                                    </select>
                                </div>
                                <x-input name="heure_ouverture" label="Heure d'ouverture" type="time"
                                    :value="auth()->user()->artisan->heure_ouverture" />
                                <x-input name="heure_fermeture" label="Heure de fermeture" type="time"
                                    :value="auth()->user()->artisan->heure_fermeture" />
                            @endif
                            @if (auth()->user() && auth()->user()->deliveryMan)
                                <div>
                                    <label
                                        class="block text-sm font-medium leading-6 text-gray-900 mb-2">Disponible?</label>
                                    <select
                                        class="form-select w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                                        name="est_disponible" label="Êtes-vous disponible ?">
                                        <option>Choisir</option>
                                        <option value="true" @if (old('est_disponible', auth()->user()->deliveryMan->est_disponible) == true) selected @endif>
                                            Disponible
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
                        class="bg-blue-700 hover:bg-blue-800 px-6 py-2 rounded-md mt-8 text-white">MODIFIER
                        VOS INFORMATIONS</button>
                </form>
            </div>
        @endif
        </div>
    </x-default-layout>
