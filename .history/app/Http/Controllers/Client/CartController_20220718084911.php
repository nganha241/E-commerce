<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $cart, $product, $cartProduct, $coupon, $order;

    public function __construct(Cart $cart, Product $product, CartProduct $cartProduct, Coupon $coupon, Order $order)
    {
        $this->cart = $cart;
        $this->product = $product;
        $this->cartProduct = $cartProduct;
        $this->coupon = $coupon;
        $this->order = $order;
    }

    public function index()
    {
        $carts = $this->cart->firstOrCreateBy(auth()->user()->id)->load('products');
        return view('client.cart', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        $product = $this->product->findOrFail($request->product_id);
        $cart = $this->cart->firstOrCreateBy(auth()->user()->id);
        $cartProduct = $this->cartProduct->getById($cart->id, $product->id);

        if ($cartProduct) {
            $quantity = $cartProduct->product_quantity;
            $cartProduct->update(['product_quantity' => ($quantity + $request->product_quantity)]);
        } else {
            $dataCreate['cart_id'] = $cart->id;
            $dataCreate['product_quantity'] = $request->product_quantity ?? 1;
            $dataCreate['product_price'] = $product->price;
            $dataCreate['product_id'] = $request->product_id;
            $this->cartProduct->create($dataCreate);
        }
        return redirect()->back()->with(['message' => 'create new category']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cartProduct->destroy($id);
        return to_route('cart')->with(['mess', 'delete success']);
    }

    public function checkout()
    {
        $user = auth()->user();
        $carts = $this->cart->firstOrCreateBy(auth()->user()->id)->load('products');
        $sum = 0;
        foreach ($carts->products as $cart) {
            $sum += ($cart->product_quantity * ($cart->product_price - ($cart->product->sale * $cart->product_price) / 100));
        }
        return view('client.checkout', compact('user', 'carts', 'sum'));
    }

    public function applyCoupon(Request $request)
    {
        $name = $request->input('coupon_code');
        $coupon = $this->coupon->firstWithExpiryDate($name, auth()->user()->id);

        if ($coupon) {
            $mess = 'Áp mã giảm giá thành công!';
            Session::put('coupon_id', $coupon->id);
            Session::put('discount_amount_price', $coupon->value);
            Session::put('coupon_code', $coupon->name);
        } else {
            Session::forget(['coupon_id', 'discount_amount_price', 'coupon_code']);
            $mess = 'Mã giảm giá không tồn tại!';
        }
        return redirect()->route('carts.checkout')->with([
            'mess' => $mess,
        ]);
    }

    public function process_checkout()
    {
    }
}
