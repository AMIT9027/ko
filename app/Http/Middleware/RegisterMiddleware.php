<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RegisterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $req, Closure $next)
    {
        if($req->Email);
    }
}
