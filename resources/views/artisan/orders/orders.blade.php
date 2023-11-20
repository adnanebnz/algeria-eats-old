<x-dashboard-layout :isArtisan=true>
    <div class="bg-white pb-8 pl-8 pr-8 rounded-md w-full">
        <div class="mt-4">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Id
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nom du client
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
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $order->id }}
                                    </td>
                                    <td class="text-ellipsis text-sm">
                                        {{ $order->consumer->nom }}
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
                                        <form action="{{ route('artisan.orders.destroy', ['order' => $order]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-400">Supprimer</button>
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
                <div class="mt-3">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
