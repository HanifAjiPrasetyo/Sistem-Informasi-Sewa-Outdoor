<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function index()
    {
        if (request('category')) {
            return view('products.index', [
                'products' => Product::all()->where('category_id', request('category')),
            ]);
        } else {
            return view('products.index', [
                'products' => Product::latest()->paginate(4)
            ]);
        }
    }

    public function show(Product $product)
    {
        return view('products.detail', [
            'product' => $product
        ]);
    }
}
