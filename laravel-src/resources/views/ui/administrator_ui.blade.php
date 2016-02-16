@extends('layouts.master')

@section('content')
<h2>Look up User</h2>
<form action="/profile/search" method="POST">
    {!! csrf_field() !!}
    <div class="form_row">
        <div class="label">User ID</div>
        <input type="text" name="id"/>
    </div>
    <input type="submit" value="search" />
</form>
    @if(Session::has('userSearchResults'))
        @if(count(Session::get('userSearchResults')) == 0)
            <p>No results found from previous search.</p>
        @endif
    @endif
@stop
