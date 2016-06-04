<section class="school_profile">
    @include('model.field_row', ['name' => 'name', 'description' => 'Name', 'value' => $school->name])
    @if(isset($consumer))
        @include('model.field_row', ['name' => 'contact', 'description' => 'Contact',
            'value' => $consumer->school_contact])
    @endif
    @include('model.field_row', ['name' => 'phone', 'description' => 'Phone Number', 'value' => $school->phone])
    @include('model.address', ['address' => $school->address])
</section>