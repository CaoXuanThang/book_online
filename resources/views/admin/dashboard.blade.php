@extends('admin.layout')
@section('title', 'Dashboard')
@section('content')

<div class="container">
  <div class="row">

    <div class="col-md-3">
      <div class="card text-center">
        <div class="card-body">
          <i class="bi bi-cart-plus"></i>
          <h3 class="fs-5">Tổng sản phẩm</h3>
          <h2 class="card-text text-xxl text-primary fw-bold">{{$count_phones}}</h2>
        </div>
      </div>
    </div>
  
    <div class="col-md-3">
      <div class="card text-center">
        <div class="card-body">
          <i class="bi bi-currency-dollar"></i>
          <h3 class="fs-5">Tổng doanh thu</h3>  
          <h2 class="card-text text-xxl text-success fw-bold">{{$sum_invoices}}</h2>
        </div>
      </div>
    </div>
  
    <div class="col-md-3">
      <div class="card text-center">
        <div class="card-body">
          <i class="bi bi-truck"></i>
          <h3 class="fs-5">Đơn hàng đã giao</h3>
          <h2 class="card-text text-xxl text-primary fw-bold">{{$order_delivered}}</h2>
        </div>
      </div>
    </div>
  
    <div class="col-md-3">
      <div class="card text-center">
        <div class="card-body">
          <i class="bi bi-hourglass-split"></i>
          <h3 class="fs-5">Đơn hàng chờ giao</h3>
          <h2 class="card-text text-xxl text-success fw-bold">{{$order_pending}}</h2>
        </div>
      </div>
    </div>
  
  </div>
</div>
<h3 class="my-5">Doanh thu trong tuần</h3>
<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>


@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"
integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG"
crossorigin="anonymous"></script>
{{-- <script src="{{asset('js/dashboard.js')}}"></script> --}}
<script>

  var ctx = document.getElementById("myChart").getContext('2d');

  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!! json_encode($invoices->pluck('date')) !!},
        datasets: [{
            label: 'Doanh thu',
            data: {!! json_encode($invoices->pluck('sum')) !!},
        }]
    }
  });

</script>
@endsection