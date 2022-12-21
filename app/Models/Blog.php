<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Blog extends Model
{
    use HasFactory;
    
    static function getBlog($id){
        $blog = DB::table('blog') -> where('id', $id) ->  first(); 
        return $blog;
    }
    static function getdetailBlog($id){
        $blogdetail = DB::table('blog') -> where('id', $id) -> get(); 
        return $blogdetail;
    }
    static  function getListBlog() {
        $list_blog = DB::table('blog') -> get();
        return $list_blog;
    }
    static  function getNameImage($id) {
        $nameImage = DB::table('blog') -> where('id', $id) -> select('image') -> first();
        return $nameImage;
    }
    static  function addBlog($data) {
        $add = DB::table('blog') -> insert($data);
        return $add;
    }
    // remove event 
    static function removeBlog($id) {
        $del = DB::table('blog') -> where('id', $id) -> delete();
        return $del;
    }

    // update event 
    static  function editBlog($data, $id) {
        $edit = DB::table('blog') -> where('id', $id) -> update($data); 
        return $edit;
    }

}
