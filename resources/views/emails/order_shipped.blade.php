<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Cảm ơn bạn đã đặt hàng!</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>

    <div class="container">
      <div class="text-center pt-5 pb-3">
        <h1 class="display-4 text-success">Cảm ơn bạn!</h1>
        <p class="lead">Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi.</p>
        <hr class="my-4">
      </div>

      <div class="row">
        <div class="col-lg-6 mx-auto">
        
          <p>Xin chào {{ $name }},</p>
          
          <p>Chúng tôi rất vui vì bạn đã lựa chọn sản phẩm của chúng tôi. Đơn hàng #{{ $order->id }} của bạn đã được xác nhận.</p>

          <p>Chúng tôi sẽ sớm giao hàng tới địa chỉ của bạn.</p>

          <p class="mb-4">Nếu bạn có bất kỳ thắc mắc gì về đơn hàng, vui lòng liên hệ với chúng tôi.</p>

        </div>
      </div>

      <div class="container-fluid py-5">
        <div class="text-center fs-2 fw-bold">Hóa đơn chi tiết</div>
        <table class="table table-bordered table-hover">
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
        </table>
      </div>
      
    </div>

  </body>
</html>