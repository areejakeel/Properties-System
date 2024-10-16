<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
      /*  if(Auth::user()->role=='admin'){
            return $next($request);
                }
         return redirect()->back()->with('unauthorised','you are not authorized to access this page');
    }*/
        if (!(Auth::user()->role=='admin')){
            return redirect()->back()->with('unauthorised','you are not authorized to access this page');
        }
        return $next($request);

    }
}
