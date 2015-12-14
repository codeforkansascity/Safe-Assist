<?php

namespace App\Http\Controllers\UI;

use App\User;
use App\Address;
use Validator;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );

        
        $user->password = bcrypt($password);

        $user->save();

        Auth::login($user);

    }

}
