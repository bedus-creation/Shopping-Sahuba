<?php

namespace App\Http\Middleware;

use Closure;

class Role
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
        // public function handle($request, Closure $next, $guard = null)
        
        $role = $guard ? $guard:'guest';

        $roles = explode('|', $role);
        
        $auth = auth()->user();

        if (!in_array($auth->role->name, $roles)) {
            return response('Unauthenticated.', 401);
        }

        return $next($request);
    }
}
