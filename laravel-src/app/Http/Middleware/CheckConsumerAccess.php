<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class CheckConsumerAccess
{
    /**
     * Determine if the user has access to view this consumer's profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cid = $request->segments()[count($request->segments())-1]; // get ID at the end of the request URI

        if ((Auth::user()->is_agent() and Session::get('consumerSearchResults')->contains('id', $cid))
                // if the user is an agent and this consumer was in their last search result
            or Auth::user()->consumers->contains('id', $cid)
                // or the user is the caretaker for this consumer
        ) { // ...then they can view the consumer profile
            return $next($request);
        }

        abort('401', 'No privileges to view consumer');
    }

}