<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class UserController extends Controller
{
    public function list_user() {


        $list = User::getAllUsers();
        foreach ($list as $item) {
            $order = Order::count_order($item->id);
            $number = sizeof($order);
            $item->order = $number;

            // get order payed 
            $i = 0; 
            foreach ($order as $t) {
                if($t->status == 4) {
                    ++$i;
                }
            }
            $item->order_payed = $i;

        }
        return view('admin.user.list_user', compact('list')); 
    }

    public function block_account($id) {
        User::block_account($id);
        return back();
    }

    public function active_account($id) {
        User::active($id);
        return back(); 
    }
}
