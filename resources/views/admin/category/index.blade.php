@extends('admin.layout')
@section('title', 'Danh mục')

@section('content')

<h2>Danh sách danh mục</h2>
<a href="{{route('admin.category.create')}}" class="btn btn-primary">Thêm</a>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Tên</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $key => $category)          
      <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>
          <a href="{{route('admin.category.edit',['category'=>$category->id])}}" class="btn btn-primary">Sửa</a>
          <a href="{{route('admin.category.delete',['category'=>$category->id])}}" class="btn btn-danger">Xóa</a>
        </td>
      </tr>
      @endforeach
      <tr>
        <td colspan="9999">
          {{ $categories->links('custom.pagination')}}
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection