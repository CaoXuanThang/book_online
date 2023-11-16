<div class="card border-0 shadow">
    @php
        $reviews_by_book = DB::table('reviews')
            ->where('book_id', $book->id)
            ->get();
        $promotion = DB::table('books')
            ->join('promotions', 'promotions.id', '=', 'books.promotion_id')
            ->select('promotions.*')
            ->where('books.id', $book->id)
            ->first();
    @endphp
    @if ($promotion != null)
        <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Giảm
            {{ formatNumberPrice($promotion->discount) }}
        </div>
    @endif
    <a href="{{ route('client.detail', ['book' => $book->id]) }}">
        <img src="{{ Storage::url($book->image) }}" class="card-img-top">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">
                <a href="{{ route('client.detail', ['book' => $book->id]) }}"
                    class="text-dark text-decoration-none">{{ $book->name }}</a>
            </h5>
            <p class="card-text flex-grow-1">
                <a href="{{ route('client.detail', ['book' => $book->id]) }}"
                    class="text-muted text-decoration-none">{{ $book->category_name }}</a>
            </p>


            <div class="">
                @if ($reviews_by_book->count() > 0)
                    @php
                        $sumRatings = $reviews_by_book->sum('rating');
                        $averageRating = $sumRatings / $reviews_by_book->count();
                    @endphp
                    <span>
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($averageRating >= $i)
                                <i class="fas fa-star text-warning"></i>
                            @elseif ($averageRating > $i - 1 && $averageRating < $i)
                                <i class="fas fa-star-half-alt text-warning"></i>
                            @else
                                <i class="far fa-star text-warning"></i>
                            @endif
                        @endfor
                    </span>
                @endif
                @if ($promotion != null)
                    @php
                        $currentDate = now();
                        $checkDate = $currentDate->between($promotion->start_date, $promotion->end_date);
                    @endphp
                    @if ($checkDate)
                        <div class="d-flex">
                            <p class="fs-5 text-decoration-line-through py-2">{{ formatNumberPrice($book->price) }}
                            </p>
                            <p class="fs-5 text-danger fw-bold ms-2 py-2">
                                {{ formatNumberPrice($book->price - $promotion->discount) }}
                            </p>
                        </div>
                    @else
                        <p class="h3 py-2">{{ formatNumberPrice($book->price) }}
                        </p>
                    @endif

                @endif

            </div>

            <div class="text-center">
                @component('templates.form', [
                    'method' => 'POST',
                    'action' => route('client.cart.create'),
                    'textButton' => 'Lưu vào giỏ hàng',
                ])
                    @include('templates.input', [
                        'label' => '',
                        'type' => 'hidden',
                        'name' => 'book_id',
                        'value' => $book->id,
                    ])
                @endcomponent
            </div>
        </div>
    </a>
</div>
