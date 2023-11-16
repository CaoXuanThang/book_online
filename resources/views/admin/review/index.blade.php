@extends('admin.layout')
@section('title', 'Đánh giá')
@section('content')

<h2>Danh sách đánh giá</h2>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Người bình luận</th>
        <th scope="col">Bình luận</th>
        <th scope="col">Đánh giá</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($reviews as $key => $review)
      <tr>
        <td>{{$review->id}}</td>
   
        <td>{{$review->phone_name}}</td>
        <td>{{$review->user_name}}</td>
        <td>{{$review->comment}}</td>
        <td>{{$review->rating}}</td>
        <td>
          <a href="{{route('client.detail', ['book' => $review->book_id])}}" class="btn btn-primary">Đi đến trang</a>
        </td>
      </tr>
      @endforeach
      <tr>
        <td colspan="7">
          {{$reviews->links('custom.pagination')}}
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection