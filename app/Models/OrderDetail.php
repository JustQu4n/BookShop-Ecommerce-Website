<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderDetail extends Model
{
    use HasFactory;

    static  function insert_order_detail($data) {
        DB::table('order_detail') -> insert($data);
    }

    static  function get_item_by_order_id($order_id) {
        $list_book = DB::table('order_detail') -> where('order_id', $order_id) -> get();
        return $list_book; 
    }

    static  function getUserByOrderId($order_id) {
        $list = DB::table('order_detail') -> where('order_id', $order_id) -> get(); 
        return $list;
    }

    static  function getOrderDetail($order_id) {
        $order_detail = DB::table('order_detail') -> where('order_id', $order_id) -> get();
        return $order_detail;
    }

    static  function getBestSelling() {
        $list_book = DB::table('order_detail') 
                    -> selectRaw('count(book_id) as qty, book_id')
                    -> groupBy('book_id')
                    -> orderBy('qty', 'DESC')
                    -> limit(10)
                    -> get();
        return $list_book; 
    }

   
}
