<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Str; 
use Session; 
use Cart; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\CartUser; 

class LoginController extends Controller
{
    public function index () {
        return view('clients.login'); 
    }
    // login 
    public function login (Request $request) {
        
        $request -> validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],[
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'email.email' => 'Email không đúng định dạng'
        ]);
    
        $user = User::authUser($request->email, MD5($request -> password));

       
        if($user) {
            $request->session()->put('login_success','login_success'); 
            $request->session()->put('user_mail', $user->email);
            $request -> session() -> put('user_password', $user->password);
            $request ->session()->put('user_id', $user->id);

            $checkCart = Cart::count();
            if($checkCart != 0) { // kiểm tra xem trước khi đăng nhập có thêm cái gì vào giỏ hàng hay không 
                $list_items = Cart::content();
                foreach ($list_items as $item) {
                    $book_id = $item -> id;

                    $qty = $item -> qty;
                    $checkExit = CartUser::getItem(session('user_id'), $book_id); 
                    if($checkExit) {
                        CartUser::addExit($checkExit->id, $checkExit->qty + $qty);
                    } else {
                        // add new item in cart
                        $data['book_id'] = $book_id;
                        $data['qty'] = $qty;
                        $data['user_id'] = session('user_id'); 
                        CartUser::add($data); 
                    }
                }

            }            
            return redirect() -> route('home.');

        } else {
            return back() -> with('error_login','Sai mật khẩu hoặc email không đúng');
        }
    }

    /** login with social  */
    // login facebook
    public function facebook() {
        return Socialite::driver('facebook')->redirect();
    }
    public function facebook_callback(Request $request) {

        $user = Socialite::driver('facebook')->user();

        $data['provider'] = 'facebook';
        $data['provider_user_id'] = $user->id;
        $data['status'] = 0; 
        
        $account = User::userSocial($data);
        if($account) {
            $request->session()->put('login_success','login_success'); 
            $request -> session() -> put('provider_user_id', $user->id);
            $request->session()->put('provider', 'facebook');
            return redirect() -> route('home.');

        } else {
            $data['name'] = $user->name;
            $data['provider'] = 'facebook';
            $data['provider_user_id'] = $user->id;
            $data['email_social'] = $user->email;

            User::create_user_social($data); 

            $request->session()->put('login_success','login_success'); 
            $request -> session() -> put('provider_user_id', $user->id);
            $request->session()->put('provider', 'facebook');

            return redirect() -> route('home.');

        }

    }

    // login google 
    public function google() {
        return Socialite::driver('google')->redirect();
    }
    public function google_callback(Request $request) {
        $user = Socialite::driver('google') ->stateless()->user();

        $data['provider'] = 'google';
        $data['provider_user_id'] = $user->id;
        $data['status'] = 1; 
        
        $account = User::userSocial($data);
        if($account) {
            $request->session()->put('login_success','login_success'); 
            $request -> session() -> put('provider_user_id', $user->id);
            $request->session()->put('provider', 'google');
       
            $request->session()->put('user_mail', $user->email);
            $request -> session() -> put('user_password', $user->password);
            $request ->session()->put('user_id', $account->id);
            $checkCart = Cart::count();
            if($checkCart != 0) { // kiểm tra xem trước khi đăng nhập có thêm cái gì vào giỏ hàng hay không 
                $list_items = Cart::content();
                foreach ($list_items as $item) {
                    $book_id = $item -> id;
                    $qty = $item -> qty;
                    $checkExit = CartUser::getItem(session('user_id'), $book_id); 
                    if($checkExit) {
                        CartUser::addExit($checkExit->id, $checkExit->qty + $qty);
                    } else {
                        // add new item in cart
                        $data['book_id'] = $book_id;
                        $data['qty'] = $qty;
                        $data['user_id'] = session('user_id'); 
                        CartUser::add($data); 
                    }
                }

            } 
            return redirect() -> route('home.');

        } else {
            $data['name'] = $user->name;
            $data['provider'] = 'google';
            $data['provider_user_id'] = $user->id;
            $data['email_social'] = $user->email;

            $id = User::create_user_social($data); 

            $request->session()->put('login_success','login_success'); 
            $request -> session() -> put('provider_user_id', $user->id);
            $request->session()->put('provider', 'google');
            $request ->session()->put('user_id', $id);
            return redirect() -> route('home.');

        }
    }
    

    // log out 
    public function logout(Request $request) {
        $request->session()->put('login_success',null); 
        $request->session()->put('user_mail', null );
        $request -> session() -> put('user_password', null);
        $request -> session() -> put('provider_user_id', null);
        $request->session()->put('provider', null);
        $request->session()->put('user_id', null);
        $request->session()->put('percent_discount', null);

        Cart::destroy(); 
        return redirect() -> route('home.'); 
    }

    // forget-password 
    public function forget_password() {
        return view('clients.password'); 
    }

    public function post_forget_password(Request $request) {
        $request-> validate([
            'email' => ['required', 'exists:users,email']

        ], [
            'email' => 'Vui lòng nhập địa chỉ Email', 
            'email.exists' => 'Địa chỉ email không tồn tại trong hệ thống',
        ]);

        $token = Str::random(20);
        $user_email = $request-> email ; 
        $user = User::getUserByEmail($user_email);
        User::updateToken($user->id, $token);
        $user_name = $user -> name; 
        $user_id = $user -> id ;
        Mail::send('clients.mail.mail_change_password', compact('token','user_id', 'user_name'), function ($email) use($user_email, $user_name) {
            $email -> to($user_email, $user_name) -> subject("Thay đổi mật khẩu"); // error here
        });
        return back() -> with('change_pass', 'Vui lòng kiểm tra email để thay đổi mật khẩu tài khoản');

    }

    public function view_change_pass($id, $token) {
        $token_id = User::getToken($id);
        
        if($token === $token_id -> token) {
            User::active($id);
            return view('clients.change_password', compact('id'));
        } else {
            
            return redirect() -> route('login.viewPass') -> with('active_error', 'Mã không hợp lệ');
        }

    }


    public function change_password(Request $request) {
     
  
        User::change_password($request->id, MD5($request -> password)); 
        return redirect() -> route('login.') -> with('change_success', 'Thay đổi mật khẩu thành công'); 
    }
    // end forget password 

    // Register 

    public function registerView() {
        return view('clients.register');
    }
    public function register (Request $request) {
        $request -> validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required', 'min:6'],
            'phone' => ['required'],
        ],[
            'name.required' => 'Vui lòng nhập tên của người dùng',
            'email.required' => 'Vui lòng nhập email', 
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tạo tài khoản',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu có 6 ký tự trở lên',
            'phone.required' => 'Vui lòng nhập số điện thoại',
        ]);
        $token = Str::random(20);
        $user = User::create([
            'name' => $request-> name,
            'email' => $request-> email,
            'phone' => $request-> phone,
            'password' => MD5($request-> password),
            'status' => 0,
            'token' => $token
        ]); 
        $user_id = $user->id;   
        $user_name = $request-> name ;
        $user_email = $request->email;
        
        Mail::send('clients.mail.active_account', compact('token','user_id', 'user_name'), function ($email) use($user_email, $user_name) {
            $email -> to($user_email, $user_name) -> subject("Xác nhận tạo tài khoản trong bookshop"); // error here
        });
        return back() -> with('active_account', 'Vui lòng kiểm tra email để kích hoạt tài khoản bạn vừa tạo');
    }

    public function active_account($id, $token) {
        
        $token_id = User::getToken($id);

      
        if($token === $token_id -> token) {
            User::active($id);
            return redirect() -> route('login.') -> with('active_sucess', "Kích hoạt tài khoản thành công");
        } else {
         
            return redirect() -> route('register') -> with('active_error', 'Mã kích hoạt không hợp lệ');
        }
    }

}
