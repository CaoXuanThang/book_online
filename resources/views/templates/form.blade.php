{{-- 
@component('templates.form', ['method' => 'POST', 'action' => route('your.action'),'enctype' =>"multipart/form-data",'textButton' => 'Thêm'])
  content
@endcomponent 
--}}
<form class="{{$formClass??''}}" method="{{$method}}" action="{{ $action }}" enctype="{{$enctype ??''}}">
  @csrf
  {{$slot}}
  <button type="submit" class=" btn {{$buttonClass??"btn-primary"}}">{!! $textButton !!}</button>
  
  </form>