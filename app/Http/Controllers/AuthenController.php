<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
class AuthenController extends Controller
{
    public function register_auth(){
        return view('admin.auth.register');
      }
      public function register(Request $request){
          $request->validate(
              [
                  'admin_name' =>'required|max:255',
                  'admin_email'=>'required|email|max:255',
                  'admin_phone'=>'required|max:255',
                  'admin_password'=>'required|max:255',
  
                  
              ],
              [
                  'admin_name.required' =>' Tên bắt buộc nhập vào',
                  'admin_name.max:255' =>'Tên không quá 255 ký tự ',
                  'admin_email.required' =>'Email bắt buộc nhập vào ',
                  'admin_email.max:255' =>' Email không quá 255 ký tự ',
                  'admin_email.email' =>' Bắt buộc là Email',
                  'admin_phone.required' =>' SĐT bắt buộc nhập vào ',
                  'admin_phone.max:255' =>'SĐT không quá 255 ký tự  ',
                  'admin_password.required' =>'Mật khẩu bắt buộc nhập vào  ',
                  'admin_password.max:255' =>' Mật khẩu không quá 255 ký tự ',
  
                 
              ]
          );
     $data = $request->all();
      $admin = new Admin();
      $admin->admin_name = $data['admin_name'];
      $admin->admin_email = $data['admin_email'];
      $admin->admin_phone = $data['admin_phone'];
      $admin->admin_password = md5($data['admin_password']);
      $admin->admin_image = 'avatar.svg';
      $admin->save();
      return Redirect::to('login-auth')->with('message','Đăng ký thành công');
  
      }
      public function login_auth(){
          return view('admin.auth.login');
      }
      public function login_authentication(Request $request){
          $data =$request->all();
          $request->validate(
            [
                'admin_email' =>'required|email',
                'admin_password'=>'required',

                
            ],
            [
                'admin_email.required' =>'Email bắt buộc nhập vào  ',
                'admin_email.email' =>'Email không hợp lệ  ',
                'admin_password.required' =>'Mật khẩu bắt buộc nhập vào  ',

               
            ]
        );

           if(Auth::attempt(['admin_email'=>$request->admin_email, 'admin_password'=>$request->admin_password])){
              return redirect::to('/ad');
           }
           else{
              return redirect::to('/login-auth')->with('message','Đăng nhập thất bại! Mật khẩu hoặc Email không đúng');
          
           }
  
        
      }
      public function logout_auth(){
          Auth::logout();
          return Redirect::to('/login-auth');
      }    
}
