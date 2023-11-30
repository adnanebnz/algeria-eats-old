<x-dashboard-layout :isArtisan=true>
    <main>
        <div class="pt-6 px-4">
            <div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-4">
                <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Ventes ce mois-ci</h3>
                    <div>
                        <canvas id="artisansChart"></canvas>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Dernières opérations</h3>
                            <span class="text-base font-normal text-gray-500">Ceci est une liste des dernières
                                opérations</span>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('artisan.orders') }}"
                                class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg p-2">Voir tout</a>
                        </div>
                    </div>
                    <div class="flex flex-col mt-8">
                        <div class="overflow-x-auto rounded-lg">
                            <div class="align-middle inline-block min-w-full">
                                <div class="shadow overflow-hidden sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Opération
                                                </th>
                                                <th scope="col"
                                                    class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Date
                                                </th>
                                                <th scope="col"
                                                    class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Prix Total
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white">
                                            @foreach ($latestOrders as $order)
                                                <tr>
                                                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                                        Commande id <span class="font-semibold">#{{ $order->id }}
                                                        </span>
                                                    </td>
                                                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                                        {{ $order->created_at->format('d/m/Y') }}
                                                    </td>
                                                    <td
                                                        class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                                        {{ $order->getTotalPrice() }} DA
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                    <div class="flex flex-col gap-1 justify-center items-center">
                        <span
                            class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $totalProducts }}</span>
                        <h3 class="text-base font-normal text-gray-500">Produits Totals</h3>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                    <div class="flex flex-col gap-1 justify-center items-center">
                        <span
                            class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $totalOrders }}</span>
                        <h3 class="text-base font-normal text-gray-500">Commandes Totals</h3>
                    </div>
                </div>
                <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                    <div class="flex flex-col gap-1 justify-center items-center">
                        <span
                            class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">{{ $totalDeliveries }}</span>
                        <h3 class="text-base font-normal text-gray-500">Livraisons Totals</h3>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4 my-4">
                <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold leading-none text-gray-900">Meilleurs Produits vendu</h3>
                    </div>
                    <div class="flow-root">
                        <ul role="list" class="divide-y divide-gray-200">
                            @foreach ($topSellingProducts as $product)
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <img class="h-32 w-32 rounded-md"
                                                src="{{ str_starts_with($product->images[0], 'http') ? $product->images[0] : asset('storage/' . $product->images[0]) }}">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-md font-medium text-gray-900 truncate">
                                                {{ $product->nom }}
                                            </p>
                                            <p class="text-md text-gray-500 truncate">
                                                {{ $product->categorie === 'sucree' ? 'Sucré' : 'Salé' }}
                                            </p>
                                        </div>
                                        <div class="inline-flex items-center text-lg font-semibold text-gray-900">
                                            {{ $product->prix }}DA
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        var artisansChart = new Chart(document.getElementById('artisansChart'), {
            type: 'pie',
            data: {
                labels: @json($months),
                datasets: [{
                    data: @json($orderCounts),
                    backgroundColor: ['#60a5fa', '#8B8B8D'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom'
                }
            }
        });
    </script>

</x-dashboard-layout>
