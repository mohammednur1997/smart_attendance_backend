<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        //if auth guard admin, redirect admin login page
        if (Auth::guard("admin")->check()){
            if (!$request->expectsJson()) {
                return route('deshboard');
            }

        }else{
            //Other auth guard, redirect login page
            if (!$request->expectsJson()) {
                return route('admin.login');
            }
        }

    }
}
