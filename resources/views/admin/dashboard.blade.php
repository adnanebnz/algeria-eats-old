<x-dashboard-layout :isAdmin=true>
    <div class="flex gap-2 my-2">
        <div class="h-max w-1/2 bg-slate-200 hover:bg-slate-300 rounded-lg p-2 flex-col text-3xl ">
            <h1 class="my-2">Products :</h1>
            <h1 class="my-2">Items : {{ $products->count() }}</h1>
            <h1 class="my-2">Orders : {{ $orders->count() }} </h1>
            <h1 class="my-2">Sales ratio : {{ ($orders->count() / $products->count()) * 100 }} %</h1>
        </div>
        <livewire:user-statistic />
        <div class="w-1/2 h-max bg-slate-200 hover:bg-slate-300 rounded-lg p-2 text-3xl">
            <h1 class="my-2">{{ $users->count() }} User</h1>
            <h1 class="my-2">{{ $artisans->count() }} Artisan : {{ ($artisans->count() / $users->count()) * 100 }} %
            </h1>
            <h1 class="my-2">{{ $deliveryMans->count() }} Livreur :
                {{ ($deliveryMans->count() / $users->count()) * 100 }} %</h1>
            <h1 class="my-2">{{ $consumer->count() }} Consumer : {{ ($consumer->count() / $users->count()) * 100 }} %
            </h1>
        </div>

        <div>


        </div>
    </div>



</x-dashboard-layout>
