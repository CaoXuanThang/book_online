@extends('admin.layout')
@section('title', 'Danh mục')
@section('content')

<h2>Thêm mới</h2>
@component('templates.form', ['method' => 'POST', 'action' => route('admin.category.create'),'textButton' => 'Thêm'])
@include('templates.input', ['label' => 'Tên', 'type' => 'text', 'name' => 'name','value' => old('name')])
@endcomponent
@endsection