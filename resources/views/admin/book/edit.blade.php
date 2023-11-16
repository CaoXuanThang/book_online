@extends('admin.layout')
@section('title', 'Sách')
@section('content')

    <h2>Sửa</h2>
    @component('templates.form', [
        'method' => 'POST',
        'action' => route('admin.book.edit', ['book' => $book->id]),
        'textButton' => 'Sửa',
        'enctype' => 'multipart/form-data',
    ])
        @include('templates.select', [
            'label' => 'Danh mục',
            'name' => 'category_id',
            'options' => $categories,
            'optionField' => 'name',
            'optionValue' => 'id',
            'defaultText' => 'Chọn danh muc',
            'optionSelected' => $book->category_id,
        ])
        @include('templates.select', [
            'label' => 'Tác giả',
            'name' => 'brand_id',
            'options' => $brands,
            'optionField' => 'name',
            'optionValue' => 'id',
            'defaultText' => 'Chọn tác giả',
            'optionSelected' => $book->brand_id,
        ])
        @include('templates.select', [
            'label' => 'Phiếu giảm giá',
            'name' => 'promotion_id',
            'options' => $promotions,
            'optionField' => 'id',
            'optionValue' => 'id',
            'defaultText' => 'Chọn phiếu giảm giá',
            'optionSelected' => $book->promotion_id,
        ])
        @include('templates.input', [
            'label' => 'Tên sản phẩm',
            'type' => 'text',
            'name' => 'name',
            'value' => $book->name,
        ])
        <img src="{{ $book->image ? '' . Storage::url($book->image) : '' }}" width="100" alt="">
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
            'value' => $book->price,
        ])
        @include('templates.input', [
            'label' => 'Số lượng',
            'type' => 'number',
            'name' => 'quantity',
            'value' => $book->quantity,
        ])
        @include('templates.textarea', [
            'label' => 'Mô tả',
            'name' => 'description',
            'value' => $book->description,
        ])
    @endcomponent
@endsection
