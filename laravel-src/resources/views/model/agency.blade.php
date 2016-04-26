<section class="agency_profile">
	@include('model.field_row', ['name' => 'name', 'description' => 'Agency Name', 'value' => $agency->name])
	@if(isset($user))
		@include('model.field_row', ['name' => 'position', 'description' => 'Position / Title', 'value' => $agency->pivot->position])
	@endif
	@include('model.address', ['address' => $agency->address])
</section>
