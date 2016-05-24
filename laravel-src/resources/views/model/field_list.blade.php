<div class="field_list field_list_{{$name}}">
    <label>{{$description}}:<label>
    <ul>
    @foreach($values as $value)
        <li>{{ $value }}</li>
    @endforeach
    </ul>
</div>
