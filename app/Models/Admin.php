<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Admin extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
     'admin_email','admin_password','admin_phone','admin_image'
    ];
    protected $primaryKey = 'admin_id';
    protected $table = 'admin';
    public function role(){
        return $this->belongsToMany('App\Models\Role');
    }
    public function getAuthPassword()
    {
        return $this->admin_password;
    }
    public function hasAnyRoles($roles){

        if(is_array($roles)){
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }else{
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }
    public function hasRole($role){
        if($this->role()->where('name',$role)->first()){
            return true;
        }
        return false;
    }

}
