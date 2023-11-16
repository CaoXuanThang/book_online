@extends('admin.layout')
@section('title', 'Tác giả')
@section('content')

<h2>Thêm mới</h2>
@component('templates.form', ['method' => 'POST', 'action' => route('admin.brand.create'),'enctype' => 'multipart/form-data','textButton' => 'Thêm'])
@include('templates.input', ['label' => 'Tên', 'type' => 'text', 'name' => 'name','value' => old('name')])
@include('templates.input', ['label' => 'Hình ảnh', 'type' => 'file', 'name' => 'image'])
@endcomponent
@endsection