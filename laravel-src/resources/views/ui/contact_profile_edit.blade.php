@extends('layouts.master')

@section('content')
    <div class="update_consumer_form">
        @if(isset($contact))
        <form action="/contact/update" method="POST">
            {!! csrf_field() !!}
            <h2>update contact</h2>
            <input type="hidden" name="contact_id" value="{{$contact->id}}">
        @else
        <form action="/contact/add" method="POST">
            {!! csrf_field() !!}
            <h2>add contact</h2>
        @endif

        @include('model.form.contact', ['contact' => $contact])

        @if(isset($consumer_id))
            <input type="hidden" name="consumer_id" value="{{$consumer_id}}">
        @endif

        <input type="submit" value="save"/>
        </form>
    </div>
@stop