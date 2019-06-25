<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles
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
        
            if (!$request->user()hasAnyRoles($rolesArray)){
                return redirect()->('home')->(with;(['permission'=>Action nonautoriseé"]);
            }
    
            return $next($request);
        
    }
        return $next($request);
    }
}
