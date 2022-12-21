<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    public function getListCategories(){
        $list = DB::table('category') -> orderBy('id', 'ASC')-> get();
        return $list;
    }
    public function getCategory($id) {
        $category = DB::table('category')-> where('id', $id) ->  first();
        return $category;
    }
    static  function getFirstCategory() {
        $id = DB::table('category')-> select('id', 'name') -> orderBy('id', 'ASC')-> first();
        return $id;
    }
    static  function getCategoryName($id) {
        $name = DB::table('category')-> select('name') -> where('id', $id)-> first();
        return $name ; 
    }

    public function addCategory($data) {
        $add = DB::table('category') -> insert($data);
        return $add;
    }

    public function remove($id) {
        $remove = DB::table('category') -> where('id', $id) -> delete();
        return $remove;
    }
    public function edit($data,$id) {
        $update = DB::table('category') -> where('id', $id) -> update($data);
        return $update;
    }

    // active and unactive
    public function active($id) {
        $active = DB::table('category') -> where('id', $id) -> update(['status' => 1]);
        return $active;

    }
    public function unactive($id) {
        $unactive = DB::table('category') -> where('id', $id) -> update(['status' => 0]);
        return $unactive;

    }
}
