@extends('client.layout.layout')
@section('title', 'Trang danh mục')
@section('content')
    <!-- Start Category -->
    <div class="container my-5">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-lg-3 col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a class="text-decoration-none text-dark"
                                href="{{ route('client.directory', ['category' => $category->id]) }}">
                                <h5 class="card-title">{{ $category->name }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- End Category -->
    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row py-3">

            </div>
            <div class="row">
                <div class="col-3">
                    @component('templates.form', [
                        'method' => 'GET',
                        'action' => route('client.directory'),
                        'enctype' => 'multipart/form-data',
                        'textButton' => 'Lưu',
                    ])
                        <div class="">
                            <h6 class="">Nhà sản xuất</h6>
                            <div class="">
                                @include('templates.checkbox', [
                                    'options' => $brands,
                                    'name' => 'brand',
                                    'selectedCheckbox' => $selectedCheckbox,
                                ])
                            </div>

                        </div>
                        <div class="">
                            <h6 class="">Giá</h6>
                            <div class="d-flex gap-2">
                                @include('templates.input', [
                                    'label' => 'Giá đầu',
                                    'type' => 'number',
                                    'name' => 'min_price',
                                    'value' => session('min_price'),
                                ])
                                @include('templates.input', [
                                    'label' => 'Giá cuối',
                                    'type' => 'number',
                                    'name' => 'max_price',
                                    'value' => session('max_price'),
                                ])

                            </div>

                        </div>
                    @endcomponent
                </div>
                <div class="col-9 " style="background-color: white">
                    <div class="row ">
                        <h1 class="">Sách ({{ count($books) }} sản phẩm)</h1>
                        @foreach ($books as $book)
                            <div class="col-lg-4 col-md-6 mb-4">
                                @include('templates.product_card', ['book' => $book])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>
    <!-- End Featured Product -->
@endsection
