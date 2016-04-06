<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class CheckConsumerAccess
{	
    private function is_caretaker_viewing_own_consumer($cid) {
    	    return Auth::user()->consumers->contains('id', $cid);
    }
    
    private function is_agent_viewing_searched_consumer($cid) {
    	    $consumer = Consumer::find($cid);
    	    return Auth::user()->is_agent() and 
    	    	!$cid->disabled and
    	    	Session::get('consumerSearchResults') != null and
    		Session::get('consumerSearchResults')->contains('id', $cid);
    }

    private function find_consumer_id($request) {	    
    	if($request->method() == 'get')  
    		return $request->segments()[count($request->segments())-1]; // get ID at the end of the request URI
    	else 
    		return $request->id;
    }
	
    /**
     * Determine if the user has access to view this consumer's profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $action)
    {	
    	switch($action) {
    		case 'view':
    			$cid = $this->find_consumer_id($request);
    			if($this->is_agent_viewing_searched_consumer($cid) or 
    				$this->is_caretaker_viewing_own_consumer($cid))
    				return $next($request);
    			break;
    		case 'edit':
    			$cid = $this->find_consumer_id($request);
    			if($this->is_caretaker_viewing_own_consumer($cid))
    				return $next($request);
    			break;
    		case 'create':
    			if(!Auth::user()->is_agent())  // done let agents create consumer profiles
    				return $next($request);
    			break;
    		case 'delete':
    			$cid = $this->find_consumer_id($request);
    			if($this->is_caretaker_viewing_own_consumer($cid))
    				return $next($request);
    			break;
    	}

        abort('401', 'No privileges to '. ($action ? 'edit ' : 'view') . ' consumer');
    }
}