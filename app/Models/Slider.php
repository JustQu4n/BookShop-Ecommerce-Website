<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'name', 'image','status',
    ];
    protected $primaryKey = 'id';
 	protected $table = 'slider';
}
