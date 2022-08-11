<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register()
    {
        return view('auth.register');
    }

    public function process_register(Request $request)
    {
        $dataCreate = $request->all();
        $dataCreate['password'] = Hash::make($request->password);

        $user = $this->user->create($dataCreate);

        $user->roles()->attach($dataCreate['role']);
        return redirect()->route('login');
    }
}