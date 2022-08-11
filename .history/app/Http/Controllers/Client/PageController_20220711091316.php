<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $product, $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function shop(Request $request, $productId)
    {
        $products = $this->product->latest()->where('name', 'LIKE', "%{$request->search}%")
            ->orWhere('description', 'LIKE', "%{$request->search}%")
            ->paginate(12);
        $categories =  $this->category->getBy($request->all(), $productId);
        return view('client.shop', compact('products', 'categories'));
    }

    public function single($id)
    {
        $categories = $this->category->all();
        $product = $this->product->findOrFail($id);
        return view('client.single', compact('categories', 'product'));
    }
}