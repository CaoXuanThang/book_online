@extends('admin.layout')
@section('title', 'Sách')
@section('content')

    <h2>Thêm mới</h2>
    @component('templates.form', [
        'method' => 'POST',
        'action' => route('admin.book.create'),
        'textButton' => 'Thêm',
        'enctype' => 'multipart/form-data',
    ])
        @include('templates.select', [
            'label' => 'Danh mục',
            'name' => 'category_id',
            'options' => $categories,
            'optionField' => 'name',
            'optionValue' => 'id',
            'defaultText' => 'Chọn danh muc',
            'optionSelected' => old('category_id'),
        ])
        @include('templates.select', [
            'label' => 'Tác giả',
            'name' => 'brand_id',
            'options' => $brands,
            'optionField' => 'name',
            'optionValue' => 'id',
            'defaultText' => 'Chọn Tác giả',
            'optionSelected' => old('brand_id'),
        ])
        @include('templates.select', [
            'label' => 'Phiếu giảm giá',
            'name' => 'promotion_id',
            'options' => $promotions,
            'optionField' => 'id',
            'optionValue' => 'id',
            'defaultText' => 'Chọn phiếu giảm giá',
            'optionSelected' => old('promotion_id'),
        ])
        @include('templates.input', [
            'label' => 'Tên sản phẩm',
            'type' => 'text',
            'name' => 'name',
            'value' => old('name'),
        ])
        @include('templates.input', [
            'label' => 'Hình ảnh',
            'type' => 'file',
            'name' => 'image',
            'value' => '',
        ])
        @include('templates.input', [
            'label' => 'Giá tiền',
            'type' => 'number',
            'name' => 'price',
            'value' => old('price'),
        ])
        @include('templates.input', [
            'label' => 'Số lượng',
            'type' => 'number',
            'name' => 'quantity',
            'value' => old('quantity'),
        ])
        @include('templates.textarea', [
            'label' => 'Mô tả',
            'name' => 'description',
            'value' => old('description'),
        ])
    @endcomponent
@endsection
