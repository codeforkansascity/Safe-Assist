<?php

namespace App\Http\Controllers\UI;

use App\User;
use App\Address;
use Validator;
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
        	return Redirect::to('/profile');
        }

    }

}
