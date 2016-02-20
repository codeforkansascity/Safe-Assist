@extends('layouts.master')

@section('content')
	@include('model.user', ['user' => $user])
	@if (Auth::user()->administrator || Auth::user()->id == $user->id)
	<a href="/user/edit/{{$user->id}}" class="button special">Edit Profile</a>
	@endif
	
	@if (Auth::user()->administrator)
	<form action="/user/delete" method="POST">
	  {!! csrf_field() !!}
	  <input type="hidden" name="id" value="{{$user->id}}"/>
	  <input type="submit" value="Delete Profile" class="button special">
	</form>
	@endif
@stop
