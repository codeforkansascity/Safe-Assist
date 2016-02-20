@extends('layouts.master')

@section('content')
    @include('model.agency_list', ['agencies' => Session::get('agencySearchResults')])
@stop