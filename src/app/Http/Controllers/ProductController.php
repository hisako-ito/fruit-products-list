<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;
use Diglactic\Breadcrumbs\Breadcrumbs;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $products = Product::Paginate(6);
        return view('products', compact('products'));
    }

    public function add()
    {
        return view('register');
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

    public function update(Request $request)
    {
        if ($request->has('back')) {
            return redirect('/products')->withInput();
        }

        $form = $request->all();
        unset($form['_token']);
        Product::find($request->id)->update($form);
        return redirect('/products');
    }
}