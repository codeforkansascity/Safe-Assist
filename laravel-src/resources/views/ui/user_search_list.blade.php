@extends('layouts.master')

@section('content')
    @include('model.user_list', ['users' =>  Session::get('userSearchResults')])
@stop