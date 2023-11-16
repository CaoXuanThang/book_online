@extends('admin.layout')
@section('title', 'Tác giả')
@section('content')

    <h2>Sửa danh mục</h2>
    @component('templates.form', [
        'method' => 'POST',
        'action' => route('admin.brand.edit', $brand->id),
        'enctype' => 'multipart/form-data',
        'textButton' => 'Sửa',
    ])
        @include('templates.input', [
            'label' => 'Tên',
            'type' => 'text',
            'name' => 'name',
            'value' => $brand->name,
        ])
        <img src="{{ $brand->image ? '' . Storage::url($brand->image) : '' }}" width="100" alt="">
        @include('templates.input', ['label' => 'Hình ảnh', 'type' => 'file', 'name' => 'image'])
    @endcomponent
@endsection
