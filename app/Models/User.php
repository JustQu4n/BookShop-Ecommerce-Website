<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Contracts\InstanceIdentifier;
use Cart; 
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements InstanceIdentifier
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'status',
        'token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /** set cart here */

    /**
     * Get the unique identifier to load the Cart from
     *
     * @return int|string
     */
    public function getInstanceIdentifier($options = null)
    {
        return $this->id;
    }

    /**
     * Get the unique identifier to load the Cart from
     *
     * @return int|string
     */
    public function getInstanceGlobalDiscount($options = null)
    {
        return $this->discountRate ?: 0;
    }



    static function getToken($id) {
        $user = DB::table('users') -> where('id', $id) -> select('token')-> first();
        return $user;
    }

    static  function active($id) {
        DB::table('users') -> where('id', $id) -> update(['status' => 1, 'token' => null]); 
    }

    static function getUserByEmail($email) {
        $user = DB::table('users') -> where('email', $email) -> first();
        return $user;
    }

    static function updateToken($id, $token) {
        DB::table('users') -> where('id', $id) -> update(['token' => $token]);
        
    }

    static  function change_password($id, $password) {
        DB::table('users') -> where('id', $id) -> update(['password' => $password]);
    }

    static function authUser($email, $password) {
        $user = DB::table('users')->where('email', $email) -> where('password', $password) -> where('status', 1) -> first() ;
        return $user;
    }

    // get user login with social 
    static  function userSocial($data) {
        $user = DB::table('users')->where($data) -> first();
        return $user; 
    }
    // crete account social users
    static  function create_user_social($data) {
        DB::table('users')-> insert($data);
    }

    static  function getUserById($id) {
        $user = DB::table('users')-> where('id', $id) -> first();
        return $user;
    }

    static  function updateName($id, $name) {
        DB::table('users') -> where('id', $id) -> update($name);
    }

    // get user active 
    static  function getUserActive() {
        $list_user = DB::table('users') -> where('status', 1) -> get(); 
        return $list_user; 
    }

}


