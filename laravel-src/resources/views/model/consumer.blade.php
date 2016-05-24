<section class="consumer_profile {{$consumer->disabled ? 'disabled_consumer_profile' : ''}}">
	@include('model.field_row', ['name' => 'relationship', 'description' => 'Relationship to Caretaker',
		'value' => $consumer ? $consumer->relationship_options[$consumer->relationship] : NULL])
	@include('model.field_row', ['name' => 'first_name', 'description' => 'First Name',
		'value' => $consumer ? $consumer->first_name : NULL])
	@include('model.field_row', ['name' => 'last_name', 'description' => 'Last Name',
	    'value' => $consumer ? $consumer->last_name : NULL])
	@include('model.field_row', ['name' => 'nickname', 'description' => 'Nick Name',
	    'value' => $consumer ? $consumer->nickname : NULL])
	@include('model.field_row', ['name' => 'suffix', 'description' => 'Jr/Sr',
	    'value' => $consumer ? $consumer->suffix : NULL])
	@include('model.field_row', ['name' => 'language', 'description' => 'Primary Language',
	    'value' => $consumer->language_options[$consumer->language]])
	@include('model.address', ['address' => $consumer ? $consumer->address : NULL])
	@include('model.field_row', ['name' => 'phone', 'description' => 'Phone Number',
	    'value' => $consumer ? $consumer->phone : NULL])
	@include('model.field_row', ['name' => 'gender', 'description' => 'Gender',
	    'value' => $consumer ? $consumer->gender_options[$consumer->gender] : NULL])
	@include('model.field_row', ['name' => 'birthdate', 'description' => 'Date of Birth',
	    'value' => $consumer ? $consumer->dob : NULL])
	@include('model.field_row', ['name' => 'ssn', 'description' => 'Social Security Number',
	    'value' => $consumer ? $consumer->ssn : NULL])
	@include('model.field_row', ['name' => 'height', 'description' => 'Height (in inches)',
	    'value' => $consumer ? $consumer->height : NULL])
	@include('model.field_row', ['name' => 'weight', 'description' => 'Weight (in pounds)',
	    'value' => $consumer ? $consumer->weight : NULL])
	@include('model.field_row', ['name' => 'eyes', 'description' => 'Eye Color',
		'value' => $consumer ? $consumer->eye_color_options[$consumer->eyes] : NULL])
	@include('model.field_row', ['name' => 'hair', 'description' => 'Hair Color',
	    'value' => $consumer ? $consumer->hair_color_options[$consumer->hair] : NULL])
	@include('model.field_row', ['name' => 'marks', 'description' => 'Scars / Marks / Tattoos', 'rows' => 4, 'cols' => 50,
		'value' => $consumer ? $consumer->marks : NULL])
	@include('model.field_row', ['name' => 'physician', 'description' => 'Primary Physician', 'rows' => 4, 'cols' => 50,
		'value' => $consumer ? $consumer->physician : NULL])
	@include('model.field_list', ['name' => 'impairments', 'description' => 'Impairments',
		'values' => $consumer ? $consumer->get_impairment_names() : array()])
	@include('model.field_row', ['name' => 'contact_instructions', 'description' => 'Contact Instructions',
		'value' => $consumer ? $consumer->contact_instructions : NULL])
	@include('model.field_row', ['name' => 'bracelet', 'description' => 'Medical ID Bracelet',
	    'value' => $consumer ? $consumer->bracelet : NULL])
</section>
