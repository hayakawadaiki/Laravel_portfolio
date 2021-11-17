<?php

namespace App\Http\Controllers\User\Nav;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NavsController extends Controller
{
    public function work()
    {
        return view('nav.work');
    }

    public function profile()
    {
        return view('nav.profile');
    }
}
