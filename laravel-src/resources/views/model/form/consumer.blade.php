	@include('model.form.dropdown', ['name' => 'relationship', 'description' => 'Caretaker Relationship', 'value' => $consumer->relationship, 
		'options' => [
			'self' => 'Self',
			'parent' => 'Parent',
			'guardian' => 'Guardian',
			'sibling' => 'Sibling',
			'facility_agent' => 'Facility Agent',
			'medical_worker' => 'Medical Worker',
			'other' => 'Other'
		]
	])
	@include('model.form.textfield', ['name' => 'first_name', 'description' => 'First Name', 'value' => $consumer->first_name])
	@include('model.form.textfield', ['name' => 'last_name', 'description' => 'Last Name', 'value' => $consumer->last_name])
	@include('model.form.textfield', ['name' => 'nickname', 'description' => 'Nick Name', 'value' => $consumer->nickname])
	@include('model.form.textfield', ['name' => 'suffix', 'description' => 'Jr/Sr', 'value' => $consumer->suffix])
	@include('model.form.dropdown', ['name' => 'language', 'description' => 'Primary Language', 'value' => $consumer->language, 
		'options' => [
			'english' => 'English',
			'spanish' => 'Spanish'
		]
	])
	@include('model.form.address', ['address' => $consumer->address ? $consumer->address : new App\Address])
	@include('model.form.textfield', ['name' => 'phone', 'description' => 'Phone Number', 'value' => $consumer->phone])
	@include('model.form.dropdown', ['name' => 'gender', 'description' => 'Gender', 'value' => $consumer->gender, 
		'options' => [
			'M' => 'Male',
			'F' => 'Female'
		]
	])
	@include('model.form.textfield', ['name' => 'birthdate', 'description' => 'Date of Birth', 'value' => $consumer->birthdate])
	@include('model.form.textfield', ['name' => 'ssn', 'description' => 'Social Security Number', 'value' => $consumer->ssn])
	@include('model.form.textfield', ['name' => 'ssn', 'description' => 'Height (in inches)', 'value' => $consumer->height])
	@include('model.form.textfield', ['name' => 'weight', 'description' => 'Weight (in pounds)', 'value' => $consumer->weight])
	@include('model.form.dropdown', ['name' => 'eyes', 'description' => 'Eye Color', 'value' => $consumer->eyes, 
		'options' => [
			'brown' => 'Brown',
			'hazel' => 'Hazel',
			'blue' => 'Blue',
			'green' => 'Green',
			'grey' => 'Grey',
			'amber' => 'Amber'
		]
	])
	@include('model.form.dropdown', ['name' => 'hair', 'description' => 'Hair Color', 'value' => $consumer->hair, 
		'options' => [
			'brown' => 'Brown',
			'black' => 'Black',
			'blonde' => 'Blonde',
			'red' => 'Red',
			'grey' => 'Grey',
			'bald' => 'Bald'
		]
	])
	@include('model.form.textfield', ['name' => 'marks', 'description' => 'Scars / Marks / Tattoos', 'rows' => 4, 'cols' => 50, 'value' => $consumer->marks])
	@include('model.form.textfield', ['name' => 'physician', 'description' => 'Primary Physician', 'rows' => 4, 'cols' => 50, 'value' => $consumer->physician])
	@include('model.form.textfield', ['name' => 'bracelet', 'description' => 'Medical ID Bracelet', 'value' => $consumer->bracelet])
	@include('model.form.textfield', ['name' => 'contact_instructions', 'description' => 'Contact Instructions', 'rows' => 4, 'cols' => 50, 
		'value' => $consumer->contact_instructions])
