	@include('model.form.textfield', ['name' => 'first_name', 'description' => 'First Name', 'value' => $user->first_name])
	@include('model.form.textfield', ['name' => 'last_name', 'description' => 'Last Name', 'value' => $user->last_name])
	@include('model.form.textfield', ['name' => 'email', 'description' => 'Email Address', 'value' => $user->email])
	@include('model.form.address', ['address' => $user->address])
