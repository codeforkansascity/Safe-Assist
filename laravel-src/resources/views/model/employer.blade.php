<section class="employer_profile">
    @include('model.field_row', ['name' => 'name', 'description' => 'Name', 'value' => $employer->name])
    @if(isset($consumer))
        @include('model.field_row', ['name' => 'contact', 'description' => 'Contact',
            'value' => $consumer->employer_contact])
    @endif
    @include('model.field_row', ['name' => 'phone', 'description' => 'Phone Number', 'value' => $employer->phone])
    @include('model.address', ['address' => $employer->address])
</section>