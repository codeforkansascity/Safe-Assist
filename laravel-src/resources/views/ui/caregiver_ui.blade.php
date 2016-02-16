@extends('layouts.master')

@section('content')
	@include('model.consumer_list', ['consumers' => Auth::user()->consumers])
	<a class="button" href="consumer_register">add</a>
@stop
