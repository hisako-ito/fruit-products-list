<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use App\Models\ProductSeason;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products');
    }
}
