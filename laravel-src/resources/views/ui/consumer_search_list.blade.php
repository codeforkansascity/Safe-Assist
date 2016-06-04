@extends('layouts.master')

@section('content')
    @include('model.consumer_list', ['consumers' => Session::get('consumerSearchResults')])
@stop