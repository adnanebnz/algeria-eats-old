<x-dashboard-layout :isAdmin=true>
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
                            <x-input name="heure_ouverture" label="Heure d'ouverture" type="time"
                                :value="auth()->user()->artisan->heure_ouverture" />
                            {{-- TODO ADD DELETE ACCOUNT BUTTON --}}
                        </div>
                        <div class="md:w-1/2 flex flex-col gap-4">
                            <x-input name="prenom" label="Prénom" type="text" :value="auth()->user()->prenom" />
                            <x-input name="wilaya" label="Wilaya" type="text" :value="auth()->user()->wilaya" />

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
                        VOS INFORMATIONS
                    </button>
                    <form method="POST" action="{{ route('admin.destroy', ['user' => $user->id]) }}" onsubmit="return confirm('Are you sure you want to delete this user?')">
                        @csrf
                        @method('DELETE')
                    
                        <button type="submit" class="bg-red-700 hover:bg-red-800 px-6 py-2 rounded-md mt-8 text-white">
                            Supprimer
                        </button>
                    </form>
                    
                </form>
            </div>
        @endif
</x-dashboard-layout>