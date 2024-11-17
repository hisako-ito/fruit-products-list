<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::Paginate(6);
        return view('products', compact('products'));
    }

    public function add()
    {
        $seasons = Season::all();
        return view('register', compact('seasons'));
    }

    public function create(ProductRequest $request)
    {
        $seasons = Season::all();

        $fileName = Str::slug($request->name) . '.' . $request->file('image')->getClientOriginalExtension();

        $filePath = $request->file('image')->storeAs('img', $fileName, 'public');

        $form = [
            'name' => $request->name,
            'price' => $request->price,
            'image' => $filePath,
            'description' => $request->description,
        ];

        $product = Product::create($form);
        $product->seasons()->attach($request->seasons);

        return redirect('/products');
    }

    public function search(Request $request)
    {
        $products = Product::with('seasons')->keywordSearch($request->keyword)->get();
        return view('search', compact('products'));
    }

    public function edit(Product $product)
    {
        $seasons = Season::all();
        $products = Product::all();
        return view('details', compact('product', 'seasons'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('img', 'public');
            $product->image = $filePath;
        }

        $form = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ];

        $product->fill($form)->save();

        if ($request->has('seasons')) {
            $product->seasons()->sync($request->input('seasons'));
        }

        return redirect('/products');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products');
    }
}