<x-dashboard-layout :isUser=true>
    <main>
        <div class="pt-6 px-4">

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
    
            <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4 my-4">
                <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                    
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold leading-none text-gray-900">Old Orders</h3>
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
                                    Date
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
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                                    Prix Total
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                    </table>

                </div>

                

            </div>

        </div>
    </main>
</x-dashboard-layout>