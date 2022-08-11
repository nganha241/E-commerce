<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
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
        $date = Carbon::now();
        dd($date->format('d-m-Y'));
        $category = $this->category->count();
        $product = $this->product->count();
        $order = $this->order->whereStatus('Pending')->count();
        $newOrder = $this->order->whereStatus('Pending')->where()->get();
        $user = $this->user->count();

        return view('admin.dashboard', compact('category', 'product', 'user', 'order', 'date', 'newOrder'));
    }
}