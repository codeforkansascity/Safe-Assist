@include('model.form.textfield', ['name' => 'first_name', 'description' => 'First Name',
    'value' => $contact ? $contact->first_name : NULL])
@include('model.form.textfield', ['name' => 'last_name', 'description' => 'Last Name',
    'value' => $contact ? $contact->last_name : NULL])
@include('model.form.textfield', ['name' => 'phone', 'description' => 'Phone Number',
    'value' => $contact ? $contact->phone : NULL])
@include('model.form.address', ['address' =>
    $contact ? $contact->address : NULL ])