@extends('layouts.master')

@section('content')
    @include('model.agency', ['agency' => $agency])
    @if (Auth::user()->administrator)
        <a href="/agency/edit/{{$agency->id}}" class="button special">Edit Agency</a>
        <form action="/agency/delete" method="POST">
            {!! csrf_field() !!}
            <input type="hidden" name="id" value="{{$agency->id}}"/>
            <input type="submit" value="Delete Agency" class="button special">
        </form>
    @endif
@stop
