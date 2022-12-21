@extends('admin_layout')

@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Tất cả sự kiện
      </div> 
      <div class="row w3-res-tb">
        <div class="my-3">  
          @php
            $msg = request()->session()->get('msg');
          @endphp
      
          @if ($msg)
              <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong>Thành công!</strong> {{$msg}}.
              </div>
              @php
                  request()->session()->put('msg', null);
              @endphp
          @endif
        </div>
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>  
              <th>ID</th>        
              <th>Tên bài viết</th>
              <th>Hình ảnh</th>
              <th>Tác giả</th>
              <th>Ngày thêm</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list_blog as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td><img src="{{asset("uploads/blogs/$item->image")}}" alt="" style="width:100px; "></td>
                <td>{{$item->author}}</td>
                <td> {{$item->create_at}}</td>
                
                
                <td>
                  <a href="{{route('blog.update', ['id' => $item->id])}}" class="active" ui-toggle-class="" >
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a href="{{route('blog.delete', ['id' => $item->id])}}"  class="active" ui-toggle-class="">
                     <i class="fa fa-times text-danger text"></i>
                  </a>
                </td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
   
    </div>
  </div>
@endsection