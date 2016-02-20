@extends('layouts.master')

@section('content')
    @include('model.consumer_list', ['consumers' => $consumers])
@stop