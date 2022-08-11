<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $product, $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    public function index(Request $request)
    {
        $products = $this->product->with('categories')->latest('id')->limit(10)->get();
        $sale = $this->product->latest()->where('sale', '>', 0)->get();
        $categories = $this->category->all();
        return view('client.home', compact('products', 'sale', 'categories'));
    }
}