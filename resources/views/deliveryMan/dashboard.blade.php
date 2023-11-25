<x-dashboard-layout :isDeliver=true>
    <div class="h-screen bg-gray-50">
        <div class="mt-8">
            <div class="flex flex-col md:flex-row px-4 md:px-0 gap-5 items-center justify-center">
                <div class="flex-1 ml-6 bg-white p-4 shadow rounded-lg">
                    <h2 class="text-gray-500 text-lg font-semibold pb-1">Usuarios</h2>
                    <div class="my-1"></div> <!-- Espacio de separación -->
                    <div class="bg-gradient-to-r from-blue-300 to-blue-500 h-px mb-6"></div>
                    <!-- Línea con gradiente -->
                    <div class="chart-container" style="position: relative; height:150px; width:100%;">
                        <!-- El canvas para la gráfica -->
                        <canvas id="usersChart"></canvas>
                    </div>
                </div>

                <!-- Sección 2 - Gráfica de Comercios -->
                <div class="flex-1 bg-white p-4 ml-2 shadow rounded-lg">
                    <h2 class="text-gray-500 text-lg font-semibold pb-1">Comercios</h2>
                    <div class="my-1"></div> <!-- Espacio de separación -->
                    <div class="bg-gradient-to-r from-blue-300 to-blue-500 h-px mb-6"></div>
                    <!-- Línea con gradiente -->
                    <div class="chart-container" style="position: relative; height:150px; width:100%;">
                        <!-- El canvas para la gráfica -->
                        <canvas id="commercesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white p-4 shadow rounded-lg">
            <h2 class="text-gray-500 text-lg font-semibold pb-4">Autorizaciones Pendientes</h2>
            <div class="my-1"></div> <!-- Espacio de separación -->
            <div class="bg-gradient-to-r from-blue-300 to-blue-500 h-px mb-6"></div> <!-- Línea con gradiente -->
            <table class="w-full table-auto text-sm">
                <thead>
                    <tr class="text-sm leading-normal">
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Foto</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Nombre</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Rol</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-2 px-4 border-b border-grey-light"><img src="https://via.placeholder.com/40"
                                alt="Foto Perfil" class="rounded-full h-10 w-10"></td>
                        <td class="py-2 px-4 border-b border-grey-light">Juan Pérez</td>
                        <td class="py-2 px-4 border-b border-grey-light">Comercio</td>
                    </tr>
                    <!-- Añade más filas aquí como la anterior para cada autorización pendiente -->
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-2 px-4 border-b border-grey-light"><img src="https://via.placeholder.com/40"
                                alt="Foto Perfil" class="rounded-full h-10 w-10"></td>
                        <td class="py-2 px-4 border-b border-grey-light">María Gómez</td>
                        <td class="py-2 px-4 border-b border-grey-light">Usuario</td>
                    </tr>
                    </tr>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-2 px-4 border-b border-grey-light"><img src="https://via.placeholder.com/40"
                                alt="Foto Perfil" class="rounded-full h-10 w-10"></td>
                        <td class="py-2 px-4 border-b border-grey-light">Carlos López</td>
                        <td class="py-2 px-4 border-b border-grey-light">Usuario</td>
                    </tr>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-2 px-4 border-b border-grey-light"><img src="https://via.placeholder.com/40"
                                alt="Foto Perfil" class="rounded-full h-10 w-10"></td>
                        <td class="py-2 px-4 border-b border-grey-light">Laura Torres</td>
                        <td class="py-2 px-4 border-b border-grey-light">Comercio</td>
                    </tr>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-2 px-4 border-b border-grey-light"><img src="https://via.placeholder.com/40"
                                alt="Foto Perfil" class="rounded-full h-10 w-10"></td>
                        <td class="py-2 px-4 border-b border-grey-light">Ana Ramírez</td>
                        <td class="py-2 px-4 border-b border-grey-light">Usuario</td>
                    </tr>
                </tbody>
            </table>
            <!-- Botón "Ver más" para la tabla de Autorizaciones Pendientes -->
            <div class="text-right mt-4">
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Ver más
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
