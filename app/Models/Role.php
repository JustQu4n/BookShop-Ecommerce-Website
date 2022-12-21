<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
     'name',
    ];
    protected $primaryKey = 'id_role';
    protected $table = 'tbl_role';
    public function admin(){
        return $this->belongsToMany('App\Models\Admin');
    }
}
