@extends('admin.layout')
@section('title', 'Giảm giá')
@section('content')

<h2>Thêm mới</h2>
@component('templates.form', ['method' => 'POST', 'action' => route('admin.promotion.create'),'textButton' => 'Thêm','enctype' => 'multipart/form-data'])
@include('templates.input', ['label' => 'Giảm giá', 'type' => 'number', 'name' => 'discount','value' => old('discount')])
@include('templates.input', ['label' => 'Ngày bắt đầu', 'type' => 'datetime-local', 'name' => 'start_date','value' => old('start_date')])
@include('templates.input', ['label' => 'Ngày kết thúc', 'type' => 'datetime-local', 'name' => 'end_date','value' => old('end_date')])
@endcomponent
@endsection