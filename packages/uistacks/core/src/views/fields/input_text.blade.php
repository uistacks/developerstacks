@php
    $languageCode = '';
    $fieldName = $field_name;
    $name = $name;
    $placeholder = $placeholder;

    if (isset($type)) {
        $type = $type;
    }
    else{
        $type = "text";
    }

    if (old($fieldName)) {
        $value = old($fieldName);
    }
    elseif(isset($item) && isset($item->$fieldName) && $type !== 'password') {
        $value = $item->$fieldName;
    }
    elseif(!isset($value)) {
        $value = '';
    }

    if (isset($lang["code"])) {
        $languageCode = $lang["code"];
        $fieldName = $field_name.'_'.$lang["code"];

        if(old($fieldName)){
            $value = old($fieldName);
        }

        if(count($languages) > 1){
            $name = $name.' ('.$lang["name"].')';
            $placeholder = $placeholder.' ('.$lang["name"].')';
        }

        if(isset($trans) && isset($trans[$languageCode]) && isset($trans[$languageCode][$field_name])){
            $value = $trans[$languageCode][$field_name];
        }
    }


@endphp

<div class="form-group row {{ $errors->has($fieldName) ? 'has-error': '' }}">
    <label class="col-form-label col-lg-3" for="{{$fieldName}}">{{ $name }}</label>
    <div class="col-lg-9">
        <input type="{{$type}}" class="form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0" id="{{$fieldName}}" name="{{$fieldName}}" value="{{ $value }}" placeholder="{{$placeholder}}">
        @if(isset($help))
            {{--<p class="help-block">{!! $help !!}</p>--}}
            <label id="{{$fieldName}}-error" class="validation-invalid-label" for="{{$fieldName}}">This field is required.</label>
        @endif
    </div>
</div>