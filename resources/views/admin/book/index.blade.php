@extends('admin.layout')
@section('title', 'Sách')
@section('content')

<h2>Danh sách </h2>
<a href="{{route('admin.book.create')}}" class="btn btn-primary">Thêm</a>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Danh mục</th>
        <th scope="col">Tác Giả</th>
        <th scope="col">Mã Phiếu giảm</th>
        <th scope="col">Tên</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Giá</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($books as $key => $book)
      <tr>
        <td>{{$book->id}}</td>
        <td>{{$book->category_name}}</td>
        <td>{{$book->brand_name}}</td>
        <td>{{$book->promotion_id ?? "Không có"}}</td>
        <td>{{$book->name}}</td>
        <td><img src="{{$book->image ?''.Storage::url($book->image):''}}" alt="" width="100" height="100"></td>
        <td>{{$book->price}}</td>
        <td>{{$book->quantity}}</td>
        <td>
          <a href="{{route('admin.book.edit',['book'=>$book->id])}}" class="btn btn-primary">Sửa</a>
          <a href="{{route('admin.book.delete',['book'=>$book->id])}}" class="btn btn-danger">Xóa</a>
        </td>
      </tr>
      @endforeach
      <tr>
        <td colspan="7">
          {{$books->links('custom.pagination')}}
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection