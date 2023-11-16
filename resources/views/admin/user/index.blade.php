@extends('admin.layout')
@section('title', 'Trang người dùng')
@section('content')

<h2>Danh sách người dùng</h2>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Tên</th>
        <th scope="col">Email</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Quyền</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $key => $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td><img width="100" src="{{Storage::url($user->avatar)}}" alt="{{$user->name}}"></td>
        <td>{{$user->role == 0?"người dùng":"admin"}}</td>
      </tr>
      @endforeach
      <tr>
        <td colspan="999">
          {{$users->links('custom.pagination')}}
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection