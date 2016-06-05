<div class="form_row">
    <label>{{$description}}</label>
    <input type="date" name="{{$name}}" value="{{ old($name) ? old($name) : $value }}"/>
</div>