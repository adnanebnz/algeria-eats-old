<div class="w-1/2 h-max bg-slate-200 hover:bg-slate-300 rounded-lg p-2 text-3xl"
    onclick="window.location='{{ route('admin.users.index') }}'">
    <h1 class="my-2">{{ $users }} User</h1>
    <h1 class="my-2">{{ $artisans }} Artisan : {{ ($artisans / $users) * 100 }} %</h1>
    <h1 class="my-2">{{ $deliveryMans }} Livreur : {{ ($deliveryMans / $users) * 100 }} %</h1>
    <h1 class="my-2">{{ $consumer }} Consumer : {{ ($consumer / $users) * 100 }} % </h1>
</div>
