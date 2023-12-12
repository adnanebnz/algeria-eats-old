<x-user-view>
    <main>
        <div class="pt-6 px-4">
            <div class="my-4 ">
                <h1 class="font-bold text-lg text-gray-700 py-4">Aperçu des statistiques</h1>
                <div id="stats" class="grid gird-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex flex-row space-x-4 items-center">
                            <div id="stats-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-10 h-10 tex-gray-700">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-indigo-500 text-sm font-medium uppercase leading-4">Commandes Totals</p>
                                <p class="text-gray-800 font-bold text-2xl inline-flex items-center space-x-2">
                                    <span>{{ $totalOrders }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex flex-row space-x-4 items-center">
                            <div id="stats-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-10 h-10 tex-gray-700">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-indigo-500 text-sm font-medium uppercase leading-4">Commandes en cours
                                </p>
                                <p class="text-gray-800 font-bold text-2xl inline-flex items-center space-x-2">
                                    <span>{{ $totalPendingOrders }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex flex-row space-x-4 items-center">
                            <div id="stats-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-700">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                            </div>
                            <div>
                                <p class="text-teal-500 text-sm font-medium uppercase leading-4">Dépenses</p>
                                <p class="text-gray-800 font-bold text-2xl inline-flex items-center space-x-2">
                                    <span>{{ $totalSpent }} DA</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-bold leading-none text-gray-900">Order Status</h3>
                    <a href="#"
                        class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                        View all
                    </a>
                </div>

                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Id
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nom de l'artisan
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Produit
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Prix Total
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Facturer
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $order->id }}
                                </td>
                                <td class="text-ellipsis text-sm">
                                    {{ $order->artisan->nom }}
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    @foreach ($order->orderItems as $orderItem)
                                        {{ $orderItem->product->nom }} (x{{ $orderItem->quantity }}) <br>
                                    @endforeach
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $order->getTotalPrice() }} DA
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 ">
                                    @if ($order->status == 'pending')
                                        <span
                                            class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            En attente
                                        </span>
                                    @endif
                                    @if ($order->status == 'processing')
                                        <span
                                            class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            En cours
                                        </span>
                                    @endif

                                    @if ($order->status == 'cancelled')
                                        <span
                                            class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Annulée
                                        </span>
                                    @endif
                                    @if ($order->status == 'completed')
                                        <span
                                            class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Terminée
                                        </span>
                                    @endif
                                </td>
                                <td class="px-5 py-5 bg-white text-sm flex items-center justify-center gap-3 mt-1">
                                    <a href="{{ route('artisan.orders.show', ['order' => $order]) }}"
                                        class="bg-indigo-500 text-white px-3 py-2 rounded-md hover:bg-indigo-400">Voir</a>
                                    <form action="{{ route('artisan.orders.invoice', $order) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-400">Facturer</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-slate-400 text-center p-4" colspan="7">Aucun résultat.</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>


            </div>

        </div>
    </main>
</x-user-view>
