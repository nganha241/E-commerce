<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        $category = $this->category->count();
        $product = $this->product->count();
        $order = $this->order->whereStatus('Pending')->count();
        $newOrder = $this->order->whereStatus('Pending')->whereDate('created_at', '=', date('d-m-Y'));
        dd($newOrder);
        $user = $this->user->count();

        return view('admin.dashboard', compact('category', 'product', 'user', 'order', 'date', 'newOrder'));
    }
}