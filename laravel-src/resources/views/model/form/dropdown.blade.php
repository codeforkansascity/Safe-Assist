<div class="form_row">
	<div class="label">{{$description}}</div> 
	<select name="{{$name}}">
	@foreach ($options as $option_name => $option_description )
		<option value="{{$option_name}}" {{ (old($name) ? old($name) : $value) == $option_name ? 'SELECTED' : '' }}>{{$option_description}}</option>
	@endforeach
	</select>
</div>
