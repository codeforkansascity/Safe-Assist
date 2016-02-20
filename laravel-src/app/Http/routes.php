<?php

// public info routes
Route::get('/home', function() { return Redirect::to('/'); });
Route::get('/about',  function () { return view('about'); });
Route::get('/contact',  function () { return view('contact'); });
Route::get('/partners',  function () { return view('partners'); });
Route::get('/', ['as' => 'welcome', function () { return view('welcome'); }]);

// UI routes
Route::get('/user/view/{id}', ['middleware' => 'auth', function ($id) { return view('ui.user_profile', ['user' => App\User::find($id)]); }]);
Route::get('/user/view', ['middleware' => 'auth', function () { return view('ui.user_profile', ['user' => Auth::user()]); }]);
Route::get('/user/list', ['middleware' => 'auth', function () { return view('ui.user_list'); }]);
Route::get('/user/edit/{id}', ['middleware' => 'auth', function ($id) { return view('ui.user_profile_edit', ['user' => App\User::find($id)]); }]);
Route::get('/user/logout', 'Auth\AuthController@getLogout');

Route::post('/user/login', 'Auth\AuthController@postLogin');
Route::post('/user/register', 'Auth\AuthController@postRegister');
Route::post('/user/update', 'UI\UserController@postUpdate');
Route::post('/user/delete', 'UI\UserController@postDelete');
Route::post('/user/grant_admin', 'UI\UserController@postGrantAdmin');
Route::post('/user/revoke_admin', 'UI\UserController@postRevokeAdmin');
Route::post('/user/join_agency', 'UI\UserController@postJoinAgency');
Route::post('/user/leave_agency', 'UI\UserController@postLeaveAgency');
Route::post('/user/update_password', 'UI\UpdatePasswordController@postUpdate');
Route::post('/user/search', 'UI\UserController@postSearch');

Route::get('/consumer/dashboard',  ['middleware' => 'auth', function () { return view('ui.caregiver_ui'); }]);
Route::get('/consumer/view/{id}', ['middleware' => 'auth', function ($id) { return view('ui.consumer_profile', ['consumer' => App\Consumer::find($id)]); }]);
Route::get('/consumer/edit/{id}', ['middleware' => 'auth', function ($id) { return view('ui.consumer_profile_edit', ['consumer' => App\Consumer::find($id)]); }]);
Route::get('/consumer/register', ['middleware' => 'auth', function () { return view('ui.consumer_profile_edit', ['consumer' => new App\Consumer ]); }]);
Route::get('/consumer/list', ['middleware' => 'auth', function () { return view('ui.consumer_list'); }]);

Route::post('/consumer/search', 'UI\ConsumerController@postSearch');
Route::post('/consumer/update', 'UI\ConsumerController@postUpdate');
Route::post('/consumer/register', 'UI\ConsumerController@postRegister');

Route::get('/admin',  ['middleware' => 'auth', function () { return view('ui.administrator_ui'); }]);

Route::get('/agent',  ['middleware' => 'auth', function () { return view('ui.agent_ui'); }]);

Route::get('/agency/view/{id}', ['middleware' => 'auth', function ($id) { return view('ui.agency_profile', ['user' => App\Agency::find($id)]); }]);
Route::get('/agency/edit/{id}', ['middleware' => 'auth', function ($id) { return view('ui.agency_profile_edit', ['user' => App\Agency::find($id)]); }]);
Route::get('/agency/list', ['middleware' => 'auth', function () { return view('ui.agency_list'); }]);
Route::post('/agency/search', 'UI\AgencyController@postSearch');
Route::post('/agency/update', 'UI\AgencyController@postUpdate');
Route::post('/agency/register', 'UI\AgencyController@postRegister');