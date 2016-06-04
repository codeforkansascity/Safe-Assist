<div class="address">
	@include('model.field_row', ['name' => 'street', 'description' => 'Street Address',
		'value' => $address ? $address->street : NULL])
	@include('model.field_row', ['name' => 'city', 'description' => 'City',
		'value' => $address ? $address->city : NULL])
	@include('model.field_row', ['name' => 'state', 'description' => 'State',
	    'value' => $address ? $address->state : NULL])
	@include('model.field_row', ['name' => 'zip1', 'description' => 'Zip Code',
	    'value' => $address ? $address->zip1 : NULL])
	@include('model.field_row', ['name' => 'zip2', 'description' => 'Zip +4',
	    'value' => $address ? $address->zip2 : NULL])
</div>