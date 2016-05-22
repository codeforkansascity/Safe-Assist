<?php

// public info routes
Route::get('/home', function() { return Redirect::to('/'); });
Route::get('/about',  function () { return view('about'); });
Route::get('/contact',  function () { return view('contact'); });
Route::get('/partners',  function () { return view('partners'); });
Route::get('/', ['as' => 'welcome', function () { return view('welcome'); }]);

// gated routes
Route::get('/user/view/{id}', ['middleware' => 'auth', 
	function ($id) { return view('ui.user_profile', ['user' => App\User::find($id)]); }]);
Route::get('/user/view', ['middleware' => 'auth', 
	function () { return view('ui.user_profile', ['user' => Auth::user()]); }]);
Route::get('/user/list', ['middleware' => ['auth', 'role:administrator'], 
	function () { return view('ui.user_search_list'); }]);
Route::get('/user/edit/{id}', ['middleware' => 'auth', 
	function ($id) { return view('ui.user_profile_edit', ['user' => App\User::find($id)]); }]);
Route::get('/user/logout', 'Auth\AuthController@getLogout');

Route::post('/user/login', 'Auth\AuthController@postLogin');
Route::post('/user/register', 'Auth\AuthController@postRegister');
Route::post('/user/update', 'UI\UserController@postUpdate');
Route::post('/user/delete', ['middleware' => ['auth', 'role:administrator'],
	                     'uses' => 'UI\UserController@postDelete']);
Route::post('/user/grant_admin', ['middleware' => ['auth', 'role:administrator'],
	                     'uses' => 'UI\UserController@postGrantAdmin']);
Route::post('/user/revoke_admin', ['middleware' => ['auth', 'role:administrator'],
	                     'uses' => 'UI\UserController@postRevokeAdmin']);
Route::post('/user/update_password', 'UI\UpdatePasswordController@postUpdate');
Route::post('/user/search', ['middleware' => ['auth', 'role:administrator'],
	                     'uses' => 'UI\UserController@postSearch']);
Route::post('/user/disable', ['middleware' => ['auth'],
	                     'uses' => 'UI\UserController@postDisable']);
Route::post('/user/enable', ['middleware' => ['auth'],
	                     'uses' => 'UI\UserController@postEnable']);

Route::get('/consumer/dashboard',  ['middleware' => ['auth', 'consumerAccess:create'], 
	function () { return view('ui.caregiver_ui'); }]);
Route::get('/consumer/view/{id}', ['middleware' => ['auth', 'consumerAccess:view'],
	function ($id) { return view('ui.consumer_profile', ['consumer' => App\Consumer::find($id)]); }]);
Route::get('/consumer/edit/{id}', ['middleware' => ['auth', 'consumerAccess:edit'],
	function ($id) { return view('ui.consumer_profile_edit', ['consumer' => App\Consumer::find($id)]); }]);
Route::get('/consumer/register', ['middleware' => ['auth', 'consumerAccess:create'],
	function () { return view('ui.consumer_profile_edit', ['consumer' => 
		Session::has('submitted_consumer') ? Session::get('submitted_consumer') : new App\Consumer ]); }]);
Route::get('/consumer/list', ['middleware' => 'auth', 
	function () { return view('ui.consumer_search_list'); }]);
Route::get('/contact/add/{consumer_id}', ['middleware' => ['auth', 'consumerAccess:edit'],
	function ($consumer_id) { return view('ui.contact_profile_edit',
			['contact' => NULL, 'consumer_id' => $consumer_id]); }]);
Route::get('/contact/edit/{contact_id}/{consumer_id}', ['middleware' => ['auth', 'consumerAccess:edit'],
	function ($contact_id, $consumer_id) { return view('ui.contact_profile_edit',
			['contact' => App\Contact::find($contact_id), 'consumer_id' => $consumer_id]); }]);

Route::post('/consumer/search', ['middleware' => ['auth', 'role:agent'], 
	                         'uses' => 'UI\ConsumerController@postSearch']);
Route::post('/consumer/update', ['middleware' => ['auth', 'consumerAccess:edit'],
	                         'uses' => 'UI\ConsumerController@postUpdate']);
Route::post('/consumer/register', ['middleware' => ['auth', 'consumerAccess:create'],
	                           'uses' => 'UI\ConsumerController@postRegister']);
Route::post('/consumer/delete', ['middleware' => ['auth', 'consumerAccess:delete'],
	                     'uses' => 'UI\ConsumerController@postDelete']);
Route::post('/consumer/disable', ['middleware' => ['auth', 'consumerAccess:delete'],
	                     'uses' => 'UI\ConsumerController@postDisable']);
Route::post('/consumer/enable', ['middleware' => ['auth', 'consumerAccess:delete'],
	                     'uses' => 'UI\ConsumerController@postEnable']);
Route::post('/contact/add', ['middleware' => ['auth', 'consumerAccess:edit'],
	'uses' => 'UI\ConsumerController@postAddContact']);
Route::post('/contact/update', ['middleware' => ['auth', 'consumerAccess:edit'],
	'uses' => 'UI\ConsumerController@postEditContact']);
Route::post('/contact/delete', ['middleware' => ['auth', 'consumerAccess:edit'],
	'uses' => 'UI\ConsumerController@postDeleteContact']);

Route::get('/admin',  ['middleware' => ['auth', 'role:administrator'],
	function () { return view('ui.administrator_ui'); }]);

Route::get('/agent',  ['middleware' => ['auth', 'role:agent'], 
	function () { return view('ui.agent_ui'); }]);

Route::get('/agency/view/{id}', ['middleware' => 'auth', 
	function ($id) { return view('ui.agency_profile', ['agency' => App\Agency::find($id)]); }]);
Route::get('/agency/edit/{id}', ['middleware' => ['auth', 'role:administrator'], 
	function ($id) { return view('ui.agency_profile_edit', ['agency' => App\Agency::find($id)]); }]);
Route::get('/agency/list', ['middleware' => ['auth', 'role:administrator'],
	function () { return view('ui.agency_search_list'); }]);
Route::get('/agency/register', ['middleware' => ['auth', 'role:administrator'], 
	function () { return view('ui.agency_profile_edit', ['agency' => new App\Agency ]); }]);
Route::post('/agency/search', ['middleware' => ['auth', 'role:administrator'],
	                           'uses' => 'UI\AgencyController@postSearch']);
Route::post('/agency/update', ['middleware' => ['auth', 'role:administrator'],
	                           'uses' => 'UI\AgencyController@postUpdate']);
Route::post('/agency/join', ['middleware' => ['auth', 'role:administrator'],
	                           'uses' => 'UI\AgencyController@postJoin']);
Route::post('/agency/leave', ['middleware' => ['auth', 'role:administrator'],
	                           'uses' => 'UI\AgencyController@postLeave']);
Route::post('/agency/register', ['middleware' => ['auth', 'role:administrator'],
	                           'uses' => 'UI\AgencyController@postRegister']);
