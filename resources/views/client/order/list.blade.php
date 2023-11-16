@extends('client.layout.layout')
@section('title', 'Trang hóa đơn')
@section('content')
<div class="container-fluid py-5">
  <div class="text-center fs-2 fw-bold">Hóa đơn</div>
  <table class="table table-bordered table-hover">
    <thead class="thead-dark">
      <tr class="bg-success text-white">
        <th scope="col">#</th>
        <th scope="col">Tên người nhận</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Tổng</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
  
    <tbody>
      @foreach ($orders as $key => $order)
      <tr>
        <th scope="row">{{$order->id}}</th>
        <td>{{$order->name}}</td>
        <td>{{$order->phone}}</td>  
        <td>{{$order->address}}</td>
        <td>{{$order->total_amount}}</td>
        <td>
          @if ($order->status == 0)
            <span class="badge bg-warning">Đang giao</span>
            @elseif ($order->status == 1)
              <span class="badge bg-success">Đã Giao</span>
          @else
            <span class="badge bg-danger">Thất bại</span>     
          @endif
        </td>
        <td>
          <a href="{{route('client.order.detail',$order->id)}}">Xem</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  
   
  </table>
</div>
@endsection