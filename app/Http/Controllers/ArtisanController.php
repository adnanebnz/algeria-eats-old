<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreation;
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
    protected function save(array $data, Product $product = null): RedirectResponse
    {
        if (isset($data['images'])) {
            $uploadedFilesUrl = [];

            foreach ($data['images'] as $image) {
                $filename = 'image_' . uniqid() . '.' . $image->getClientOriginalExtension();
                Storage::disk('public')->put($filename, file_get_contents($image->getRealPath()));
                $uploadedFilesUrl[] = Storage::disk('public')->url($filename);
            }
            $data['images'] = $uploadedFilesUrl;
        }

        $product = Product::updateOrCreate(['id' => $product?->id], $data);

        // return redirect()->route('artisan.index')->withStatus(
        //     $product->wasRecentlyCreated ? 'Produit publié !' : 'Produit mis à jour !'
        // );
    }

    protected function showForm(Product $product = new Product()): View
    {
        return view('artisan.products.form', [
            'product' => $product,
        ]);
    }
    public function index(): View
    {
        return view('artisan.dashboard');
    }
    public function products()
    {
        $products = Product::where('user_id', auth()->user()->id)->paginate(10);
        return view('artisan.products.products', [
            "products" => $products
        ]);
    }
    public function create(): View
    {
        return view('artisan.products.createForm');
    }

    public function store(ProductCreation $request)
    {
        $this->save($request->validated());
    }

    public function edit(Product $product): View
    {
        return $this->showForm($product);
    }

    public function update(Product $product, ProductCreation $request)
    {
        return $this->save($request->validated(), $product);
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('artisan.products');
    }
}
