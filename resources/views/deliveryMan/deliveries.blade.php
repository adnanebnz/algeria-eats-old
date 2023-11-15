<x-dashboard-layout :isdeliveryMan=true>
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
                                    Nom d'artisan
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Adress d'artisan
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nom de client
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Adress de livraison
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    N de telephone de client
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Status
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                                    completion
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($deliveries as $delivery)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $delivery->id }}
                                    </td>
                                    <td>
                                        {{ $delivery->$order->$artisan->nom }} {{ $delivery->$order->$artisan->prenom }}
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $delivery->$order->$artisan->Adresse }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                         {{ $delivery->$order->$consumer->nom }} 
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $delivery->$order->$consumer->Adresse }} 

                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $delivery->$order->$consumer->num_telephone }} 

                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 ">
                                        @if ($delivery->is_accepted == false)
                                        <a href="{{ route('') }}"
                                            class="bg-green-600 text-white px-3 py-2 rounded-md hover:bg-green-300">accept</a>
                                        @endif
                                        @if ($delivery->is_accepted == true)
                                        <a href="{{ route('') }}"
                                            class="bg-red-600 text-white px-3 py-2 rounded-md hover:bg-green-300">false</a>
                                        @endif
                    
                                    </td>
                                    <td class="px-5 py-5 bg-white text-sm flex items-center justify-center gap-3 mt-1">
                                    @if ($delivery->is_accepted == true)
                                        <a href="{{ route('') }}"
                                            class="bg-blue-600 text-white px-3 py-2 rounded-md hover:bg-green-300">delivered</a>
                                        @endif
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
                    {{ $deliveries->links() }}
                </div>
            </div>
        </div>
    </div>




</x-dashboard-layout>