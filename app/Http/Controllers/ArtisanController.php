<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreation;
use App\Http\Requests\ProductUpdate;
use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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
        Alert::success('Succès', 'Produit publié !');
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
        $latestOrders = Order::where('artisan_id', auth()->user()->id)->orderBy('created_at', 'desc')->take(5)->get();

        $monthlyOrderCounts = Order::select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
            DB::raw('COUNT(*) as order_count')
        )
            ->where('artisan_id', auth()->user()->id)
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        // Prepare data for the chart
        $months = $monthlyOrderCounts->pluck('month')->toArray();
        $orderCounts = $monthlyOrderCounts->pluck('order_count')->toArray();

        return view('artisan.dashboard', compact('latestOrders', 'months', 'orderCounts'));
    }
    public function productsIndex()
    {
        $products = Product::where('artisan_id', auth()->user()->id)->paginate(10);
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
        Alert::success('Succès', 'Produit publié !');
        return $this->saveProduct($request->validated());
    }

    public function editProduct(Product $product): View
    {
        return $this->showFormProduct($product);
    }

    public function updateProduct(Product $product, ProductUpdate $request)
    {
        Alert::success('Succès', 'Produit mis à jour !');
        return $this->saveProduct($request->validated(), $product);
    }

    public function destroyProduct(Product $product): RedirectResponse
    {
        Alert::success('Succès', 'Produit supprimé !');
        $product->delete();
        return redirect()->route('artisan.products');
    }
    // PRODUCT SECTION END

    // ORDERS SECTION
    public function ordersIndex()
    {
        $orders = Order::where('artisan_id', auth()->user()->id)->paginate(10);
        return view('artisan.orders.orders', [
            "orders" => $orders
        ]);
    }

    public function showOrder(Order $order)
    {
        // LETS GET THE DELIVERY OF THIS ORDER IF EXISTS
        $delivery = Delivery::where('order_id', $order->id)->first();

        return view('artisan.orders.show', [
            "order" => $order,
            "delivery" => $delivery
        ]);
    }

    public function updateOrder(Order $order, Request $request)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,processing,cancelled,completed'
        ]);
        $order->update([
            'status' => $data['status']
        ]);
        Alert::success('Succès', 'Commande mise à jour !');
        return redirect()->route('artisan.orders.show', $order);
    }

    public function destroyOrder(Order $order)
    {
        $order->delete();
        Alert::success('Succès', 'Commande supprimée !');
        return redirect()->route('artisan.orders');
    }

    // ORDERS SECTION END

    // DELIVERIES SECTION
    public function affectDelivery(Order $order)
    {
        $delivery = Delivery::where('order_id', $order->id)->first();
        if ($delivery) {
            Alert::error('Erreur', 'Cette commande a déjà une livraison affectée !');
            return redirect()->route('artisan.orders.show', $order);
        } else
            Delivery::create([
                'order_id' => $order->id,
                'status' => 'pending',
            ]);
        Alert::success('Succès', 'Livraison affectée !');
        return redirect()->route('artisan.orders.show', $order);
    }
    // DELIVERIES SECTION END
}
