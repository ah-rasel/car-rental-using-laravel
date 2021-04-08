<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @param string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next,string $role)
    {
        if ($role == 'admin' && auth()->user()->role_id != 1 || $role == 'SuperAdmin' && auth()->user()->role_id != 0) {
           return redirect()->route('/');
        }

        return $next($request);
    }
}
