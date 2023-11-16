@extends('admin.layout')
@section('title', 'Danh mục')
@section('content')

<h2>Sửa danh mục</h2>
@component('templates.form', ['method' => 'POST', 'action'=>route('admin.category.edit',$category->id),'textButton' => 'Sửa'])
@include('templates.input', ['label' => 'Tên', 'type' => 'text', 'name' => 'name','value' => $category->name])
@endcomponent
@endsection