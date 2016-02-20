<?php

namespace App\Http\Controllers\UI;

use App\User;
use App\Address;
use Validator;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
	
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /**
     * search for users given various criteria
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postSearch(Request $request) {
        $this->validate($request,[
            'id' => 'exists:users'
        ]);

        if($request->id) { //search for user with given id...
            $users = User::where('id', '=', $request->id)->get();
        } else { // search matching any field
            $users = User::where('email', 'LIKE', "%$request->search%")
                ->orWhere('first_name', 'LIKE', "%$request->search%")
                ->orWhere('last_name', 'LIKE', "%$request->search%")->get();
        }

        Session::put('userSearchResults', $users);
        if($users->count() == 1) { // go directly to that user's profile if only 1
            return Redirect::to('/user/view/'.$users->first()->id);
        } else { // 0 users found or > 1 users found
            return Redirect::to('/user/list');
        }
    }
    
    /**
     * update the given user's profile info.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request)
    {
        $this->validate($request, ['id' => 'required|exists:users']);
        $user = User::find($request->id);
        $user->email = $request->email;
        
        $this->validate($request, array_merge([
            'id' => 'required|exists:users',
            'email' => 'email|max:255'.($user->isDirty('email')?'|unique:users,email':''),
        ], Address::rules()));
        
        if(Auth::user()->id != $request->id && !Auth::user()->administrator) {
        	//todo: access denied (handle w/ middleware instead of controller?)
        } else {
        	$user->first_name = $request->first_name;
        	$user->last_name = $request->last_name;

        	$user->address_id = Address::retrieveOrCreate([
        		'street' => $request->street,
    			'city' => $request->city,
    			'state' => $request->state,
    			'zip1' => $request->zip1
    		])->id;
        	
        	$user->save();
        	return Redirect::to('/user/view/'.$request->id);
        }

    }

    
    /**
     * delete the given user's profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postDelete(Request $request)
    {
    	
        $this->validate($request, ['id' => 'required|exists:users']);
        $user = User::find($request->id);
        foreach($user->consumers as $consumer) {
        	// TODO: re-assign these to someone instead of deleting?
        	$consumer->delete();
        }
        $user->delete();
        
        if($user->id == Auth::user()->id) { // they're deleting themselves
        	Auth::logout();
            return Redirect::to('/');
        }
        
        return Redirect::to('/admin');
    }

}
