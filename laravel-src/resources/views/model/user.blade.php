<section class="user_profile">
	<div class="first_name">{{$user->first_name}}</div>
	<div class="last_name">{{$user->last_name}}</div>
	<div class="email">{{$user->email}}</div>
	@include('model.address', ['address' => $user->address])
	
	@if ($user->administrator)
		<div class="admin-profile">
			<p>This user has been granted administrator access to this site.</p>
		</div>
	@endif
	
	@if ($user->agent)
		<div class="agencies">
			<p>This user is registered as a first responder for the following agencies:</p>
			@foreach ($user->agencies as $agency)
				@include('ui.includes.agency')
			@endforeach
		</div>
	@endif
</section>	
