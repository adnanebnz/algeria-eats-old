<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();
        return view("products.index", [
            "products" => $products
        ]);
        // TODO TO CREATE
    }
    public function show(Product $product): View
    {
        return view("products.show", [
            "product" => $product
        ]);
        // TODO TO CREATE
    }
}
