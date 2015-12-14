<section class="user_profile">
	<div class="first_name">{{$user->first_name}}</div>
	<div class="last_name">{{$user->last_name}}</div>
	<div class="last_name">{{$user->last_name}}</div>
	<div class="email">{{$user->email}}</div>
	
	<form action="/user/change_password" method="POST">
	</form>
	
	<form action="/user/update_profile" method="POST">
	@include('model.form.address', ['address' => $user->address])
	</form>
	
	{{-- todo: allow admins to grant/revoke admin status to other users --}}
	
	@if ($user->agent)
		<div class="agencies">
			<p>This user is registered as a first responder for the following agencies:</p>
			@foreach ($user->agencies as $agency)
				<form action="/user/revoke_admin" method="POST">
				@include('model.forms.agency')
				</form>
			@endforeach
			
		</div>
	@endif
	
	<form action="/user/grant_admin">
	{{-- todo: add agency form --}}
	</form>
</section>	
