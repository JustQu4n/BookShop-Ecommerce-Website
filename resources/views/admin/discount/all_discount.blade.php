@extends('admin_layout')

@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
            Tất cả các mã giảm giá
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
             
              <th>Mã code </th>
              <th>Phần trăm giảm giá</th>
              <th>Ngày hết hạn</th>
              <th>Hiệu lực</th>
              <th>Ngày thêm</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list_discounts as $item)
              <tr>
                
                <td>{{$item->code}}</td>
                <td>{{$item->percent_discount . "%"}}</td>
                <td>{{date('d-m-Y', strtotime($item->date_end))}}</td>
                <td>
                        @if ($item->status ==1)
                            <a href="{{route('discount.unactive', ['id' => $item->id])}}"><sapn class="">Có</sapn></a>
                        @else 
                            <a href="{{route('discount.active', ['id' => $item->id])}}"><sapn>Không</sapn></a>
                        @endif

                    </span>
                </td>
                <td>
                   <span class="text-ellipsis">
                      @php
                          echo date('d-m-Y', strtotime($item->created_at));
                      @endphp
                    </span>
                </td>

                <td>
                  <a href="{{route('discount.update', ['id' => $item->id])}}" class="active" ui-toggle-class="" >
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a href="{{route('discount.delete', ['id' => $item->id])}}"  class="active" ui-toggle-class="">
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
  </div>
@endsection