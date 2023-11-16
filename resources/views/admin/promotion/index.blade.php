@extends('admin.layout')
@section('title', 'Giảm giá')
@section('content')

<h2>Danh sách giảm giá</h2>
<a href="{{route('admin.promotion.create')}}" class="btn btn-primary">Thêm</a>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Giảm</th>
        <th scope="col">Ngày bắt đầu</th>
        <th scope="col">Ngày kết thúc</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($promotions as $key => $promotion)
      <tr>
        <td>{{$promotion->id}}</td>
        <td>{{formatNumberPrice($promotion->discount)}}</td>
        <td>{{formatDate($promotion->start_date)}}</td>
        <td>{{formatDate($promotion->end_date)}}</td>
        <td>
          <a href="{{route('admin.promotion.edit',['promotion'=>$promotion->id])}}" class="btn btn-primary">Sửa</a>
          <a href="{{route('admin.promotion.delete',['promotion'=>$promotion->id])}}" class="btn btn-danger">Xóa</a>
        </td>
      </tr>
      @endforeach
      <tr>
        <td colspan="7">
          {{$promotions->links('custom.pagination')}}
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection