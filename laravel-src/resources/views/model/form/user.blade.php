
	<div class="form_row">
		<div class="label">Email Address</div> 
		<input type="text" name="email" value="{{ $user->email }}"></input>
	</div>
	
	<div class="form_row">
		<div class="label">First Name</div> 
		<input type="text" name="first_name" value="{{ $user->first_name }}"></input>
	</div>
	
	<div class="form_row">
		<div class="label">Last Name</div> 
		<input type="text" name="last_name" value="{{ $user->last_name }}"></input>
	</div>
	
	@include('model.form.address', ['address' => $user->address])

