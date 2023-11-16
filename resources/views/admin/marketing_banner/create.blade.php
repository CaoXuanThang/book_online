@extends('admin.layout')
@section('title', 'Banner')
@section('content')

<h2>Thêm mới</h2>
@component('templates.form', ['method' => 'POST', 'action' => route('admin.marketing_banner.create'),'enctype' => 'multipart/form-data','textButton' => 'Thêm'])
@include('templates.input', ['label' => 'Tiêu đề', 'type' => 'text', 'name' => 'name','value' => old('name')])
@include('templates.input', ['label' => 'Hình ảnh', 'type' => 'file', 'name' => 'image'])
@include('templates.input', ['label' => 'Mô tả ngắn', 'type' => 'text', 'name' => 'description','value' => old('description')])
@include('templates.select', ['label' => 'Sản phẩm', 'name' => 'book_id', 'options' => $books,'optionField' => 'name','optionValue' => 'id','defaultText'=>"Chọn sản phẩm",'optionSelected' => old('book_id')])

@endcomponent
@endsection