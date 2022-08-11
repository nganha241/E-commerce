<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $order, $product, $category, $user;

    public function __construct(Order $order, Product $product, Category $category, User $user)
    {
        $this->order = $order;
        $this->product = $product;
        $this->category = $category;
        $this->user = $user;
    }

    public function index()
    {
        $category = $this->category->count();
        $product = $this->product->count();
        $order = $this->order->count();
        $user = $this->user->all();
        return view('admin.dashboard');
    }
}