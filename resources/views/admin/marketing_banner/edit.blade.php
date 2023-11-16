@extends('admin.layout')
@section('title', 'Banner')
@section('content')

<h2>Chinh sua</h2>
@component('templates.form', ['method' => 'POST', 'action' => route('admin.marketing_banner.edit',['marketing_banner'=>$marketing_banner->id]),'enctype' => 'multipart/form-data','textButton' => 'Sửa'])
@include('templates.input', ['label' => 'Tiêu đề', 'type' => 'text', 'name' => 'name','value' => $marketing_banner->name])
<img src="{{ asset('storage/'.$marketing_banner->image) }}" width="100" alt="">
@include('templates.input', ['label' => 'Hình ảnh', 'type' => 'file', 'name' => 'image'])
@include('templates.input', ['label' => 'Mô tả ngắn', 'type' => 'text', 'name' => 'description','value' => $marketing_banner->description])
@include('templates.select', ['label' => 'Sản phẩm', 'name' => 'book_id', 'options' => $books,'optionField' => 'name','optionValue' => 'id','defaultText'=>"Chọn sản phẩm",'optionSelected' => $marketing_banner->book_id])

@endcomponent
@endsection