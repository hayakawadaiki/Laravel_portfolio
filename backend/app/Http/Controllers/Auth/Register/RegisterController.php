<?php

namespace App\Http\Controllers\Auth\Register;

use App\Models\Users\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerForm()
    {
        return view('auth.register_form');
    }

    public function register(RegisterRequest $request)
    {
        User::userStore($request);
        return redirect()->route('register.added');
    }

    public function registerAdded()
    {
        return view('auth.register_added');
    }
}
