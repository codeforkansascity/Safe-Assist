@extends('layouts.master')

@section('content')
	@include('model.user', ['user' => $user])
	@if (Auth::user()->administrator || Auth::user()->id == $user->id)
	<a href="/user_edit/{{$user->id}}" class="button special">Edit Profile</a>
	@endif
	
	@if (Auth::user()->administrator)
	<form action="/profile/delete_user" method="POST">
	  {!! csrf_field() !!}
	  <input type="hidden" name="id" value="{{$user->id}}"/>
	  <input type="submit" value="Delete Profile" class="button special">
	</form>
	@endif
@stop
