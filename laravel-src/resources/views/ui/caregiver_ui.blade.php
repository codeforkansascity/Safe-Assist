@extends('layouts.master')

@section('content')
	@foreach (Auth::user()->consumers as $consumer)
		@include('model.consumer', ['consumer' => $consumer])
		<a class="button" href="consumer_edit/{{$consumer->id}}">edit</a>
	@endforeach
@stop
