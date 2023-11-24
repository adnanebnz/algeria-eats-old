<x-dashboard-layout :isDeliver=true>
    <div class="h-screen bg-gray-50">
        <div class="mt-8">
            <div class="flex flex-col md:flex-row px-4 md:px-0 gap-5 items-center justify-center">
                <div class="flex-1 ml-6 bg-white p-4 shadow rounded-lg">
                    <h2 class="text-gray-500 text-lg font-semibold pb-1">completion of deliveries</h2>
                    <div class="my-1"></div> <!-- Espacio de separación -->
                    <div class="bg-gradient-to-r from-blue-300 to-blue-500 h-px mb-6"></div>
                    <!-- Línea con gradiente -->
                    <div class="chart-container" style="position: relative; height:150px; width:100%;">
                        <!-- El canvas para la gráfica -->
                        <canvas id="usersChart"></canvas>
                    </div>
                </div>


                <div class="flex-1 bg-white p-4 ml-2 shadow rounded-lg">
    <h2 class="text-gray-500 text-lg font-semibold pb-1">Stats</h2>
    <div class="my-1"></div> <!-- Espacio de separación -->
    <div class="bg-gradient-to-r from-blue-300 to-blue-500 h-px mb-6"></div>

    <div class="text-gray-700">
        <p class="mb-2">Deliveries Completed Today: <span class="font-semibold text-blue-500">X</span></p>
        <p class="mb-2">Deliveries Completed This Week: <span class="font-semibold text-blue-500">Y</span></p>
        <p class="mb-2">Deliveries Completed This Month: <span class="font-semibold text-blue-500">Z</span></p>
    </div>
</div>

            </div>
        </div>

        <div class="mt-8 bg-white p-4 shadow rounded-lg">
            <h2 class="text-gray-500 text-lg font-semibold pb-4">Dernier Livraisons complet</h2>
            <div class="my-1"></div> <!-- Espacio de separación -->
            <div class="bg-gradient-to-r from-blue-300 to-blue-500 h-px mb-6"></div> <!-- Línea con gradiente -->
            <table class="w-full table-auto text-sm">
                <thead>
                    <tr class="text-sm leading-normal">
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Id</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Nom d'artisan</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Adresse d'artisan</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Nom de client</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Adress de livraison</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            N de telephone de client</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($deliveries as $delivery)
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-2 px-4 border-b border-grey-light">
                        {{ $delivery->id }}
                        </td>
                        <td class="py-2 px-4 border-b border-grey-light">{{ $delivery->order->artisan->nom }}{{ $delivery->order->artisan->prenom }}</td>
                        <td class="py-2 px-4 border-b border-grey-light">{{ $delivery->order->artisan->adresse }}</td>
                        <td class="py-2 px-4 border-b border-grey-light"> {{ $delivery->order->consumer->nom }}</td>
                        <td class="py-2 px-4 border-b border-grey-light">{{ $delivery->order->adresse }} -  {{ $delivery->order->wilaya }}</td>
                        <td class="py-2 px-4 border-b border-grey-light">  {{ $delivery->order->consumer->num_telephone }}</td>
                    </tr>
                    @empty
                                <tr>
                                    <td class="text-slate-400 text-center p-4" colspan="7">Aucun livraisons complete.</td>
                                </tr>
                            @endforelse  
                </tbody>
            </table>
            <!-- Botón "Ver más" para la tabla de Autorizaciones Pendientes -->
            <div class="text-right mt-4">
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    voir tout
                </button>
            </div>
        </div>

    </div>
    </div>
    <script>
        // Gráfica de Usuarios
        var usersChart = new Chart(document.getElementById('usersChart'), {
            type: 'doughnut',
            data: {
                labels: ['Nuevos', 'Registrados'],
                datasets: [{
                    data: [30, 65],
                    backgroundColor: ['#00F0FF', '#8B8B8D'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom' // Ubicar la leyenda debajo del círculo
                }
            }
        });

        // Gráfica de Comercios
        var commercesChart = new Chart(document.getElementById('commercesChart'), {
            type: 'doughnut',
            data: {
                labels: ['Nuevos', 'Registrados'],
                datasets: [{
                    data: [60, 40],
                    backgroundColor: ['#FEC500', '#8B8B8D'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom' // Ubicar la leyenda debajo del círculo
                }
            }
        });

        // Agregar lógica para mostrar/ocultar la navegación lateral al hacer clic en el ícono de menú
        const menuBtn = document.getElementById('menuBtn');
        const sideNav = document.getElementById('sideNav');

        menuBtn.addEventListener('click', () => {
            sideNav.classList.toggle(
                'hidden'); // Agrega o quita la clase 'hidden' para mostrar u ocultar la navegación lateral
        });
    </script>

</x-dashboard-layout>
