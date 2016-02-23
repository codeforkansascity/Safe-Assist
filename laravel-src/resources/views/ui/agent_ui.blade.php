@extends('layouts.master')

@section('content')
    <h1>Search For Consumers</h1>
    <form action="/consumer/search" method="post">
        {!! csrf_field() !!}
        <div class="form_row">
            <div class="label">Agency: </div>
            <select name="agency">
            @foreach(Auth::user()->agencies as $agency)
                <option value="$agency->id">{{$agency->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form_row">
            <div class="label">Search Term</div>
            <input type="text" name="keyword"/>
        </div>
        <input type="submit" value="search" />
    </form>
</select>
@stop
