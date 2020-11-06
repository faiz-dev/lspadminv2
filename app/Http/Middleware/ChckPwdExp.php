<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ChckPwdExp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->isPasswordValid()) {
            // dd(Auth::user()->isPasswordValid());
            if(!$request->is("member/pengaturan/profil/password-reset")) {
                // dd($request->is("member/pengaturan/profil/password-reset"));
                return redirect(route('asesi.pengaturan.profil.show-password-reset'));
            }
            return $next($request);
        }
        return $next($request);
    }
}
