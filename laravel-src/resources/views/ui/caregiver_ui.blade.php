@extends('layouts.master')

@section('content')
	<div class="consumer_list">
	@foreach (Auth::user()->consumers as $consumer)
		@include('model.consumer', ['consumer' => $consumer])
		<a class="button" href="consumer_edit/{{$consumer->id}}">edit</a>
	@endforeach
	</div>
	<a class="button" href="consumer_register">add</a>
@stop
