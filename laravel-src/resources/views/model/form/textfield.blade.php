<div class="form_row">
	<div class="label">{{$description}}</div> 
	<input type="text" name="{{$name}}" value="{{ old($name) ? old($name) : $value }}"></input>
</div>