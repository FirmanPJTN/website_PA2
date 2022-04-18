<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
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
        
        $roles=["administrator", "visitor", "approver", "transactor"];

        if (Auth::user()->in_array($roles)) { 
	        return $next($request);
        } else {
            abort(403, "Cannot access to restricted page");
        }

        
        return redirect('/');

    }
}
