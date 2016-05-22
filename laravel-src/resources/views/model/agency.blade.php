<section class="agency_profile">
	@include('model.field_row', ['name' => 'name', 'description' => 'Agency Name',
	    'value' => $agency ? $agency->name : NULL])
	@if(isset($user))
		@include('model.field_row', ['name' => 'position', 'description' => 'Position / Title',
			'value' => $agency ? $agency->pivot->position : NULL])
	@endif
	@include('model.address', ['address' => $agency ? $agency->address : NULL])
</section>
