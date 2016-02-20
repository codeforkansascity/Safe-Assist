@extends('layouts.master')

@section('content')
<select name="agency">
    <h1>Search For Consumers</h1>
    <form action="">
        {!! csrf_field() !!}
        @foreach(Auth::user()->agencies as $agency)
        <option value="$agency->id">{{$agency->name}}</option>
        @endforeach
        <div class="form_row">
            <div class="label">User ID</div>
            <input type="text" name="keyword"/>
        </div>
        <input type="submit" value="search" />
    </form>
</select>
@stop
