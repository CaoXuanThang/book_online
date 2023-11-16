@extends('client.layout.layout')
@section('title', 'Trang giỏ hàng')
@section('content')

    <div class="container py-5">
        <div class="row">
            <div class="col-md-8">
                @component('templates.form', [
                    'method' => 'POST',
                    'action' => route('client.cart.update'),
                    'textButton' => 'Cập nhật giỏ hàng',
                    'buttonClass' => 'btn-success',
                ])
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (!empty(session('cart')))
                                @php
                                    $total = 0;
                                @endphp
                                @foreach (session('cart') as $key => $item)
                                    @php
                                        $total += ($item['price'] - intval($item['discount'])) * $item['quantity'];
                                    @endphp
                                    <input type="hidden" name="book_ids[]" value="{{ $key }}">
                                    <tr>
                                        <td>{{ $item['name'] }}</td>
                                        <td> <img src="{{ Storage::url($item['image']) }}" alt="{{ $item['name'] }}"
                                                width="100"> </td>
                                        <td>{{ formatNumberPrice($item['price'] - intval($item['discount'])) }}</td>
                                        <td><input class="form-control" type="number" name="quantities[]"
                                                value="{{ $item['quantity'] }}" min="1" id=""></td>
                                        <td>{{ formatNumberPrice(($item['price'] - intval($item['discount'])) * $item['quantity']) }}
                                        </td>
                                        <td>

                                            <a href="{{ route('client.detail', $key) }}" class="btn btn-success"><i
                                                    class="fa-solid fa-eye"></i></a>
                                            <a href="{{ route('client.cart.delete', $key) }}" class="btn btn-danger"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                    <a href="{{ route('client.cart.deleteAll') }}" class="btn btn-danger">Xóa tất cả</a>
                @endcomponent

            </div>

            <div class="col-md-4">

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tổng cộng</span>
                        <strong>{{ formatNumberPrice($total ?? 0) }}</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <a href="{{ route('client.order.index') }}" class="btn btn-success">Chuyển sang trang đặt
                            hàng</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
@endsection
