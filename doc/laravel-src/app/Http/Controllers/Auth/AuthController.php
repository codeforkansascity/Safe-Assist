<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Address;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    protected $redirectTo = '/';
    protected $loginPath = '/';
    
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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:user',
            'password' => 'required|confirmed|min:6',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip1' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
    	    
    	$address = Address::create([
    		'street' => $data['street'],
    		'city' => $data['city'],
    		'state' => $data['state'],
    		'zip1' => $data['zip1']
    	]);
    	
        return User::create([
            'address_id' => $address->id,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
