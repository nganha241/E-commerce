<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function index()
    {
        $products = $this->product->latest('updated_at')->get();

        return view('client.home', compact('products'));
    }
}