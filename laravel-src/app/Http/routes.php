<?php

// public info routes
Route::get('/home', function() { return Redirect::to('/'); });
Route::get('/about',  function () { return view('about'); });
Route::get('/contact',  function () { return view('contact'); });
Route::get('/partners',  function () { return view('partners'); });
Route::get('/', ['as' => 'welcome', function () { return view('welcome'); }]);

// UI routes
Route::get('/profile', ['middleware' => 'auth', function () { return view('ui.user_profile'); }]);
Route::get('/profile_edit', ['middleware' => 'auth', function () { return view('ui.user_profile_edit'); }]);
Route::get('/admin',  ['middleware' => 'auth', function () { return view('ui.administrator_ui'); }]);
Route::get('/caregiver',  ['middleware' => 'auth', function () { return view('ui.caregiver_ui'); }]);
Route::get('/agent',  ['middleware' => 'auth', function () { return view('ui.agent_ui'); }]);
Route::post('/profile/grant_admin', 'UI\UserController@postGrantAdmin');
Route::post('/profile/revoke_admin', 'UI\UserController@postRevokeAdmin');
Route::post('/profile/update_profile', 'UI\UserController@postUpdate');
Route::post('/profile/update_password', 'UI\UpdatePasswordController@postUpdate');

// registration routes
Route::post('/auth/register', 'Auth\AuthController@postRegister');

// authentication routes
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');
