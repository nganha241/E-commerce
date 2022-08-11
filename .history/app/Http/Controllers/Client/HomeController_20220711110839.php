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
        $products = $this->product->latest('id')->limit(10)->get();
        // $products =  $this->category->getBy($request->all(), 3);
        // $products =  $this->product->getBy($request->all(), 1);
        // $categories =  $this->category->getBy($request->all(), 1);

        // $products = $this->product->with('categories')->find(3);
        $sale = $this->product->latest()->where('sale', '>', 0)->get();
        // $categories = Category::with('products')->find(3);
        // $categories = $this->category->all();
        $categories = $this->product->with('categories')->pivot;
        dd($categories);
        // $products = $this->product->latest('updated_at')->join('categories', 'categories.category_id', 'products.product_id')->take(8)->get();
        // dd($categories);
        return view('client.home', compact('products', 'sale', 'categories'));
    }
}