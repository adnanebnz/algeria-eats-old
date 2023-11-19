<x-default-layout>
    <form action="{{ route('artisan.orders.update', ['order' => $order]) }}" method="POST" class="md:px-20 md:pb-14 pb-4">
        @csrf
        @method('PUT')
        <div class="space-y-12">
            <div class="pb-1">
                <h1 class="text-base font-semibold leading-7 text-gray-900">
                    Voir / Modifier la commande
                </h1>
                <div>
                    <div>
                        <section>
                            <section class="text-slate-800">
                                <div class="container mt-5">
                                    <div {{-- todo to adapt with new UI --}}
                                        class="p-5 bg-white flex items-center mx-auto mb-2 border-gray-200 rounded-lg sm:flex-row flex-col">
                                        <div class="sm:mr-10 inline-flex items-center justify-center flex-shrink-0">
                                            <img class="w-full h-72 object-cover rounded-md"
                                                src="{{ str_starts_with($order->product->images[0], 'http') ? $order->product->images[0] : asset('storage/' . $order->product->images[0]) }}">
                                        </div>
                                        <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                                            <h1 class="text-black text-xl title-font font-bold mb-2">Commande sur
                                                <span
                                                    class="underline underline-offset-4">{{ $order->product->nom }}</span>
                                            </h1>
                                            <p class="font-medium">Quantité: <span
                                                    class="font-bold">{{ $order->quantity }}</span></p>
                                            <p class="font-medium">Nom du client: <span
                                                    class="font-bold">{{ $order->consumer->nom }}</span></p>
                                            <p class="font-medium">Prénom du client: <span
                                                    class="font-bold">{{ $order->consumer->prenom }}</span></p>
                                            <p class="font-medium">Numéro de Téléphone du client: <span
                                                    class="font-bold">{{ $order->num_telephone }}</span>
                                            </p>
                                            <p class="font-medium">Adresse client: <span
                                                    class="font-bold">{{ $order->adresse }}</span>
                                            </p>
                                            <h1 class="text-xl font-bold mt-4">Prix Totale: {{ $order->prix_total }}
                                                DZD
                                            </h1>
                                            <h1 class="mt-4 font-bold text-xl">Modifier le Status de la commande</h1>
                                            <div class="mt-2">
                                                <label for="status">Status de la commande:
                                                    @if ($order->status == 'pending')
                                                        <span
                                                            class="p-2 inline-flex text-md leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                            En attente
                                                        </span>
                                                    @endif
                                                    @if ($order->status == 'accepted')
                                                        <span
                                                            class="p-2 inline-flex text-md leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            Accepté
                                                        </span>
                                                    @endif
                                                    @if ($order->status == 'refused')
                                                        <span
                                                            class="p-2 inline-flex text-md leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                            Refusé
                                                        </span>
                                                    @endif
                                                    @if ($order->status == 'processing')
                                                        <span
                                                            class="p-2 inline-flex text-md leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                            En cours
                                                        </span>
                                                    @endif
                                                    @if ($order->status == 'shipping')
                                                        <span
                                                            class="p-2 inline-flex text-md leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                            Expedition
                                                        </span>
                                                    @endif
                                                    @if ($order->status == 'shipped')
                                                        <span
                                                            class="p-2 inline-flex text-md leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            Terminé
                                                        </span>
                                                    @endif
                                                </label>
                                                <select name="status"
                                                    class="mt-4  block appearance-non bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                                    <option value="pending"
                                                        @if ($order->status == 'pending') selected @endif>En attente
                                                    </option>
                                                    <option value="processing"
                                                        @if ($order->status == 'processing') selected @endif>En cours
                                                    </option>
                                                    <option value="shipped"
                                                        @if ($order->status == 'shipped') selected @endif>Terminé
                                                    </option>
                                                    <option value="shipping"
                                                        @if ($order->status == 'shipping') selected @endif>Expedition
                                                    </option>
                                                    <option value="accepted"
                                                        @if ($order->status == 'accepted') selected @endif>Accpeté
                                                    </option>
                                                    <option value="refused"
                                                        @if ($order->status == 'refused') selected @endif>Refusé
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end">
            <button type="submit"
                class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                Mettre à jour
            </button>
        </div>
    </form>
</x-default-layout>
