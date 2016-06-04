@extends('layouts.master')

@section('content')
<h2>Look up User by ID</h2>
<form action="/user/search" method="POST">
    {!! csrf_field() !!}
    <div class="form_row">
        <div class="label">User ID</div>
        <input type="text" name="id"/>
    </div>
    <input type="submit" value="look up user" />
</form>

<h2>Look up User by Search Term</h2>
<form action="/user/search" method="POST">
    {!! csrf_field() !!}
    <div class="form_row">
        <div class="label">Search Term</div>
        <input type="text" name="search"/>
    </div>
    <input type="submit" value="search" />
</form>

<h2>Look up Agency by ID</h2>
<form action="/agency/search" method="POST">
    {!! csrf_field() !!}
    <div class="form_row">
        <div class="label">User ID</div>
        <input type="text" name="id"/>
    </div>
    <input type="submit" value="look up agency" />
</form>

<h2>Look up Agency by Search Term</h2>
<form action="/agency/search" method="POST">
    {!! csrf_field() !!}
    <div class="form_row">
        <div class="label">Search Term</div>
        <input type="text" name="search"/>
    </div>
    <input type="submit" value="search" />
</form>
<a class="button" href="/agency/register">add new agency</a>

@stop
