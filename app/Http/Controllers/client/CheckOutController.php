<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City; 
use App\Models\Province; 
use App\Models\Wards; 
use App\Models\Shipping; 
use App\Models\Feeship; 
use Cart; 
use App\Models\Order; 
use App\Models\OrderDetail; 
use App\Models\CartUser; 
use App\Models\Book; 

class CheckOutController extends Controller
{
    //

    // view checkout form điền thông tin về việc đặt hàng
    public function index(Request $request) {
        $list_cities = City::orderBy('city_id', 'ASC') -> get();
        $buy_now = $request-> buy_now ; 
        if($buy_now) {
            session() -> put('book_id', $request->book_id);
            session() -> put('qty', $request->cart_qty);
            session() -> put('buy_now', $buy_now); 
        } 
        return view('order.checkout', compact('list_cities')); 
    }

    public function insert_shipping(Request $request) {
    
        // $request -> validate([
        //     'city' => 'required',
        //     'province' => 'required',
        //     'wards' => 'required',
        //     'phone' => 'required',
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'village' => 'required'
        // ],[
        //     'city.required' => 'Vui lòng chọn tỉnh/thành phố',
        //     'province.required' => 'Vui lòng chọn quận/huyện', 
        //     'wards.required' => 'Vui lòng chọn xã/phường',
        //     'city.required' => 'Vui lòng nhập tên',
        //     'phone.required' => 'Vui lòng nhập số điện thoại',
        //     'village.required' => 'Vui lòng nhập địa chỉ cụ thể',
        //     'name.required' => 'Vui lòng nhập họ tên',
        //     'email.required' => 'Vui lòng nhập địa chỉ email',
        // ]);
        $name = $request->name;
        $city = $request->city;
        $province = $request->province;
        $wards = $request->wards;
        $village = $request-> village;
        $payment = $request->payment;
        $email = $request->email;
        $phone = $request->phone;
        $notes = $request->notes;
        $payment_id = $request->payment;

        
        $user = session() -> get('user_id');
        
        $data['city'] = $city;
        $data['province'] = $province;
        $data['wards'] = $wards;
        $feeship = Feeship::getFeeship($data);
        $fees_ship = $feeship-> fees_ship;

        $shipping_id = $feeship->id; 

        // get delivery information 
        $city_name = City::getName($city); 
        $province_name = Province::getName($province);
        $wards_name = Wards::getName($wards);
        
        $delivery['city_name']  = $city_name -> city_name;
        $delivery['province_name']  = $province_name -> province_name;
        $delivery['wards_name']  = $wards_name -> wards_name;
        $delivery['village'] = $village; 

        if(session('buy_now')) {
            
            $list_books = Book::getBook(session()-> get('book_id')); 

        } else {
            $list_books = Cart::content(); 
        }

        
        return view('order.order', compact('delivery', 'fees_ship', 'shipping_id', 'payment_id', 'village', 'email', 'name', 'phone', 'notes', 'list_books')); 
        
    }

    public function insert_order(Request $request) {
   
        $notes = $request->notes;
        if($notes) {
            $shipping['notes'] = $notes; 
        }

        $shipping['user_id'] = session() -> get('user_id');
        $shipping['name'] = $request -> name;
        $shipping['fees_ship_id'] = $request -> shipping_id;
        $shipping['village'] = $request ->village;
        $shipping['email'] = $request -> email;
        $shipping['phone'] = $request -> phone;
        $shipping_id = Shipping::insert_shipping($shipping);
    

        $order['user_id'] = session() -> get('user_id'); 
        $order['shipping_id'] =$shipping_id;
        $order['payment_id'] = $request -> payment_id; 
        if(session('buy_now')) {
            $book = Book::getBook(session('book_id'));
            $order['total_book_price'] = $book->price*session('qty'); 

        } else {
            $order['total_book_price'] = (float) str_replace(',', '', Cart::total()); 
        }
      
        $order['total'] = $request -> price_pay;
        $order['status'] = 1; 
        $order['created_at'] = now();
        $order_id = Order::insert_order($order);



        if(session('buy_now')) {
            
            $order_detail['order_id'] = $order_id;
            $order_detail['book_id'] = $book ->id;
            $order_detail['book_name'] = $book -> name;
            $order_detail['book_price'] = $book -> price;
            $order_detail['sales_quantity'] = session('qty');
            OrderDetail::insert_order_detail($order_detail);

            session() -> put('book_id', null);
            session() -> put('qty',null);
            session() -> put('buy_now',null); 
        } else {
            $list_items = Cart::content();
            foreach ($list_items as $item) {
                $order_detail['order_id'] = $order_id;
                $order_detail['book_id'] = $item ->id;
                $order_detail['book_name'] = $item -> name;
                $order_detail['book_price'] = $item -> price;
                $order_detail['sales_quantity'] = $item -> qty;

    
                OrderDetail::insert_order_detail($order_detail);
            }
            CartUser::remove_user_id(session()->get('user_id'));
        }
        
        
        return redirect() -> route('home.') -> with('order_success', "Đặt hàng thành công"); 
    }


}
