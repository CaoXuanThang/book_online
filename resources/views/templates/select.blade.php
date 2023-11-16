<div class="form-group mb-3">
  <label for="" class="form-label">{{ $label }}</label>
  <select class="form-select form-select-md" name="{{$name}}" id="">
    <option value="" >{{$defaultText}}</option>
    @foreach ($options as $key => $option)
    <option value="{{$option->{$optionValue} }}" {{ $optionSelected == $option->{$optionValue} ? 'selected' : ''}}>{{$option->{$optionField} }}</option>
    @endforeach
  </select>
  @error($name)
  <span class="text-danger">{{$message}}</span>
  @enderror
</div>
