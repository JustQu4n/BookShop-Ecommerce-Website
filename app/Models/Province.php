<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Province extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'province_name', 'type', 'city_id'
    ];
    protected $primaryKey = 'province_id';
    protected $table = 'province';

    static  function getName($id) {
        $province_name = DB::table('province') -> select('province_name') -> where('province_id',$id) -> first();
        return $province_name;
    }
}
