@extends('layouts.master')

@section('content')
    <div class="update_consumer_form">
        @if(isset($school))
        <form action="/school/update" method="POST">
            {!! csrf_field() !!}
            <h2>update school</h2>
            <input type="hidden" name="id" value="{{$school->id}}">
        @else
        <form action="/school/add" method="POST">
            {!! csrf_field() !!}
            <h2>add school</h2>
        @endif

        @include('model.form.school', ['school' => $school,
            'consumer' => isset($consumer_id) ? Consumer::find($consumer_id) : NULL])

        @if(isset($consumer_id))
            <input type="hidden" name="consumer_id" value="{{$consumer_id}}">
        @endif

        <input type="submit" value="save"/>
        </form>
    </div>
@stop