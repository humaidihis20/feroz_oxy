<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->level != "admin") {
            /*
            silahkan modifikasi pada bagian ini
            apa yang ingin kamu lakukan jika rolenya tidak sesuai
            */
            return redirect()->to('login')->with('error', "kamu gak punya akses");
        }
        return $next($request);
        // if (auth()->user()->level == 1) {
        //     return $next($request);
        // }
        // return redirect('admin');
    }
}
