<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

  <title>Đăng nhập</title>
</head>

<body>

  <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">

    <div class="col-md-4 p-5 shadow-sm border rounded-3">
      <h2 class="text-center mb-4">Đăng nhập</h2>
      @component('templates.form', ['method' => 'POST', 'action' => route('login'),'textButton' => 'Đăng nhập'])
      @include('templates.error')

      @include('templates.input', ['label' => 'Email', 'type' => 'email', 'name' => 'email','value'
      => old('email')])
      @include('templates.input', ['label' => 'Password', 'type' => 'password', 'name' =>
      'password','value' => old('password')])
      <div class="mt-3 text-center">
        <p>Bạn chưa có tài khoản? <a href="{{route('register')}}">Đăng ký</a></p>
      </div>
      @endcomponent
    </div>

  </div>

  <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>