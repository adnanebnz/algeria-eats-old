<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
                array_push($uploadedFileUrl, Cloudinary::upload($image->getRealPath())->getSecurePath());
            }
        }
        $data['images'] = $uploadedFilesUrl;

        $product = Product::updateOrCreate(['id' => $product?->id], $data);

        return redirect()->route('product.show', ['product' => $product])->withStatus(
            $product->wasRecentlyCreated ? 'Produit publié !' : 'Produit mis à jour !'
        );
    }
    protected function showForm(Product $product = new Product()): View
    {
        return view('artisan.form', [
            'product' => $product,
        ]);
        // TODO TO CREATE
    }
    public function index(): View
    {
        return view('artisan.dashboard');
    }
    public function products()
    {
        $products = Product::all();
        // TODO PAGINATE and add UI of pagination
        return view('artisan.produits', [
            "products" => $products
        ]);
    }
    public function create(): View
    {
        return view('artisan.createProduct');
        // TODO TO CREATE FOR PRODUCTS
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string',
            'description' => 'required|string',
            'categorie' => 'required|in:SUCREE,SALEE',
            'prix' => 'required|integer',
            'images' => 'required',
        ]);
        $data['user_id'] = auth()->user()->id;
        $data['images'] = json_encode($data['images']);
        Product::create($data);
        return redirect()->route('artisan.products');
        // TODO ADD SAVE METHOD LATER
    }

    public function edit(): View
    {
        return view('artisan.editProduct');
        // TODO CREATE FOR PRODUCTS
    }

    public function update(Product $product, Request $request)
    {
        // update product
        return $this->save($request->validated(), $product);
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('artisan.products');
    }
}
