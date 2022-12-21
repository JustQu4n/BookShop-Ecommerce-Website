<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shipping extends Model
{
    use HasFactory;

    static function insert_shipping($data) {
        $id = DB::table('shipping') -> insertGetID($data);
        return $id ;
    }

    static  function get_address($id) {
        $address = DB::table('shipping') 
                -> where('shipping.id', $id)
                -> leftJoin('fees_ship', 'shipping.fees_ship_id', '=', 'fees_ship.id')
                -> select('shipping.*') 
                -> first();
        return $address ; 
    }
}
