<?php

namespace App\Http\Controllers\UI;

use App\Agency;
use App\Address;
use App\User;
use Validator;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AgencyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * update the given agency's profile info.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request)
    {
        $this->validate($request, ['id' => 'required|exists:agencies']);
        $agency = Agency::find($request->id);

        return $this->validateAndSaveAgency($request, $agency);
    }

    /**
     * create a new agency with the provided information
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $agency = new Agency;

        return $this->validateAndSaveAgency($request, $agency);
    }

    private function validateAndSaveAgency(Request $request, Agency $agency) {
        $this->validate($request, array_merge([
            'name' => 'required',
        ], Address::rules()));

        $agency->name = $request->name;

        $agency->address_id = Address::retrieveOrCreate([
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'zip1' => $request->zip1
        ])->id;

        $agency->save();
        return Redirect::to('/agency/view/'.$agency->id);
    }

    public function postSearch(Request $request) {
        $this->validate($request,[
            'id' => 'exists:agencies'
        ]);

        if($request->id) { //search for user with given id...
            $agencies = Agency::where('id', '=', $request->id)->get();
        } else { // search matching any field
            $agencies = Agency::where('name', 'LIKE', "%$request->search%")->get();
        }

        Session::put('agencySearchResults', $agencies);
        if($agencies->count() == 1) { // go directly to that user's profile if only 1
            return Redirect::to('/agency/view/'.$agencies->first()->id);
        } else { // 0 users found or > 1 users found
            return Redirect::to('/agency/list');
        }
    }

    public function postJoin(Request $request) {
        $this->validate($request,[
            'id' => 'exists:agencies',
            'user_id' => 'exists:users,id'
        ]);

        $agency = Agency::find($request->id);
        $agency->users()->attach($request->user_id);
        Redirect::to('/user/view/'.$request->user_id);
    }

    public function postLeave(Request $request) {
        $this->validate($request,[
            'id' => 'exists:agencies',
            'user_id' => 'exists:users,id'
        ]);

        $agency = Agency::find($request->id);
        $agency->users()->detach($request->user_id);
        Redirect::to('/user/view/'.$request->user_id);
    }

}
