<div class="form_row">
	<div class="label">{{$description}}</div> 
	<select name="{{$name}}" @if(isset($values)) multiple @endif >
	@foreach ($options as $option_name => $option_description )
	    @if(isset($values))
			<option value="{{$option_name}}" {{ in_array($option_name, $values) ? 'SELECTED' : '' }}>{{$option_description}}</option>
		@else
		    <option value="{{$option_name}}" {{ (old($name) ? old($name) : $value) == $option_name ? 'SELECTED' : '' }}>{{$option_description}}</option>
		@endif
	@endforeach
	</select>
</div>
