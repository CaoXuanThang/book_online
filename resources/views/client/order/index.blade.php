@extends('client.layout.layout')
@section('title', 'Trang hóa đơn')
@section('content')

<div class="container py-5">
  <div class="row">
    <div class="col-md-8">
    

      <table class="table">
        <thead>
          <tr>
            <th>Sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
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
          <tr>
            <td>{{ $item['name'] }}</td>
            <td> <img src="{{ Storage::url($item['image']) }}" alt="{{ $item['name'] }}"
                width="100"> </td>
            <td>{{ formatNumberPrice($item['price'] - intval($item['discount'])) }}</td>
            <td>{{$item['quantity']}}</td>
            <td>{{ formatNumberPrice(($item['price'] - intval($item['discount'])) * $item['quantity']) }}</td>
          

          </tr>
          @endforeach

          @endif

        </tbody>
      </table>
    
    </div>

    <div class="col-md-4">
      @component('templates.form', ['method' => 'POST', 'action' =>
      route('client.order.create'),'textButton' => 'Đặt hàng','buttonClass' =>
      'btn-success'])
      @include('templates.input', ['label' => '', 'type' => 'hidden', 'name' => 'total_amount','value' => $total])
      @include('templates.input', ['label' => 'Tên', 'type' => 'text', 'name' => 'name','value' => old('name')])
      @include('templates.input', ['label' => 'Số điện thoại', 'type' => 'text', 'name' => 'phone','value' => old('phone')])
      @include('templates.input', ['label' => 'Địa chỉ', 'type' => 'text', 'name' => 'address','value' => old('address')])
      @endcomponent
    </div>
  </div>
</div>
@endsection