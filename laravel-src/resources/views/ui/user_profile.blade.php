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


	@if(Auth::user()->administrator and App\Agency::all()->diff($user->agencies)->count()))
		<h2>Add User to Agency</h2>
		<div class="add_agency">
			<form action="/agency/join" method="POST">
				{!! csrf_field() !!}
				<select name="id">
					@foreach(App\Agency::all()->diff($user->agencies) as $agency)
						<option value="{{$agency->id}}">{{$agency->name}}</option>
					@endforeach
				</select>
				<input type="hidden" name="user_id" value="{{$user->id}}"/>
				<input type="submit" name="join" value="join"/>
			</form>
		</div>
	@endif

	@if(Auth::user()->administrator and $user->agencies->count())
		<h2>Remove User from Agency</h2>
		<div class="remove_agency">
			<form action="/agency/leave" method="POST">
				{!! csrf_field() !!}
				<select name="id">
					@foreach($user->agencies as $agency)
						<option value="{{$agency->id}}">{{$agency->name}}</option>
					@endforeach
				</select>
				<input type="hidden" name="user_id" value="{{$user->id}}"/>
				<input type="submit" name="leave" value="leave"/>
			</form>
		</div>
	@endif
@stop
