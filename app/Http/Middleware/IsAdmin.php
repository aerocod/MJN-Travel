<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    //jadi disini kita buat middleware kita sendiri
    public function handle(Request $request, Closure $next)
    {
        //jadi disini untuk cek apabila ia belum login dan apabila usernya bukan admin maka akan muncul forbidden 403
        if(auth()->guest() || !auth()->user()->is_admin)
        {
            abort(403);
        }
        return $next($request);
    }
}
