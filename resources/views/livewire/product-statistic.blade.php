<div class="h-max w-1/2 bg-slate-200 hover:bg-slate-300 rounded-lg p-2 flex-col text-3xl ">
    <h1 class="my-2">Products :</h1>
    <h1 class="my-2">Items : {{ $products }}</h1>
    <h1 class="my-2">Orders : {{ $orders }} </h1>
    <h1 class="my-2">Sales ratio : {{ ($orders/$products) * 100 }} %</h1>
</div>