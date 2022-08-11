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
        // $products = $this->product->latest('updated_at')->take(8)->get();
        // $products =  $this->product->getBy($request->all(), 3);
        // $products = $this->product->with('categories')->find(3);
        $sale = $this->product->latest()->where('sale', '>', 0)->get();
        $categories = Category::with('products')->find(3);
        SELECT * FROM `category_product` WHERE `product_id`=1;
        // $categories = $this->category->all();
        // $products = $this->product->latest('updated_at')->join('categories', 'categories.category_id', 'products.product_id')->take(8)->get();
        dd($products);
        return view('client.home', compact('products', 'sale', 'categories'));
    }
}