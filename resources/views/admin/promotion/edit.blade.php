@extends('admin.layout')
@section('title', 'Giảm giá')
@section('content')

<h2>Thêm mới</h2>
@component('templates.form', ['method' => 'POST', 'action' => route('admin.promotion.edit',['promotion'=>$promotion->id]),'textButton' => 'Sửa','enctype' => 'multipart/form-data'])
@include('templates.input', ['label' => 'Giảm giá', 'type' => 'number', 'name' => 'discount','value' => $promotion->discount])
@include('templates.input', ['label' => 'Ngày bắt đầu', 'type' => 'datetime-local', 'name' => 'start_date','value' => $promotion->start_date])
@include('templates.input', ['label' => 'Ngày kết thúc', 'type' => 'datetime-local', 'name' => 'end_date','value' => $promotion->end_date])
@endcomponent
@endsection