@extends('layouts.master')

@section('content')
	@include('model.user', ['user' => Auth::user()])
	<a href="/user_edit/{{Auth::user()->id}}" class="button special">Edit Profile</a>
@stop
