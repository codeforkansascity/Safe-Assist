<div class="address">
	@include('model.form.textfield', ['name' => 'street', 'description' => 'Street Address', 'value' => $address ? $address->street : NULL])
	@include('model.form.textfield', ['name' => 'city', 'description' => 'City', 'value' => $address ? $address->city : NULL])
	@include('model.form.dropdown', ['name' => 'state', 'description' => 'State', 'value' => $address ? $address->state : NULL,
		'options' => Address::$state_options
	])
	@include('model.form.textfield', ['name' => 'zip1', 'description' => 'Zip Code', 'value' => $address ? $address->zip1 : NULL])
	@include('model.form.textfield', ['name' => 'zip2', 'description' => 'Zip +4', 'value' => $address ? $address->zip2 : NULL])
</div>