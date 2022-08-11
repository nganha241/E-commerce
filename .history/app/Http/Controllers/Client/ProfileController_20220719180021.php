<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $order, $user;

    public function __construct(Order $order, User $user)
    {
        $this->order = $order;
        $this->user = $user;
    }

    public function profile()
    {
        $user = auth()->user();
        return view('client.user.profile', compact('user'));
    }

    public function dashboard()
    {
        return view('client.user.dashboard');
    }

    public function orders()
    {
        $orders = $this->order->latest()->paginate(5);
        return view('client.user.order', compact('orders'));
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
    public function updateProfile(Request $request, $id)
    {
        $dataUpdate = $request->all();
        $user =  $this->user->findOrFail($id);
        $currentImage =  $user->images->count() > 0 ? $user->images->first()->url : '';
        $dataUpdate['image'] = $this->user->updateImage($request, $currentImage);
        $user->whereId($id)->update(['image' => $dataUpdate]);
        $user->images()->delete();
        $user->images()->create(['url' => $dataUpdate['image']]);
        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}