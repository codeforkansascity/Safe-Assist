@include('model.form.textfield', ['name' => 'name', 'description' => 'Name',
    'value' => $school ? $school->name : NULL])
@if(isset($consumer) && $consumer)
    @include('model.form.textfield', ['name' => 'contact', 'description' => 'Contact',
        'value' => $consumer ? $consumer->school_contact : NULL])
@endif
@include('model.form.textfield', ['name' => 'phone', 'description' => 'Phone Number',
    'value' => $school ? $school->phone : NULL])
@include('model.form.address', ['address' =>
    $school ? $school->address : NULL ])