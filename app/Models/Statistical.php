<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Statistical extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'order_date', 'sales', 'profit', 'quantity', 'total_order', 'order_id'
    ];
    protected $primaryKey = 'id_statistical';
    protected $table = 'statistical';

    static function add_statistical($data) {
        DB::table('statistical') -> insert($data);
    }
}
