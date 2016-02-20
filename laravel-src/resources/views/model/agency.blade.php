<section class="agency_profile">
    <div class="name">{{$agency->name}}</div>
    @include('model.address', ['address' => $agency->address])
</section>
