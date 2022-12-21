<?php

namespace App\Http\Controllers\client;
use App\Models\User;
use App\Http\Controllers\Controller;
use Cart; 
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Discount; 
use App\Models\CartUser; 

class CartController extends Controller
{
    //
    public function index(Request $request) {
        $list_books = Cart::content(); 
        if(session('login_success')) {
            Cart::destroy();
            $email = $request-> session()-> get('user_mail'); 
            $password = $request-> session() -> get('user_password'); 
            $user = User::authUser($email,  $password);
            
            $list_items = CartUser::getItemInCart(session('user_id'));
            if($list_items) {
                foreach($list_items as $item) {
                    $id = $item -> book_id;
                    $name = $item -> name;
                    $qty = $item -> qty; 
                    $img = $item -> image;
                    $price = $item -> price;
                    $data['id'] = $id;
                    $data['name'] = $name;
                    $data['qty'] =$qty;
                    $data['price'] = $price;
                    $data['weight'] = 9.9; 
                    $data['options']['img'] = $img;
                    Cart::add($data);
                }
                if(session('percent_discount')) {
                    Cart::setGlobalDiscount(session('percent_discount'));
                    $request->session()->put('percent_discount', null);
                }
                $list_books = Cart::content(); 
            }
            return view('order.cart', compact('user', 'list_books')); 
        }
        
        return view('order.cart', compact('list_books')); 
    }

    public function add(Request $request) {

        $id = $request->id;
        $name = $request->name;
        $qty = $request->qty;
        $price = $request->price;
        $image = $request->image;
        $data['id'] = $id;
        $data['name'] = $name;
        $data['qty'] = $qty;
        $data['price'] = $price;
        $data['weight'] = 9.9; 
        $data['options']['img'] = $image;
        Cart::add($data); 

        if(session('user_id')) {
            $check = CartUser::getItem(session('user_id'), $id);
            if($check) {
               CartUser::addExit($check->id, $check->qty + $qty);
               
            } else {
                $data1['user_id'] = session('user_id');
                $data1['book_id'] = $id;
                $data1['qty'] = $qty; 
                CartUser::add($data1);
            }
           
        }
    }

    public function remove($rowId, $bookId) {
        if(session('user_id')) {
            CartUser::remove(session('user_id'), $bookId);
        } else {
            Cart::remove($rowId);
        }
        return back(); 
    }

    public function update(Request $request) {
        $rowId = $request-> rowId;
        $qty = $request->qty;
        $book_id = $request->book_id; 
        if(session('user_id')) {
            $item = CartUser::getItem(session('user_id'), $book_id); 
            CartUser::updateCart($item->id, $qty);

        } else {
            Cart::update($rowId, $qty);
        }
        return back();
    }

    public function discount(Request $request) {
        $request -> validate([
            'code' => 'required',
        ],[
            'code.required' => 'Vui lòng nhập mã',
        ]);
        $code = $request->code; 
        $status = $request->status; 
        $date = date('Y-m-d');
 
        $discount = Discount::getDiscount($code, $date);
        if($discount) {
            Cart::setGlobalDiscount($discount -> percent_discount);
            $request -> session()->put('percent_discount', $discount -> percent_discount);
            return back();
        }
        return back() -> with('discount_empty', 'discount_empty');
    }

    public function test() {
        $id = $_POST['id'];
        $number = $_POST['number'];
        print_r($id); 
    }


}
