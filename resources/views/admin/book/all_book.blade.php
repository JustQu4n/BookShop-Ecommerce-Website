@extends('admin_layout')

@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
            Danh mục sách 
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
             
              <th>Tên sách </th>
              <th>Tác giả </th>
              <th>Hình ảnh</th>
              <th>Giá</th>
              <th>Mô tả sách </th>
              <th>Thương hiệu</th>
              <th>Danh mục</th>
              <th>Hiển thị</th>
              <th>Ngày thêm</th>
              <th>Ngày cập nhật</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list_books as $item)
              <tr>
                
                <td>{{$item->name}}</td>
                <td>{{$item->author}}</td>
                <td><img src="{{asset("uploads/books/$item->image")}}" alt="" style="width:100px; "></td>
                <td>{{number_format($item->price).'vnđ'}}</td>
                <td>{!! $item->description !!}</td>
                <td>{{$item->brand_name}}</td>
                <td>{{$item->category_name}}</td>
                <td><span class="text-ellipsis">
                        @if ($item->status ==1)
                            <a href="{{route('book.unactive', ['id' => $item->id])}}"><sapn class="">Hiện</sapn></a>
                        @else 
                            <a href="{{route('book.active', ['id' => $item->id])}}"><sapn>Ẩn</sapn></a>
                        @endif

                    </span>
                </td>
                <td><span class="text-ellipsis">
                    @php
                        echo date('d-m-Y', strtotime($item->created_at));
                    @endphp
                    </span>
                </td>

                <td><span class="text-ellipsis">
                  @php
                      $up = date('d-m-Y', strtotime($item->updated_at));
                      $date1 = strtotime($up);
                      $date2 = strtotime('1970-01-01'); 
                      if ($date1  > $date2) {
                         echo $up;
                      } else {
                        
                      }                 
                  @endphp
                  </span>
                </td>
                <td>
                  <a href="{{route('book.update', ['id' => $item->id])}}" class="active" ui-toggle-class="" >
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a href="{{route('book.delete', ['id' => $item->id])}}"  class="active" ui-toggle-class="">
                     <i class="fa fa-times text-danger text"></i>
                  </a>
                </td>
            </tr>
            @endforeach
            
           
          </tbody>
        </table>
        <div class="d-flex justify-content-center" >
        {!! $list_books->links() !!}
        </div>
      </div>
    </div>
  </div>
@endsection