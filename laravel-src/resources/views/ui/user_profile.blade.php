@extends('layouts.master')

@section('content')
	@include('model.user', ['user' => Auth::user()])
	<a href="/profile_edit" class="button special">Edit Profile</a>
@stop
