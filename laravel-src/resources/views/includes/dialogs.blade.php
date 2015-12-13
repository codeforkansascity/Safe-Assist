<div class='shadowbox'></div>

@if (count($errors) > 0)
<div class="error_message">
	<ul>
	@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
	</ul>
</div>
@endif

@if (!Auth::check()) @include('auth.login') @endif
@if (!Auth::check()) @include('auth.register') @endif
