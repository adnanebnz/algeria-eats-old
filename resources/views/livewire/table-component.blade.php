<div>
    <table class="min-w-full leading-normal mt-5">
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
                    Email
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Numéro de téléphone
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Quantité
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
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $order->id }}
                    </td>

                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $order->consumer->getFullName() }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $order->consumer->email }}
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $order->consumer->num_telephone }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $order->orderItems->where('product_id', $product->id)->first()->quantity }}
                    </td>
                    <td class="px-5 py-5 bg-white text-sm flex items-center justify-center gap-3 mt-1">
                        <a href="{{ route('artisan.orders.show', ['order' => $order]) }}"
                            class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-500">Voir</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-slate-400 text-center p-4" colspan="7">Aucun résultat.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-5">
        {{ $orders->links(data: ['scrollTo' => '#products']) }}
    </div>
</div>
