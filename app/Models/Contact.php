<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    use HasFactory;

    static function addFeedBack($data) {
        $add = DB::table('contact') -> insert($data);
        return $add;
    }

    static  function getAllFeedBack() {
        $list_feedBack = DB::table('contact') -> get();
        return $list_feedBack;
    }

    // active 
    static  function active($id) {
        $active = DB::table('contact') -> where('id', $id)-> update(['status' => 1]);
        return $active;
    }
    static  function unActive($id) {
        $active = DB::table('contact') -> where('id', $id)-> update(['status' => 0]);
        return $active;
    }

    static  function removeFeedBack($id) {
        $active = DB::table('contact') -> where('id', $id)-> delete();
        return $active;
    }

}
