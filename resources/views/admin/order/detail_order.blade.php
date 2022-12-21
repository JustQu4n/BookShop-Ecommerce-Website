@extends('admin_layout')

@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
            Chi tiết đơn hàng mã {{$order_id}}
      </div>

      <div class="row w3-res-tb">
        
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
              <th>Book id </th>
              <th>Tên sách</th>
              <th>Số lượng </th>
              <th>Giá sách</th>
              <th>Tổng tiền </th>
            </tr>
          </thead>
          <tbody>
              @foreach ($list_books as $item)
              <tr>
                <td>{{$item->book_id}}</td>
                <td>{{$item->book_name}}</td>
                <td>{{$item->sales_quantity}}</td>
                <td>{{number_format($item->book_price).'vnđ'}}</td>
                <td>{{number_format($item->book_price * $item->sales_quantity) . 'vnđ'}}</td>               
            </tr>
            @endforeach 
            
           
          </tbody>
        </table>
      </div>
    </div>
</div>

<div class="table-agile-info" style="margin-top: 20px; ">
    <div class="panel panel-default">
      <div class="panel-heading">
            Thông tin vận chuyển 
      </div>

      <div class="row w3-res-tb">
        
   
        <div class="col-sm-4">
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>  
              <th>Địa chỉ </th>
              <th>Lưu ý</th>
              <th>Phí vận chuyển </th>
            </tr>
          </thead>
          <tbody>
            
            <tr>
                <td>{{$shipping['address']}}</td>
                <td>{{$shipping['notes']}}</td>
                <td>{{number_format($shipping['fees_ship']) . " VNĐ"}}</td>    
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>

<div class="table-agile-info" style="margin-top: 20px; ">
  <div class="panel panel-default">
    <div class="panel-heading">
          Thông tin tài khoản đặt hàng 
    </div>

    <div class="row w3-res-tb">
      
 
      <div class="col-sm-4">
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>  
            <th>Tên tài khoản</th>
            <th>Email</th>
            <th>Số điện thoại </th>
          </tr>
        </thead>
        <tbody>
          
          <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td> 
              <td>{{$user->phone}}</td>       
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection