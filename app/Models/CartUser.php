<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CartUser extends Model
{
    use HasFactory;
    static function add($data) {
        $add = DB::table('cart') -> insert($data);
        return $add; 
    }
     // add when exit 
     static function addExit($id, $qty) {
        $add = DB::table('cart') -> where('id', $id) -> update(['qty' => $qty]);
    }

    static function updateCart($id, $qty) {
        $update = DB::table('cart') -> where('id', $id) ->update(['qty' =>$qty]);
    }

    static function getItemInCart($user_id) {
        $list_items = DB::table('cart') -> leftJoin('book', 'cart.book_id', '=', 'book.id')-> where('user_id', $user_id) -> get();
        return $list_items;
    }

    static function getItem($user_id, $book_id) {
        $items = DB::table('cart') -> where('user_id', $user_id) -> where('book_id', $book_id) -> first();
        return $items;
    }

    // remove
    static function remove($user_id, $book_id) {
        $remove = DB::table('cart') -> where('user_id', $user_id) -> where('book_id', $book_id) ->delete();
    }   

    static  function remove_user_id($id) {
        $remove = DB::table('cart') -> where('user_id', $id) ->delete();

    }
}
