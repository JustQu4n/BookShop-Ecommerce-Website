@extends('admin_layout')

@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
            Danh mục đơn hàng 
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
              <th>Mã đơn hàng </th>
              <th>Phương thức thanh toán </th>
              <th>Số tiền sản phẩm</th>
              <th>Phí vận chuyển</th>
              <th>Tổng tiền </th>
              <th>Tình trạng đơn hàng</th>
              <th>Ngày đặt hàng</th>
              <th>Ngày cập nhật đơn hàng</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
              @foreach ($list_orders as $item)
              <tr>
                
                <td>{{$item->id}}</td>
                <td>{{$item->payment_name}}</td>
                <td>{{number_format($item->total_book_price).'vnđ'}}</td>
                <td>{{number_format($item->total - $item->total_book_price) . 'vnđ'}}</td>
                <td>{{number_format($item->total).'vnđ'}}</td>
                <td>
                    <select name="status" id="{{$item->id}}" class="status" data-id="{{$item->id}}">
                        <option value="1" {{$item->status == 1 ? 'selected' :false}}>Đặt hàng</option>
                        <option value="2" {{$item->status == 2 ? 'selected' :false}}>Xác nhận đặt hàng</option>
                        <option value="3" {{$item->status == 3 ? 'selected' :false}} >Hàng đã giao cho đơn vị vận chuyển</option>
                        <option value="4" {{$item->status == 4 ? 'selected' :false}}>Đã giao hàng</option>
                        @csrf
                    </select>
                </td>
                <td><span class="text-ellipsis">
                    @php
                        echo date('d-m-Y', strtotime($item->created_at));
                    @endphp
                    </span>
                </td>

                <td>
                    <span class="text-ellipsis">
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
                  <a href="{{route('order.order-detail', ['id' => $item->id])}}" class="active" ui-toggle-class="" >
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
        {!! $list_orders->links() !!}
        </div>
      </div>
    </div>
  </div>
@endsection