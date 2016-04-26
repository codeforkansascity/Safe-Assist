<section class="user_profile {{$user->disabled ? 'disabled_user_profile' : ''}}">
	@include('model.field_row', ['name' => 'first_name', 'description' => 'First Name', 'value' => $user->first_name])
	@include('model.field_row', ['name' => 'last_name', 'description' => 'Last Name', 'value' => $user->last_name])
	@include('model.field_row', ['name' => 'email', 'description' => 'Email Address', 'value' => $user->email])
	@include('model.address', ['address' => $user->address])
	
	@if ($user->administrator)
		<div class="admin-profile">
			<p>This user has been granted administrator access to this site.</p>
		</div>
	@endif
	
	@if ($user->agencies)
		<div class="agencies">
			<p>This user is registered as a first responder for the following agencies:</p>
			@foreach ($user->agencies as $agency)
				@include('model.agency')
			@endforeach
		</div>
	@endif
</section>
