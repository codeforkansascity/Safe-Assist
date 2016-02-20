@extends('layouts.master')

@section('content')
    <div class="update_agency_form">
        @if(isset($agency->id))
            <form action="/agency/update" method="POST">
        @else
            <form action="/agency/register" method="POST">
        @endif
            {!! csrf_field() !!}
            <h2>update agency</h2>
            @include('model.form.agency', ['agency' => $agency])
            @if(isset($agency->id))
                <input type="hidden" name="id" value="{{$agency->id}}">
            @endif

            <input type="submit" value="save"/>
            </form>
    </div>
@stop
