<?php

namespace App\Http\Controllers\UI;

use App\Impairment;
use App\User;
use App\Consumer;
use App\Contact;
use App\Address;
use App\School;
use App\Employer;
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
            	implode(',', array_keys(Consumer::$relationship_options)),
            'nickname' => 'max:45',
            'suffix' => 'max:45',
            'language' => 'required|in:'.
            	implode(',', array_keys(Consumer::$language_options)),
            'phone' => 'max:45',
            'gender' => 'in:'.
            	implode(',', array_keys(Consumer::$gender_options)),
            'dob' => 'required|date',
            '' => 'max:45',
            'height' => 'required|integer',
            'weight' => 'required|integer',
            'eyes' => 'required|in:'.
            	implode(',', array_keys(Consumer::$eye_color_options)),
            'hair' => 'required|in:'.
            	implode(',', array_keys(Consumer::$hair_color_options)),
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
        $consumer->impairments()->sync($request->has('impairments') ? $request->impairments : array());
        $consumer->devices()->sync($request->has('devices') ? $request->devices : array());
        $consumer->conditions()->sync($request->has('conditions') ? $request->conditions : array());
        //$consumer->medications()->sync($request->has('medications') ? $request->medications : array());
        return Redirect::to('/consumer/dashboard');
    }

    /**
     * add a new contact to a consumer
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAddContact(Request $request)
    {
        $contact = new Contact;
        return $this->validateAndSaveContact($request, $contact);
    }

    /**
     * edit an existing contact
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postEditContact(Request $request)
    {
        $this->validate($request, ['contact_id' => 'required|exists:contacts,id']);
        $contact = Contact::find($request->contact_id);
        return $this->validateAndSaveContact($request, $contact);
    }

    private function validateAndSaveContact(Request $request, Contact $contact) {
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->phone = $request->phone;
        $contact->consumer_id = $request->consumer_id;

        $this->validate($request, array_merge([
            'consumer_id' => 'required|exists:consumers,id',
            'first_name' => 'required|max:45',
            'last_name' => 'required|max:45',
            'phone' => 'max:45',
        ], Address::rules()));

        $contact->address_id = Address::retrieveOrCreate([
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'zip1' => $request->zip1
        ])->id;
        $contact->save();
        return Redirect::to('/consumer/view/'.$contact->consumer->id);
    }

    public function postAddSchool(Request $request)
    {
        $school = new School;
        $this->validateAndSaveSchool($request, $school);
        if($request->has('consumer_id')) {
            $this->validate($request, array_merge([
                'consumer_id' => 'required|exists:consumers,id']));
            $consumer = Consumer::find($request->consumer_id);
            $consumer->school_id = $school->id;
            $consumer->school_contact = $request->contact;
            $consumer->save();
            return Redirect::to('/consumer/view/'.$consumer->id);
        }
        return Redirect::to('/'); // TODO: this is currently only used with consumers, so this redirect is a placeholder
    }

    public function postEditSchool(Request $request)
    {
        $this->validate($request, array_merge([
            'id' => 'required|exists:schools']));
        $school = School::find($request->id);
        $this->validateAndSaveSchool($request, $school);
        if($request->has('consumer_id')) {
            $this->validate($request, array_merge([
                'consumer_id' => 'required|exists:consumers,id']));
            $consumer = Consumer::find($request->consumer_id);
            $consumer->school_id = $school->id;
            $consumer->school_contact = $request->contact;
            $consumer->save();
            return Redirect::to('/consumer/view/'.$consumer->id);
        }
        return Redirect::to('/'); // TODO: this is currently only used with consumers, so this redirect is a placeholder
    }

    public function postReleaseSchool(Request $request)
    {
        $this->validate($request, array_merge([
            'id' => 'required|exists:consumers']));
        $consumer = Consumer::find($request->id);
        $consumer->school_id = NULL;
        $consumer->school_contact = NULL;
        $consumer->save();
        return Redirect::to('/consumer/view/'.$consumer->id);
    }

    private function validateAndSaveSchool(Request $request, School $school) {
        $this->validate($request, array_merge([
            'name' => 'required|max:45',
            'phone' => 'max:45',
        ], Address::rules()));
        $school->name = $request->name;
        $school->phone = $request->phone;
        $school->address_id = Address::retrieveOrCreate([
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'zip1' => $request->zip1
        ])->id;
        $school->save();
    }

    private function validateAndSaveEmployer(Request $request, Employer $employer) {
        $employer->name = $request->first_name;
        $employer->phone = $request->phone;

        $this->validate($request, array_merge([
            'name' => 'required|max:45',
            'phone' => 'max:45',
        ], Address::rules()));

        $employer->address_id = Address::retrieveOrCreate([
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'zip1' => $request->zip1
        ])->id;
        $employer->save();
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
     * delete the given contact from a consumer profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postDeleteContact(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:contacts',
            'consumer_id' => 'required|exists:consumers,id'
        ]);
        $contact = Contact::find($request->id);
        $consumer_id = $contact->consumer->id;
        if($consumer_id != $request->consumer_id) abort(403, 'illegal post data');

        $contact->delete();

        return Redirect::to('/consumer/view/'.$consumer_id);
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
        foreach($consumer->contacts as $contact)
            $contact->delete();
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
