<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Feeship extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'city_id', 'province_id', 'wards_id', 'fees_ship'
    ];
    protected $primaryKey = 'id';
    protected $table = 'fees_ship';

    public function city() {
        return $this->belongsTo('App\Models\City', 'city_id');
    }
    public function province() {
        return $this->belongsTo('App\Models\Province', 'province_id');
    }
    public function wards() {
        return $this->belongsTo('App\Models\Wards', 'wards_id');
    }

    static  function getFeeship($data) {
        $id = DB::table('fees_ship') 
            -> where('city_id', $data['city']) 
            -> where('province_id', $data['province']) 
            -> where('wards_id', $data['wards'])
            -> select('fees_ship', 'id')
            -> first();
        return $id; 
    }

    static function get_feeship_by_id($id) {
        $id = DB::table('fees_ship') 
            -> where('fees_ship.id', $id) 
            -> leftJoin('wards', 'fees_ship.wards_id', '=', 'wards.wards_id')
            -> leftJoin('province', 'fees_ship.province_id', '=', 'province.province_id')
            -> leftJoin('city', 'fees_ship.city_id', '=', 'city.city_id')
            -> select('city.city_name', 'province.province_name', 'wards.wards_name', 'fees_ship.*', )
            -> first();
        return $id; 
    }


}
