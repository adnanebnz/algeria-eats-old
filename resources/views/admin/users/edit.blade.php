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
                        <x-input name="heure_ouverture" label="Heure d'ouverture" type="time" :value="auth()->user()->artisan->heure_ouverture" />
                        {{-- TODO ADD DELETE ACCOUNT BUTTON --}}
                    </div>
                    <div class="md:w-1/2 flex flex-col gap-4">
                        <x-input name="prenom" label="Prénom" type="text" :value="auth()->user()->prenom" />
                        <x-input name="wilaya" label="Wilaya" type="text" :value="auth()->user()->wilaya" />

                        <x-input name="num_telephone" label="Numéro de teléphone" type="text" :value="auth()->user()->num_telephone" />
                        <div x-data="{ showPassword: false }" class="relative mt-1">
                            <label for="password" class="block text-sm font-medium text-gray-700 select-none">
                                Mot de passe
                            </label>
                            <div class="flex items-center mt-2">
                                <input :type="showPassword ? 'text' : 'password'" wire:model="password" name="password"
                                    class="form-input flex-1  w-full rounded-md border-0 py-2 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 text-gray-900 shadow-sm ring-gray-300 placeholder:text-gray-400 focus:ring-blue-600"
                                    type="password">
                                <button type="button"
                                    class="absolute right-2 bg-transparent flex items-center justify-center hover:text-blue-600"
                                    @click="showPassword = !showPassword">
                                    <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                        </path>
                                    </svg>

                                    <svg x-show="showPassword" class="w-5 h-5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

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
                <form method="POST" action="{{ route('admin.destroy', ['user' => $user->id]) }}"
                    onsubmit="return confirm('Are you sure you want to delete this user?')">
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
