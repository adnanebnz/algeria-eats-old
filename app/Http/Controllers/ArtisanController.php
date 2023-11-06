<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreation;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Http\Requests\ProductUpdate;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ArtisanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('artisan');
    }
    // PRODUCT SECTION
    protected function saveProduct(array $data, Product $product = null)
    {
        if (isset($data['images'])) {
            $uploadedFilesUrl = [];

            foreach ($data['images'] as $image) {
                $filename = 'image_' . uniqid() . '.' . $image->getClientOriginalExtension();
                Storage::disk('public')->put($filename, file_get_contents($image->getRealPath()));
                $uploadedFilesUrl[] = Storage::disk('public')->url($filename);
                // IGNORE THIS ERROR ITS STILL WORKING THO
            }
            $data['images'] = $uploadedFilesUrl;
        }
        $product = Product::updateOrCreate(['id' => $product?->id], $data);
        return redirect()->route('artisan.index')->withStatus(
            $product->wasRecentlyCreated ? 'Produit publié !' : 'Produit mis à jour !'
        );
    }

    protected function showFormProduct(Product $product = new Product()): View
    {
        return view('artisan.products.form', [
            'product' => $product,
        ]);
    }

    public function index(): View
    {
        $chart_options = [
            'chart_title' => 'Commandes par mois',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Order',
            // TODO MAKE THESE CONDITIONS WORK LIKE THE ORDERS ARE NOT AFFECTING TO A SPECEFIC ARTISAN
            'conditions' => [
                ['name' => 'user_id', 'condition' => '=', 'value' => auth()->user()->id, 'color' => 'red', 'fill' => true],
            ],
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'pie',
        ];
        // CALCULATE SALES PER MONTH
        $salesPerMonth = Order::where('user_id', auth()->user()->id)->where('status', 'shipped')->whereBetween('created_at', [now()->subMonth(), now()])->sum('prix_total');

        //LIST THE 7 LATEST ORDERS
        $latestOrders = Order::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->take(7)->get();

        $chart1 = new LaravelChart($chart_options);

        return view('artisan.dashboard', compact('chart1', 'salesPerMonth', 'latestOrders'));
    }
    public function productsIndex()
    {
        $products = Product::where('user_id', auth()->user()->id)->paginate(10);
        return view('artisan.products.products', [
            "products" => $products
        ]);
    }
    public function createProduct(): View
    {
        return view('artisan.products.createForm');
    }

    public function storeProduct(ProductCreation $request)
    {
        return $this->saveProduct($request->validated());
    }

    public function editProduct(Product $product): View
    {
        return $this->showFormProduct($product);
    }

    public function updateProduct(Product $product, ProductUpdate $request)
    {
        return $this->saveProduct($request->validated(), $product);
    }

    public function destroyProduct(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('artisan.products');
    }
    // PRODUCT SECTION END

    // ORDERS SECTION
    public function ordersIndex()
    {
        $orders = Order::where('user_id', auth()->user()->id)->paginate(10);
        return view('artisan.orders.orders', [
            "orders" => $orders
        ]);
    }

    public function showOrder(Order $order)
    {
        return view('artisan.orders.show', [
            "order" => $order
        ]);
        // TODO CREATE
    }

    public function updateOrder(Order $order)
    {
        $order->update([
            'status' => request('status')
        ]);
        return redirect()->route('artisan.orders.show', $order);
    }

    public function destroyOrder(Order $order)
    {
        $order->delete();
        return redirect()->route('artisan.orders');
    }

    // ORDERS SECTION END
}
