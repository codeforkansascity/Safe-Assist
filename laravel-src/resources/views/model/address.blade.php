<div class="address">
	@include('model.field_row', ['name' => 'street', 'description' => 'Street Address', 'value' => $address->street])
	@include('model.field_row', ['name' => 'city', 'description' => 'City', 'value' => $address->city])
	@include('model.field_row', ['name' => 'state', 'description' => 'State', 'value' => $address->state])
	@include('model.field_row', ['name' => 'zip1', 'description' => 'Zip Code', 'value' => $address->zip1])
	@include('model.field_row', ['name' => 'zip2', 'description' => 'Zip +4', 'value' => $address->zip2])
</div>
