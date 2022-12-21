@extends('clients.account.account_layout')

@section('link_account')
    <link rel="stylesheet" href="{{asset('assets/css/order_account.css')}}">
    
@endsection

@section('content_account')
    @foreach ($list_order as $order )
    <div class="infor-order">
        <div class="status-order">
            @switch($order->status)
                @case(1)
                    <i>Tình trạng đơn hàng: <i style="color: red;">Đang chờ xác nhận</i></i>
                  @break
                @case(2)
                    <i>Tình trạng đơn hàng: <i style="color: red;">Đã xác nhận đặt hàng</i></i>
                    @break
                @case(3)
                    <i>Tình trạng đơn hàng: <i style="color: red;">Đã giao hàng cho đơn vị vận chuyển</i></i>
                    
                    @break
                @case(4)
                    <i>Tình trạng đơn hàng: <i style="color: red;">Đã giao hàng</i></i>    
                    @break
            
                @default
                    @break
            @endswitch
            
        </div>
        @foreach ($order->item as $item )
            <div class="infor-detail-order">
                <div class="product">
                    <div class="img">
                        @php
                            $img = $item['img']; 
                        @endphp
                        <img src="{{asset("uploads/books/$img")}}" alt="">

                    </div>

                    <div class="infor">
                        <h4 class="book_name">{{$item['book_name']}}</h4> <br>
                        <span class="book_qty">Số  lượng: {{$item['sales_quantity']}}</span>
                    </div>

                </div>

                <div class="sub-price">
                    <sapn> {{number_format($item['book_price'] * $item['sales_quantity'])}} VNĐ</span>
                </div>
            </div>
        @endforeach

        <div class="total">
            <div>
                <span>  Tổng tiền : <sapn class="money"> {{number_format($order->total)}} VNĐ</sapn></span>
            </div>
        </div>
        
    </div>
    @endforeach

   

   
@endsection