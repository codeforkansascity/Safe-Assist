<?php

namespace App\Http\Controllers\UI;

use App\User;
use App\Consumer;
use App\Address;
use Validator;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ConsumerController extends Controller
{
	
    public function __construct()
    {
    	$this->middleware('auth');
    }
    
    /**
     * update the given consumer's profile info.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request)
    {
        $this->validate($request, ['id' => 'required|exists:consumers']);
        $consumer = Consumer::find($request->id);

        return $this->validateAndSaveConsumer($request, $consumer);
    }
    
    /**
     * create a new consumer with the provided information
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $consumer = new Consumer;
        $consumer->sponsor = Auth::user()->id;
        
        return $this->validateAndSaveConsumer($request, $consumer);
    }

    private function validateAndSaveConsumer(Request $request, Consumer $consumer) {
        $consumer->first_name = $request->first_name;
        $consumer->last_name = $request->last_name;
        $consumer->relationship = $request->relationship;
        $consumer->nickname = $request->nickname;
        $consumer->suffix = $request->suffix;
        $consumer->language = $request->language;
        $consumer->phone = $request->phone;
        $consumer->gender = $request->gender;
        $consumer->dob = $request->dob;
        $consumer->ssn = $request->ssn;
        $consumer->height = $request->height;
        $consumer->weight = $request->weight;
        $consumer->eyes = $request->eyes;
        $consumer->hair = $request->hair;
        $consumer->marks = $request->marks;
        $consumer->physician = $request->physician;
        $consumer->bracelet = $request->bracelet;
        $consumer->contact_instructions = $request->contact_instructions;   
        $request->session()->flash('submitted_consumer', $consumer);
    	    
        $this->validate($request, array_merge([
            'first_name' => 'required|max:45',
            'last_name' => 'required|max:45',
            'relationship' => 'required|in:'.
            	implode(',', array_keys($consumer->relationship_options)),
            'nickname' => 'max:45',
            'suffix' => 'max:45',
            'language' => 'required|in:'.
            	implode(',', array_keys($consumer->language_options)),
            'phone' => 'max:45',
            'gender' => 'in:'.
            	implode(',', array_keys($consumer->gender_options)),
            'dob' => 'required|date',
            '' => 'max:45',
            'height' => 'required|integer',
            'weight' => 'required|integer',
            'eyes' => 'required|in:'.
            	implode(',', array_keys($consumer->eye_color_options)),
            'hair' => 'required|in:'.
            	implode(',', array_keys($consumer->hair_color_options)),
            'marks' => '',
            'physician' => '',
            'bracelet' => 'max:100',
            'contact_instructions' => '',
        ], Address::rules()));
        

        $consumer->address_id = Address::retrieveOrCreate([
        	'street' => $request->street,
    		'city' => $request->city,
    		'state' => $request->state,
    		'zip1' => $request->zip1
    	])->id;
        	
        $consumer->save();
        return Redirect::to('/consumer/dashboard');
    }


    /**
     * search for consumers given various criteria
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postSearch(Request $request) {
        $consumers = Consumer::where('consumers.disabled', '=', 0)  // consumer profile is not hidden (disabled)
        ->join('users', 'consumers.sponsor', '=', 'users.id')
        ->where('users.disabled', '=', 0)
        ->where('description', 'LIKE', "%$request->keyword%") // match query criteria
        ->get();
        Session::put('consumerSearchResults', $consumers);
        return Redirect::to('/consumer/list');
        return Redirect::to('/consumer/list');
    }
    
    
    
    /**
     * delete the given consumer's profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postDelete(Request $request)
    {
        $this->validate($request, ['id' => 'required|exists:consumers']);
        $consumer = Consumer::find($request->id);
        $consumer->delete();
        
        return Redirect::to('/consumer/dashboard');
    }
    
    /**
     * disable the given consumer's profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postDisable(Request $request)
    {
        $this->validate($request, ['id' => 'required|exists:consumers']);
        $consumer = Consumer::find($request->id);
        $consumer->disabled = 1;
        $consumer->save();
        
        return Redirect::to('/consumer/dashboard');
    }
    
    /**
     * enable the given consumer's profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postEnable(Request $request)
    {
        $this->validate($request, ['id' => 'required|exists:consumers']);
        $consumer = Consumer::find($request->id);
        $consumer->disabled = 0;
        $consumer->save();
        
        return Redirect::to('/consumer/dashboard');
    }
}
