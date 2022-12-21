<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Discount extends Model
{
    use HasFactory;

    static function getDiscount($code, $date) { 
         
        $discount = DB::table('discount') -> select('percent_discount') -> where('code', $code) -> where('status', 1) -> where('date_end','>=', $date)-> first(); 
        return $discount; 
    }

    // get list_discounts
    static  function getListDiscounts() {
        $list_discounts = DB::table('discount') -> get(); 
        return $list_discounts;
    }
    // ad discount
    static  function add($data) {
        $add = DB::table('discount') -> insert($data);
        return $add;
    }

    // delete discount 
    static function remove($id) {
        $remove = DB::table('discount') -> where('id', $id)->delete();
        return $remove; 
    }

    // d
    static function getDiscountByID($id) {
        $discount = DB::table('discount')->where('id', $id) ->  first();
        return $discount;
    }

    // update discount
    static function updateDiscount($id, $data) {
            $update = DB::table('discount') ->  where('id', $id) -> update($data);
            return $update; 
    }

    // active discount 
    static  function active($id) {
        $active = DB::table('discount') -> where('id', $id) -> update(['status' => 1]);
        return $active;
    }

    static  function unActive($id) {
        $unActive = DB::table('discount') -> where('id', $id) -> update(['status' => 0]);
        return $unActive;
    }




}
