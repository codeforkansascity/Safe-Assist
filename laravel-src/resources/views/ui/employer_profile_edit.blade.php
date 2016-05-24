@extends('layouts.master')

@section('content')
    <div class="update_consumer_form">
        @if(isset($employer))
            <form action="/employer/update" method="POST">
            {!! csrf_field() !!}
            <h2>update employer</h2>
            <input type="hidden" name="id" value="{{$employer->id}}">
        @else
            <form action="/employer/add" method="POST">
            {!! csrf_field() !!}
            <h2>add employer</h2>
        @endif

        @include('model.form.employer', ['employer' => $employer,
                 'consumer' => isset($consumer_id) ? Consumer::find($consumer_id) : NULL])

        @if(isset($consumer_id))
            <input type="hidden" name="consumer_id" value="{{$consumer_id}}">
        @endif

            <input type="submit" value="save"/>
        </form>
    </div>
@stop