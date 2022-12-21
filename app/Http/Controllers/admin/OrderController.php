<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shipping;
use App\Models\Feeship; 
use App\Models\Statistical; 
use App\Models\User; 
class OrderController extends Controller
{
    

    // show all order 
    public function index() {
        $list_orders = Order::get_all_order(); 
        return view('admin.order.all_order', compact('list_orders')); 
    }

    public function change_status(Request $request) {
        $status = $request-> value ; 
        $id = $request-> order_id;
         
        $updated_at = now(); 

        Order::update_status($id, $status, $updated_at);

        if($status == 4) {
           
            $order = Order::getOrder($id);
            $order_detail = OrderDetail::getOrderDetail($id); 
            $qty = 0 ; 
            foreach ($order_detail as $item) {
                $qty += $item-> sales_quantity; 
            }
            $data['id_statistical'] = $id; 
            $data['order_id'] = $id; 
            $data['order_date'] = date('Y-m-d', strtotime($order->created_at));
            $data['sales'] = $order->total_book_price;
            $data['profit'] = $qty*5000; 
            $data['quantity'] = $qty ; 
            $data['total_order'] = $order->total ;
            Statistical::add_statistical($data); 
          

        }
        return $status;         
    }

    public function order_detail(Request $request, $id) {
        $order_id = $id ; 

        $list_books = OrderDetail::get_item_by_order_id($order_id);
        
        $ship = Order::get_shipping_id($order_id);
        $shipping_id = $ship -> shipping_id; 

        $address = Shipping::get_address($shipping_id); 

        $village = $address ->village;

        $fees_ship_id = $address -> fees_ship_id ;
        
        $fees_ship = Feeship::get_feeship_by_id($fees_ship_id);
    
        $shipping['address'] = $village . ', ' . $fees_ship->city_name . ', ' . $fees_ship-> province_name. ', ' . $fees_ship->wards_name ; 
        $shipping['fees_ship'] = $fees_ship -> fees_ship;
        $shipping['notes'] = $address->notes; 
        
        $t = Order::get_user_id($order_id);
        $user_id = $t -> user_id;
        $user = User::getUserById($user_id);

        return view('admin.order.detail_order', compact('order_id', 'list_books', 'shipping', 'user')); 
    }
}
