<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    // get all orderB

    static function getAllOrder() {
        $all = DB::table('order') -> get();
        return $all;
    }

    static function insert_order($data){
        $id = DB::table('order') -> insertGetID($data);
        return $id; 
    }

    static  function get_all_order() {
        $list_orders = DB::table('order') -> leftJoin('payment', 'order.payment_id', '=', 'payment.id')
                     -> select('order.*', 'payment.payment_name')
                     -> orderBy('order.created_at', 'DESC')
                     -> paginate(10)
                     -> withQueryString();
        return $list_orders;
    }

    static  function update_status($id, $status, $updated_at) {
        DB::table('order') -> where('id', $id) -> update(['status' => $status, 'updated_at' => $updated_at]);

    }

    static function get_shipping_id($id) {
        $id = DB::table('order') -> where('id', $id) -> select('shipping_id') -> first();
        return $id; 
    }

    static  function get_user_id($order_id) {
        $user_id = DB::table('order') -> where('id', $order_id) -> select('user_id') -> first();
        return $user_id;
    }

    static  function getOrderUserId($user_id) {
        $list_order = DB::table('order') -> where('user_id', $user_id) -> orderBy('created_at', 'DESC') -> get();
        return $list_order; 
    }

    static  function getOrder($order_id) {
        $order =  DB::table('order') -> where('id', $order_id) -> first();
        return $order ; 
    }

    
}
