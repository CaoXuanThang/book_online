@extends('admin.layout')
@section('title', 'Hóa đơn')
@section('content')

<h2>Danh sách hóa đơn</h2>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">id</th>
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
          @component('templates.form', ['method' => 'POST','formClass' => 'myForm',
          'action'=>route('admin.invoice.update',$order->id),'textButton' => 'Sửa','buttonClass' =>
          'd-none'])
          <select name="status" >
            @if ($order->status == 1 || $order->status == 2)
            <option disabled value="0" {{$order->status == 0 ? 'selected' : ''}}>Đang giao</option>
            <option disabled value="1" {{$order->status == 1 ? 'selected' : ''}}>Đã Giao</option>
            <option disabled value="2" {{$order->status == 2 ? 'selected' : ''}}>Hủy</option>
            @else
            <option value="0" {{$order->status == 0 ? 'selected' : ''}}>Đang giao</option>
            <option value="1" {{$order->status == 1 ? 'selected' : ''}}>Đã Giao</option>
            <option value="2" {{$order->status == 2 ? 'selected' : ''}}>Hủy</option>
            @endif

          </select>
          @endcomponent
        </td>
        <td>
          <a href="{{route('admin.invoice.detail',$order->id)}}">Xem</a>
        </td>
      </tr>
      @endforeach
      <tr>
        <td colspan="9999">
          {{ $orders->links('custom.pagination')}}
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
@section('scripts')
<script>
const forms = document.querySelectorAll('.myForm');

// Lặp qua mỗi form
forms.forEach(form => {

  // Lấy select trong form
  const select = form.querySelector('select');

  // Lắng nghe change
  select.addEventListener('change', () => {
    form.submit();
  });
});
</script>
@endsection