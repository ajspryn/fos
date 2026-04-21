<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Jabatan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $jabatan)
    {
        $cekrole=DB::table('roles')->where('user_id', Auth::user()->id)->get()->first();
        // return $cekrole;
        // ddd ($cekrole);
        if($cekrole->jabatan_id==$jabatan){
            return $next($request);
        }
        return redirect('/');
        // return $next($request);
    }
}
