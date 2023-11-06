<x-default-layout>
    <div x-data="{ openform: false, opencompte: true }" class="w-full flex justify-center items-center">
        <div x-show="opencompte" class="bg-slate-200 w-3/4 p-4 mx-auto my-auto rounded-lg">
            <img class="rounded-full w-32 h-32 mx-auto my-4" src="{{ $user->image }}"
                alt="marach 3adna les donnés t3 les artisanes" />
            @if (auth()->user()->artisan)
                <h1 class="">Rating !</h1>
            @endif
            @if (auth()->user()->deliveryMan)
                <h1 class="">Rating !</h1>
            @endif
            <div class="font-extrabold text-center my-12">
                <h1 class="text-4xl">{{ $user->nom }}</h1>
                <h2 class="text-xl">{{ $user->prenom }}</h2>
            </div>
            <h1 class="font-medium text-lg mb-4">{{ $user->email }}</h1>
            <h1 class="font-medium text-lg mb-4">{{ $user->num_telephone }}</h1>
            <h1 class="font-medium text-lg mb-4">{{ $user->adresse }}</h1>
            @if (auth()->user()->artisan)
                <div class="font-medium text-lg my-2 flex gap-5">
                    <h1>heure ouverture</h1>
                    <h1>heure fermeture</h1>
                </div>
                <p class="font-semibold text-lg my-2 w-full h-48 bg-white rounded-sm">Lorem ipsum dolor sit amet
                    consectetur adipisicing elit. Placeat, ut recusandae. Iure illum sit commodi sapiente sed fugit esse
                    libero, voluptatibus, quam corrupti dolores eveniet magni repellendus, at quis! Id.</p>
                <div class="flex flex-row justify-between">
                    <h1 class="font-medium text-lg my-2 w-max bg-black text-white p-2 rounded-lg">type service</h1>
                    <button x-on:click="openform = true , opencompte= false"
                        class="bg-blue-700 hover:bg-blue-800 px-6 py-2 rounded-lg text-white">MODIFIER</button>
                </div>
            @endif
            @if (auth()->user()->deliveryMan)
                <h1 class="font-medium text-lg mb-4">La disponibilité</h1>
            @endif
        </div>
        <div x-show="openform" class="bg-slate-200 w-3/4 p-4 mx-auto my-auto rounded-lg">
            <form action="ModifierProfile" method="post" class="flex flex-col gap-y-12 mb-12">
                <div class="flex gap-5 my-12">
                    <input class="w-1/2 h-12 rounded-md p-2" type="text" placeholder="{{ $user->prenom }}">
                    <input class="w-1/2 h-12 rounded-md p-2 " type="text" placeholder="{{ $user->nom }}">
                </div>
                <input class="w-full h-12 rounded-md p-2" type="text" placeholder="{{ $user->num_telephone }}">
                <input class="w-full h-12 rounded-md p-2" type="text" placeholder="{{ $user->adresse }}">
                @if (auth()->user()->artisan)
                    <div class="flex gap-12 justify-center">
                        <div>
                            <label for="heure_ouverture">heure ouverture</label>
                            <input class="text-center rounded-md " type="time" name="heure_ouverture">
                        </div>
                        <div>
                            <label for="heure_fermeture">heure_fermeture</label>
                            <input class="text-center rounded-md " type="time" name="heure_fermeture">
                        </div>
                    </div>
                    <textarea name="Description" cols="30" rows="10">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, voluptates maxime officia nostrum eaque repellendus recusandae optio, facere cum magnam temporibus possimus unde excepturi sunt, vitae nihil tempore quos laborum.
                 </textarea>
                @endif
                <button type="submit"
                    class="bg-blue-700 hover:bg-blue-800 px-6 py-2 rounded-lg text-white">Valider</button>

            </form>
            <button x-on:click="openform= false ,opencompte= true"
                class="bg-red-700 hover:bg-red-800 px-6 py-2 rounded-lg text-white">Annuler</button>
        </div>
    </div>
</x-default-layout>
