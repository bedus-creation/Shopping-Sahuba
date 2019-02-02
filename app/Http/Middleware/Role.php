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
    public function handle($request, Closure $next, $guard = null)
    {
        $role = $guard ? $guard:'guest';

        $roles = explode('|', $role);
        
        $auth = auth()->user();

        if ($auth->hasRole($roles)) {
            return $next($request);
        }
        
        return response('Unauthenticated.', 401);
    }
}
