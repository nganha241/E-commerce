<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ProductOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $order, $productOrder;

    public function __construct(Order $order, ProductOrder $productOrder)
    {
        $this->order = $order;
        $this->productOrder = $productOrder;
    }

    public function index()
    {
        $orders = $this->order->latest()->paginate(5);
        $productOrder = $this->productOrder->latest()->paginate(5);
        return view('client.user.order', compact('orders', 'productOrder'));
    }



    public function cancel(Request $request, $id)
    {
        $this->order->whereId($id)->update(['status' => $request->input('status')]);
        return redirect()->route('my_orders');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order =  $this->order->findOrFail($id);
        $proOrder = $this->productOrder->whereOrderId($id)->get();
        return view('client.user.detail-order', compact('proOrder', 'order'));
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
        $this->order->destroy($id);
    }
}