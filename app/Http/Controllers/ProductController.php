<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::paginate(12);
        // TODO ADD LOGIC FOR FILTERS
        return view("products.index", [
            "products" => $products
        ]);
    }
    public function show(Product $product): View
    {
        return view("products.show", [
            "product" => $product
        ]);
    }
}
