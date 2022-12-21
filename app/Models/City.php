<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class City extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'city_name', 'type'
    ];
    protected $primaryKey = 'city_id';
    protected $table = 'city';
    
    static  function getName($id) {
        $city_name = DB::table('city') -> where('city_id', $id)-> select('city_name') -> first();
        return $city_name;
    }
}
