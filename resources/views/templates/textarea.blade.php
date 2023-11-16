<div class="mb-3">
  <label for="" class="form-label">{{ $label }}</label>
  <textarea class="form-control" name="{{$name}}" id="" rows="3">{{$value}}</textarea>
  @error($name)
  <span class="text-danger">{{$message}}</span>
  @enderror
</div>