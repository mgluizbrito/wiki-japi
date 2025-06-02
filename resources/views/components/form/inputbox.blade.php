<div class="input-box">
    <input type="{{$type ?? 'text'}}" name="{{$name}}" id="{{$id ?? $name}}" {{$isRequired ?? 'required'}} placeholder={{$place ?? " "}}>
    <label for="{{$name}}">{{$label}}</label>
</div>