<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Book;

class MyAccountController extends Controller
{
    //

    public function index() {

  
        $user_id = session('user_id');
        $user = User::getUserById($user_id);
        if($user->provider == null) {
            // account normal 
            $data['user_name'] = $user-> name ;
            $data['phone'] = $user->phone; 
            $data['email'] = $user->email;

        } else {
            // account social
            $data['user_name'] = $user-> name ;
            $data['phone'] = $user->phone; 
            $data['email'] = $user->email_social;
        }
        session() -> put('nav', 'account');
        
        
        
        return view('clients.account.infor_account', compact('data'));
    }

    public function updateAccount(Request $request) {

        
       
        $request-> validate([
            'user_name' => ['required']
            
        ],[
            'user_name.required' => 'Vui lòng nhập tên bạn muốn cập nhật'
        ]);

        $data['name'] = $request -> user_name;
        $data['updated_at'] = now(); 
        $id = session('user_id'); 
        User::updateName($id,$data);
        return back()->with('success', 'Đổi tên thành công'); 
    }

    // list off order 

    public function order() {
        session() -> put('nav', 'order'); 
        $user_id = session('user_id');
        $user = User::getUserById($user_id);
        if($user->provider == null) {
            // account normal 
            $data['user_name'] = $user-> name ;
            $data['phone'] = $user->phone; 
            $data['email'] = $user->email;

        } else {
            // account social
            $data['user_name'] = $user-> name ;
            $data['phone'] = $user->phone; 
            $data['email'] = $user->email_social;
        }

        $list_order = Order::getOrderUserId($user_id);
        foreach($list_order as $order) {
            $order_detail = OrderDetail::getUserByOrderId($order->id);
            $order->item = null ; 
            $item = null; 
            $i = 0; 
            foreach ($order_detail as $book) {

                $items[$i]['book_name']= $book->book_name ;
                $items[$i]['book_price'] = $book->book_price ;
                $items[$i]['sales_quantity'] = $book->sales_quantity ;
                $book_id = $book->book_id; 
                $img = Book::getNameImage($book_id);
                $items[$i]['img'] = $img -> image; 
                $i +=1;
               
            }
            $order->item = $items;   
        }

       
        return view('clients.account.purchase_order', compact('data', 'list_order'));
    }
}
