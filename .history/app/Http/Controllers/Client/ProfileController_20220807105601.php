<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
        $dataUpdate = $request->input('image');
        $user =  $this->user->findOrFail($id);
        $currentImage =  $user->images->count() > 0 ? $user->images->first()->url : '';
        $dataUpdate['image'] = $this->user->updateImage($request, $currentImage);

        $user->images()->delete();
        $user->images()->create(['url' => $dataUpdate['image']]);
        return redirect()->route('profile');
    }

    public function changePassword(Request $request, $id)
    {

        $oldPassword = $this->user->whereId($id)->value('password');

        $this->user->whereId($id)->update(['name' => $request->input('name')]);
        $this->user->whereId($id)->update(['address' => $request->input('address')]);
        $this->user->whereId($id)->update(['phone' => $request->input('phone')]);

        if (Hash::check($request->input('old-password'), $oldPassword[0])) {
            dd('ha');
            $this->user->whereId($id)->update(['password' => Hash::make($request->input('password'))]);
        }
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