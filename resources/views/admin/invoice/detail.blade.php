@extends('admin.layout')
@section('title', 'Hóa đơn')
@section('content')

<h2>Danh sách danh mục</h2>
<a href="{{route('admin.invoice.index')}}" class="btn btn-primary">Trở về</a>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead class="thead-dark">
      <tr class="bg-success text-white">
        <th scope="col">#</th>
        <th scope="col">Sản phẩm</th>
        <th scope="col">Giá</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Tổng</th>
      </tr>
    </thead>
  
    <tbody>
      @foreach ($order_details as $key => $order_detail)
      <tr>
        <td scope="row">{{$order_detail->id}}</td>
        <td>{{$order_detail->book->name}}</td>
        <td>{{$order_detail->price}}</td>
        <td>{{$order_detail->quantity}}</td>
        <td>{{formatNumberPrice($order_detail->total)}}</td>
      </tr>
      @endforeach
    </tbody>
  
    <tfoot>
      <tr class="bg-success text-white">
        <th colspan="4" class="text-right">Tổng tiền:</th>
        <td>{{formatNumberPrice($order->total_amount)}}</td> 
      </tr>
    </tfoot>
    </tbody>
  </table>
</div>
@endsection