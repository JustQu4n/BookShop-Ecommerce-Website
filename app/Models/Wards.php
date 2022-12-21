<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Wards extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'wards_name', 'type', 'province_id'
    ];
    protected $primaryKey = 'wards_id';
    protected $table = 'wards';

    static function getName($id) {
        $wards_name = DB::table('wards') -> where('wards_id', $id) -> select('wards_name') -> first();
        return $wards_name;
    }
}
