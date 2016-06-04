<section class="contact_profile">
    @include('model.field_row', ['name' => 'first_name', 'description' => 'First Name', 'value' => $contact->first_name])
    @include('model.field_row', ['name' => 'last_name', 'description' => 'Last Name', 'value' => $contact->last_name])
    @include('model.field_row', ['name' => 'phone', 'description' => 'Phone Number', 'value' => $contact->phone])
    @include('model.address', ['address' => $contact->address])
</section>