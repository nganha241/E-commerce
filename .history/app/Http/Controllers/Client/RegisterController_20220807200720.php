<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function process_register(Request $request)
    {
        $dataCreate = $request->all();
        $dataCreate['password'] = Hash::make($request->password);
        $dataCreate['image'] = $this->user->saveImage($request);

        $user = $this->user->create($dataCreate);
        $user->images()->create(['url' => $dataCreate['image']]);
        $user->roles()->attach($dataCreate['role_ids']);
    }
}