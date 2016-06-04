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

        return Validator::make($data, array_merge([
            'first_name' => 'required:max:45',
            'last_name' => 'required:max:45',
            'phone' => 'required:max:45',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ], Address::rules()));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
    	    
    	$address = Address::retrieveOrCreate([
    		'street' => $data['street'],
    		'city' => $data['city'],
    		'state' => $data['state'],
    		'zip1' => $data['zip1']
    	]);
    	
        return User::create([
            'address_id' => $address->id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
