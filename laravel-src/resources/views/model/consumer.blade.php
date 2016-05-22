<section class="consumer_profile {{$consumer->disabled ? 'disabled_consumer_profile' : ''}}">
	@include('model.field_row', ['name' => 'relationship', 'description' => 'Relationship to Caretaker', 
		'value' => $consumer->relationship_options[$consumer->relationship]])
	@include('model.field_row', ['name' => 'first_name', 'description' => 'First Name', 'value' => $consumer->first_name])
	@include('model.field_row', ['name' => 'last_name', 'description' => 'Last Name', 'value' => $consumer->last_name])
	@include('model.field_row', ['name' => 'nickname', 'description' => 'Nick Name', 'value' => $consumer->nickname])
	@include('model.field_row', ['name' => 'suffix', 'description' => 'Jr/Sr', 'value' => $consumer->suffix])
	@include('model.field_row', ['name' => 'language', 'description' => 'Primary Language', 'value' => 
		$consumer->language_options[$consumer->language]])
	@include('model.address', ['address' => $consumer->address])
	@include('model.field_row', ['name' => 'phone', 'description' => 'Phone Number', 'value' => $consumer->phone])
	@include('model.field_row', ['name' => 'gender', 'description' => 'Gender', 'value' => 
		$consumer->gender_options[$consumer->gender]])
	@include('model.field_row', ['name' => 'birthdate', 'description' => 'Date of Birth', 'value' => $consumer->dob])
	@include('model.field_row', ['name' => 'ssn', 'description' => 'Social Security Number', 'value' => $consumer->ssn])
	@include('model.field_row', ['name' => 'height', 'description' => 'Height (in inches)', 'value' => $consumer->height])
	@include('model.field_row', ['name' => 'weight', 'description' => 'Weight (in pounds)', 'value' => $consumer->weight])
	@include('model.field_row', ['name' => 'eyes', 'description' => 'Eye Color', 'value' => 
		$consumer->eye_color_options[$consumer->eyes]])
	@include('model.field_row', ['name' => 'hair', 'description' => 'Hair Color', 'value' => 
		$consumer->hair_color_options[$consumer->hair]])
	@include('model.field_row', ['name' => 'marks', 'description' => 'Scars / Marks / Tattoos', 'rows' => 4, 'cols' => 50, 'value' => $consumer->marks])
	@include('model.field_row', ['name' => 'physician', 'description' => 'Primary Physician', 'rows' => 4, 'cols' => 50, 'value' => $consumer->physician])
	@include('model.field_row', ['name' => 'contact_instructions', 'description' => 'Contact Instructions', 'value' => $consumer->contact_instructions])
	@include('model.field_row', ['name' => 'bracelet', 'description' => 'Medical ID Bracelet', 'value' => $consumer->bracelet])
</section>
