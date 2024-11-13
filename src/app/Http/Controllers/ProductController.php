<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $products = Product::Paginate(6);
        return view('products', compact('products'));
    }

    public function search(Request $request)
    {
        $products = Product::with('season')->keywordSearch($request->keyword)->get();
        return view('search', compact('products'));
    }

    public function edit(Product $product)
    {
        return view('details', compact('product'));
    }

}