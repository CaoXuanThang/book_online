@extends('admin.layout')
@section('title', 'Tác giả')
    
@section('content')

<h2>Danh sách Tác giả</h2>
<a href="{{route('admin.brand.create')}}" class="btn btn-primary">Thêm</a>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Tên</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($brands as $key => $brand)          
      <tr>
        <td>{{$brand->id}}</td>
        <td>{{$brand->name}}</td>
        <td><img width="100" src="{{Storage::url($brand->image)}}" alt="{{$brand->name}}"></td>
        <td>
          <a href="{{route('admin.brand.edit',['brand'=>$brand->id])}}" class="btn btn-primary">Sửa</a>
          <a href="{{route('admin.brand.delete',['brand'=>$brand->id])}}" class="btn btn-danger">Xóa</a>
        </td>
      </tr>

      @endforeach
      <tr>
        <td colspan="4">
          {{ $brands->links('custom.pagination')}}
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection