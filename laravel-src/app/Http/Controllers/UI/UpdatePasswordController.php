<?php

namespace App\Http\Controllers\UI;

use App\User;
use App\Address;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;



class UpdatePasswordController extends Controller
{
	
    public function __construct()
    {
    	$this->middleware('auth');
    }
    
    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:users',
            'password' => 'required|confirmed',
        ]);
        
        if(Auth::user()->id != $request->id && !Auth::user()->administrator) {
        	//todo: access denied
        } else {
        	$user = User::find($request->id);
        	$user->password = bcrypt($request->password);
        	$user->save();
        	return Redirect::to('/profile');
        }

    }
}
