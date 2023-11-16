{{--
@include('templates.checkbox', ['options' => $options, 'selectedOptions' => $selectedOptions])  
--}}
<div class="form-group mb-3">
  @foreach ($options as $key => $option)
  <div class="form-check fs-6">
    <input class="form-check-input" type="checkbox" name="{{$name}}[]" value="{{$option->id}}"  {{ in_array($option->id,$selectedCheckbox) ? 'checked' : '' }}>{{$option->name}}
    
  </div>
  @endforeach
</div>
