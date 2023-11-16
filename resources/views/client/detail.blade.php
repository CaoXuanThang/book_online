@extends('client.layout.layout')
@section('title', 'Trang chi tiết')
@section('css')
<style>
  .fa-star {
    color: #ccc;
  }

  .fa-star.active {
    color: #ffc107;
  }

</style>
@endsection
@section('content')

<!-- Open Content -->
<section class="bg-light">
  <div class="container pb-5">
    <div class="row">
      <div class="col-lg-5 mt-5">
        <div class="card mb-3">
          <img class="card-img img-fluid" src="{{ Storage::url($book->image) }}"
            alt="Card image cap" id="product-detail">
        </div>
      </div>
      <!-- col end -->
      <div class="col-lg-7 mt-5">
        <div class="card">
          <div class="card-body">
            <h1 class="h2">{{ $book->name }}</h1>
            @if ($promotion != null)
            @php
            $currentDate = now();
            $checkDate = $currentDate->between($promotion->start_date,
            $promotion->end_date);
            @endphp
            @if ($checkDate)

            <div class="d-flex">
              <p class="h3 text-decoration-line-through py-2">{{formatNumberPrice($book->price)}}
              </p>
              <p class="h3 text-danger fw-bold ms-2 py-2">{{formatNumberPrice($book->price -
                $promotion->discount)}}
              </p>
            </div>
            @else
            <p class="h3 py-2">{{formatNumberPrice($book->price)}}
            </p>
            @endif

            @endif

            @if (count($reviews_by_book) > 0)
            @php
            $sumRatings = $reviews_by_book->sum('rating');
            $averageRating = $sumRatings / $reviews_by_book->count();

            @endphp

            <p class="py-2">
              @for ($i = 1; $i <= 5; $i++) @if ($averageRating>= $i)
                <i class="fas fa-star text-warning"></i>
                @elseif ($averageRating > $i - 1 && $averageRating < $i) <i
                  class="fas fa-star-half-alt text-warning"></i>
                  @else
                  <i class="far fa-star text-warning"></i>
                  @endif
                  @endfor

                  <span class="list-inline-item text-dark">Đánh giá {{round($averageRating,1)}} | {{
                    $reviews_by_book->count() }} Bình luận</span>
            </p>
            @endif
            <ul class="list-inline">
              <li class="list-inline-item">
                <h6>Hãng:</h6>
              </li>
              <li class="list-inline-item">
                <p class="text-muted"><strong>{{ $book->brand_name }}</strong></p>
              </li>
            </ul>
            <p>Số lượng: {{ $book->quantity }}</p>
            <h6>Description:</h6>
            <p>{{ $book->description }}</p>



            @component('templates.form', ['method' => 'post', 'action' =>
            route('client.cart.create'),'enctype'
            =>"multipart/form-data",'textButton' => 'Thêm vào giỏ hàng','buttonClass' =>
            'btn-success'])
            @include('templates.input', ['label' => '', 'type' => 'hidden', 'name' =>
            'book_id','value' => $book->id])
            <div class="row">
              <div class="col-auto">
                <ul class="list-inline pb-3">
                  <li class="list-inline-item text-right">
                    Quantity
                    <input type="hidden" name="quantity" id="product-quanity" value="1">
                  </li>
                  <li class="list-inline-item m-0"><span class="btn btn-success"
                      id="btn-minus">-</span></li>
                  <li class="list-inline-item m-0"><span class="badge bg-secondary"
                      id="var-value">1</span></li>
                  <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span>
                  </li>
                </ul>
              </div>
            </div>
            @endcomponent

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Close Content -->

<!-- Start Article -->
<section class="py-5">
  <div class="container">
    <div class="row text-left p-2 pb-3">
      <h4>Sản phẩm liên quan</h4>
    </div>

    <!--Start Carousel Wrapper-->
    <div id="carousel-related-product">

      <div class="row ">
        @foreach ($relatedProducts as $relatedProduct)
        <div class="col-lg-3 col-md-4 mb-4">
          @include('templates.product_card', ['book' => $relatedProduct])
        </div>
        @endforeach
      </div>



    </div>
    {{-- comment --}}
    <section class="bg-light">
      <div class="container my-5 py-5">
        <div class="row d-flex justify-content-center">
          <div class="col-md-12 col-lg-10">
            <div class="card text-dark">
              <div class="card-body p-4">
                <h4 class="mb-0">Bình luận</h4>


              </div>
              @foreach ($reviews as $review)

              <div class="card-body p-4">
                <div class="d-flex flex-start">
                  <img class="rounded-circle shadow-1-strong me-3"
                    src="{{ Storage::url($review->user_avatar) }}" alt="avatar" width="60"
                    height="60" />
                  <div>
                    <h6 class="fw-bold mb-1">{{ $review->user_name }}</h6>
                    <div class="d-flex align-items-center mb-3">
                      <p class="mb-0 me-2">
                        {{formatDate($review->created_at)}}
                      </p>
                      @for ($i = 1; $i <= 5; $i++) @if ($review->rating >= $i)
                        <i class="fas fa-star text-warning"></i>
                        @else
                        <i class="far fa-star text-warning"></i>
                        @endif
                        @endfor
                    </div>
                    <p class="mb-0">
                      {{ $review->comment }}
                    </p>
                  </div>
                </div>
              </div>
              <hr class="my-0" />
              @endforeach

              <div class="container mt-5">
                <h3>Đánh giá</h3>
                @component('templates.form', ['method' => 'POST', 'action' =>
                route('client.review.store'),'textButton' => 'Gửi'])
                <input type="hidden" name="book_id" value="{{$book->id}}">
                <div class="rating">
                  <input type="radio" hidden name="rating" id="star1" value="1"><i for="star1"
                    class="fa-solid fa-star" data-index="1"></i>
                  <input type="radio" hidden name="rating" id="star2" value="2"><i for="star2"
                    class="fa-solid fa-star" data-index="2"></i>
                  <input type="radio" hidden name="rating" id="star3" value="3"><i for="star3"
                    class="fa-solid fa-star" data-index="3"></i>
                  <input type="radio" hidden name="rating" id="star4" value="4"><i for="star4"
                    class="fa-solid fa-star" data-index="4"></i>
                  <input type="radio" hidden name="rating" id="star5" value="5"><i for="star5"
                    class="fa-solid fa-star" data-index="5"></i>
                </div>
                @include('templates.textarea', ['label' => 'Bình luận', 'name' =>
                'comment','value' => old('comment')])
                @endcomponent

                <div class="p-2"></div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
</section>
<!-- End Article -->
@endsection
@section('script_footer')
<script>
  const stars = document.querySelectorAll('.fa-star');

stars.forEach(star => {
  star.addEventListener('click', () => {
        // get input previous
    
    let currentIndex = parseInt(star.dataset.index);
    
    stars.forEach(star => {
      if(parseInt(star.dataset.index) <= currentIndex) {
        star.classList.add('active');
      } else {
        star.classList.remove('active');
      }
      
    });
    stars.forEach((star, index) => {
      if(index < currentIndex) {
        document.querySelector(`#star${index+1}`).checked = true;
      } else {
        document.querySelector(`#star${index+1}`).checked = false;
      }
    });
  });
});
</script>
@endsection