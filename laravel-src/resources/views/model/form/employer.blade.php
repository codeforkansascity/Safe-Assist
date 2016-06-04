@include('model.form.textfield', ['name' => 'name', 'description' => 'Name',
    'value' => $employer ? $employer->name : NULL])
@if(isset($consumer) && $consumer)
    @include('model.form.textfield', ['name' => 'position', 'description' => 'Position',
        'value' => $consumer ? $consumer->employer_position : NULL])
    @include('model.form.textfield', ['name' => 'contact', 'description' => 'Contact',
        'value' => $consumer ? $consumer->employer_contact : NULL])
@endif
@include('model.form.textfield', ['name' => 'phone', 'description' => 'Phone Number',
    'value' => $employer ? $employer->phone : NULL])
@include('model.form.address', ['address' =>
    $employer ? $employer->address : NULL ])