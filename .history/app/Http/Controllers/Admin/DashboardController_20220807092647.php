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
use App\Models\ProductOrder;

class DashboardController extends Controller
{
    protected $order, $product, $category, $user, $productOrder;

    public function __construct(Order $order, Product $product, Category $category, User $user, ProductOrder $productOrder)
    {
        $this->order = $order;
        $this->product = $product;
        $this->category = $category;
        $this->user = $user;
        $this->productOrder = $productOrder;
    }

    public function index()
    {
        $date = Carbon::now()->format('d-m-Y');
        $category = $this->category->count();
        $product = $this->product->count();
        $order = $this->order->whereStatus('Pending')->count();
        $newOrder = $this->order->whereStatus('Pending')->get();
        $productOrder = $this->productOrder->get();
        $user = $this->user->count();


        return view('admin.dashboard', compact('category', 'product', 'user', 'order', 'date', 'newOrder'));
    }
}