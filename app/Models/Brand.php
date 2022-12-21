<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{
    use HasFactory;

    public function getListBrands(){
        $list = DB::table('brand') -> orderBy('id', 'ASC')-> get();
        return $list;
    }

    public function getBrand($id) {
        $brand = DB::table('brand')-> where('id', $id) -> first();
        return $brand;
    }
    public function addBrand($data) {
        $add = DB::table('brand') -> insert($data);
        return $add;
    }

    static  function getBrandName($id) {
        $name = DB::table('brand') -> select('name') -> where('id', $id) -> first();
        return $name;
    }

    
    // delete 
    public function remove($id) {
        $remove = DB::table('brand') -> where('id', $id) -> delete();
        return $remove;
    }
    public function edit($data,$id) {
        $update = DB::table('brand') -> where('id', $id) -> update($data);
        return $update;
    }

    // active and unactive
    public function active($id) {
        $active = DB::table('brand') -> where('id', $id) -> update(['status' => 1]);
        return $active;

    }
    public function unactive($id) {
        $unactive = DB::table('brand') -> where('id', $id) -> update(['status' => 0]);
        return $unactive;

    }


}
