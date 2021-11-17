<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // return redirect(RouteServiceProvider::HOME);

            // ログイン中にログアウト中に閲覧できるURLに変更すると/indexにリダイレクトされる
            if (Auth::check()) {
                return redirect()->route('work');
                // ログアウト中にログイン中に閲覧できるURLに変更すると/loginにリダイレクトされる
            } else {
                return redirect()->route('login.form');
            }
        }

        return $next($request);
    }
}
