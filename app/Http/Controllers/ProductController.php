<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $filters = [
            'search' => $request->input('search'),
            'artisan' => $request->input('artisan'),
            'artisanRating' => $request->input('artisanRating'),
            'productRating' => $request->input('productRating'),
            'productType' => $request->input('productType'),
        ];

        return $this->productsView($filters);
    }

    protected function productsView(array $filters)
    {
        return view('products.index', [
            'products' => Product::filters($filters)->latest()->paginate(10),
        ]);
    }

    public function show(Product $product): View
    {
        return view("products.show", [
            "product" => $product
        ]);
    }
}
