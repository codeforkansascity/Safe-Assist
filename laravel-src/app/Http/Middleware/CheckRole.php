<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        switch($role) {
        	case 'administrator':
        		if(Auth::user()->administrator) 
        			return $next($request);
        		break;
        	case 'agent':
        		if(Auth::user()->is_agent())
        			return $next($request);
        		break;
        }
        
        return response('Unauthorized.', 401);
    }
}
