@extends('client.layout.layout')
@section('title', 'Trang chủ')
@section('content')
    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
            @foreach ($banners as $key => $banner)
                <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="{{ $key }}"
                    class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
        </div>

        <div class="carousel-inner">
            @foreach ($banners as $key => $banner)
                <a href="{{ route('client.detail', ['book' => $banner->id]) }}"
                    class="text-decoration-none carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="container">
                        <div class="row p-5">
                            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                <img class="img-fluid" src="{{ Storage::url($banner->image) }}" alt="{{ $banner->name }}">
                            </div>

                            <div class="col-lg-6 mb-0 d-flex align-items-center">
                                <div class="text-align-left align-self-center">
                                    <h1 class="h1 text-success"><b>{{ $banner->name }}</b></h1>

                                    <p class="text-muted">{{ $banner->description }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
            @endforeach

        </div>

        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>

    </div>
    <!-- End Banner Hero -->

    <!-- Start Featured Product -->
    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Sản phẩm nổi bật</h1>
                <p>
                    Top 3 sách nổi bật đều được chúng tôi liệt kê ra đây
                </p>
            </div>
        </div>
        <div class="row">
          @foreach ($books as $book)
          <div class="col-12 col-md-4 p-5 mt-3">
            @include('templates.product_card', ['book' => $book])
          </div>
          @endforeach
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Sản phẩm giảm giá</h1>
                    <p>
                        Chúng tôi liệt kê ra một số sản phẩm giảm giá nổi bật
                    </p>
                </div>
            </div>
            <div class="row">
                  @foreach ($booksWithPromotion as $book)
                  <div class="col-12 col-md-4 p-5 mt-3">
                    @include('templates.product_card', ['book' => $book])
                  </div>
                  @endforeach
            </div>
        </div>
    </section>
    <!-- End Featured Product -->
    <!-- End Featured Product -->
@endsection
