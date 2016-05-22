	@include('model.form.textfield', ['name' => 'first_name', 'description' => 'First Name',
		'value' => $user ? $user->first_name : NULL])
	@include('model.form.textfield', ['name' => 'last_name', 'description' => 'Last Name',
		'value' => $user ? $user->last_name : NULL])
	@include('model.form.textfield', ['name' => 'phone', 'description' => 'Phone Number',
		'value' => $user ? $user->phone : NULL])
	@include('model.form.textfield', ['name' => 'email', 'description' => 'Email Address',
		'value' => $user ? $user->email : NULL])
	@include('model.form.address', ['address' =>
		$user ? $user->address : NULL ])