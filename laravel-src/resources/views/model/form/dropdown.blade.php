<div class="form_row">
	<div class="label">{{$description}}</div> 
	<select name="{{$name}}">
	@foreach ($options as $option_name => $option_description )
		<option value="{{$option_name}}" {{ $value == $option_description ? 'SELECTED' : '' }}>{{$option_description}}</option>
	@endforeach
	</select>
</div>
