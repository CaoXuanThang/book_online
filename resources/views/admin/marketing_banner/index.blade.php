@extends('admin.layout')
@section('title', 'Banner')
@section('content')

<h2>Danh sách banner</h2>
<a href="{{route('admin.marketing_banner.create')}}" class="btn btn-primary">Tạo mới</a>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead class="thead-dark">
      <tr class="bg-success text-white">
        <th scope="col">#</th>
        <th scope="col">Tiêu đề</th>
        <th scope="col">Mô tả ngắn</th>
        <th scope="col">Hình ảnh</th>
        <th scope="col">Sản phẩm</th>
        <th scope="col">Hành động</th>
      </tr>
    </thead>
  
    <tbody>
      @foreach ($marketing_banners as $key => $marketing_banner)
      <tr>
        <td scope="row">{{$marketing_banner->id}}</td>
        <td>{{$marketing_banner->name}}</td>
        <td>{{$marketing_banner->description}}</td>
        <td><img src="{{Storage::url($marketing_banner->image)}}" width="100" alt=""></td>
        <td>{{$marketing_banner->phone_name}}</td>
        <td>
          <a href="{{route('admin.marketing_banner.edit',['marketing_banner'=>$marketing_banner->id])}}" class="btn btn-primary">Sửa</a>
          <a href="{{route('admin.marketing_banner.delete',['marketing_banner'=>$marketing_banner->id])}}" class="btn btn-danger">Xóa</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  
    
    </tbody>
  </table>
</div>
@endsection