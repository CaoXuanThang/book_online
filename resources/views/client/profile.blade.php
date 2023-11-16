@extends('client.layout.layout')
@section('title', 'Trang thông tin người dùng')
@section('css')

@endsection
@section('content')

<!-- Open Content -->
<div class="container my-4">

  <!-- Section: Profile -->
  <section class="profile">
    <div class="">
      @component('templates.form', ['formClass' => 'row','method' => 'POST', 'action' => route('client.profile.update'),'enctype' =>"multipart/form-data",'buttonClass' => 'd-none','textButton' => 'Lưu'])
      <div class="col-lg-4 mb-5 mb-lg-0">

        <!-- Avatar -->
        <div class="avatar mx-auto mb-3">
          <img src="{{ Storage::url($user->avatar) }}" class="rounded-circle img-fluid"
            alt="Avatar">
        </div>

        <!-- User meta -->
        <div class="user-meta text-center">
          <h5 class="name mb-0">{{ $user->name }}</h5>
          @include('templates.input', ['type' => 'file', 'name' => 'avatar','labelNone'=> true])
        </div>

      </div>

      <div class="col-lg-8">

        <!-- Profile form -->
        <form>

          <!-- Details -->
          <div class="section bg-white p-3 mb-4 rounded-3">

            <h6 class="title mb-4">Thông tin chi tiết</h6>

            @include('templates.input', ['type' => 'text', 'name' => 'name', 'value' => $user->name,
            'label' => 'Họ tên'])
            @include('templates.input', ['type' => 'text', 'name' => 'email', 'value' =>
            $user->email, 'label' => 'email','attb' => 'disabled'])
            @include('templates.input', ['type' => 'text', 'name' => 'role', 'value' =>
            $user->role==0?"thành viên":"admin", 'label' => 'Truy cập','attb' => 'disabled'])




          </div>



          <!-- Button -->
          <button type="submit" class="btn btn-primary">Save</button>

        </form>

      </div>
      @endcomponent 

    </div>
  </section>

</div>
@endsection
@section('script_footer')
@endsection