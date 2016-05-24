	@include('model.form.dropdown', ['name' => 'relationship', 'description' => 'Caretaker Relationship',
		'value' => $consumer ? $consumer->relationship : NULL,
		'options' => Consumer::$relationship_options
	])
	@include('model.form.textfield', ['name' => 'first_name', 'description' => 'First Name',
		'value' => $consumer ? $consumer->first_name : NULL])
	@include('model.form.textfield', ['name' => 'last_name', 'description' => 'Last Name',
		'value' => $consumer ? $consumer->last_name : NULL])
	@include('model.form.textfield', ['name' => 'nickname', 'description' => 'Nick Name',
		'value' => $consumer ? $consumer->nickname : NULL])
	@include('model.form.textfield', ['name' => 'suffix', 'description' => 'Jr/Sr',
		'value' => $consumer ? $consumer->suffix : NULL])
	@include('model.form.dropdown', ['name' => 'language', 'description' => 'Primary Language',
		'value' => $consumer ? $consumer->language : NULL,
		'options' => Consumer::$language_options
	])
	@include('model.form.address', ['address' => $consumer ? $consumer->address : NULL])
	@include('model.form.textfield', ['name' => 'phone', 'description' => 'Phone Number',
		'value' => $consumer ? $consumer->phone : NULL])
	@include('model.form.dropdown', ['name' => 'gender', 'description' => 'Gender',
		'value' => $consumer ? $consumer->gender : NULL,
		'options' => Consumer::$gender_options
	])
	@include('model.form.textfield', ['name' => 'dob', 'description' => 'Date of Birth',
		'value' => $consumer ? $consumer->dob : NULL])
	@include('model.form.textfield', ['name' => 'ssn', 'description' => 'Social Security Number',
		'value' => $consumer ? $consumer->ssn : NULL])
	@include('model.form.textfield', ['name' => 'height', 'description' => 'Height (in inches)',
		'value' => $consumer ? $consumer->height : NULL])
	@include('model.form.textfield', ['name' => 'weight', 'description' => 'Weight (in pounds)',
		'value' => $consumer ? $consumer->weight : NULL])
	@include('model.form.dropdown', ['name' => 'eyes', 'description' => 'Eye Color',
		'value' => $consumer ? $consumer->eyes : NULL,
		'options' => Consumer::$eye_color_options
	])
	@include('model.form.dropdown', ['name' => 'hair', 'description' => 'Hair Color',
		'value' => $consumer ? $consumer->hair : NULL,
		'options' => Consumer::$hair_color_options
	])
	@include('model.form.textfield', ['name' => 'marks', 'description' => 'Scars / Marks / Tattoos',
		'rows' => 4, 'cols' => 50, 'value' => $consumer ? $consumer->marks : NULL])
	@include('model.form.textfield', ['name' => 'physician', 'description' => 'Primary Physician',
		'rows' => 4, 'cols' => 50, 'value' => $consumer ? $consumer->physician : NULL])

	@include('model.form.dropdown', ['name' => 'impairments', 'description' => 'Impairments',
    	'values' => $consumer->get_impairment_keys(),
    	'options' => Impairment::get_all_options()
	])

	@include('model.form.textfield', ['name' => 'contact_instructions', 'description' => 'Contact Instructions',
		'rows' => 4, 'cols' => 50, 'value' =>  $consumer ? $consumer->contact_instructions : NULL])
	@include('model.form.textfield', ['name' => 'bracelet', 'description' => 'Medical ID Bracelet',
		'value' => $consumer ? $consumer->bracelet : NULL])