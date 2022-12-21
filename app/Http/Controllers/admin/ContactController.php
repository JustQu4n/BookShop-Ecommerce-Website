<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact; 

class ContactController extends Controller
{
    
    public function index() {
        return view('clients.contact'); 
    }

    public function saveFeedback(Request $request) {
        $request-> validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'subject' => ['required'],
            'message' => ['required']
        ],[
            'name.required' => 'Vui lòng nhập tên của bạn',
            'email.required' => 'Vui lòng nhập địa chỉ Email',
            'email.email' => 'Email không đúng định dạng', 
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'subject.required' => 'Vui lòng nhập tiêu đề',
            'message' => 'Vui lòng nhập nội dung tin nhắn'
        ]);
        $data['name'] = $request-> name; 
        $data['email'] = $request-> email;
        $data['phone'] = $request-> phone;
        $data['subject'] = $request-> subject;
        $data['content'] = $request-> message;
        $data['status'] = 0; 

        $add = Contact::addFeedBack($data);
        $request -> session()->put('thank','Cảm ơn bạn đã đóng góp ý kiến về shop'); 
        return redirect() -> route('contact');
    }

    // admin
    public function feedBackView(Request $request) {
        $list_feedBack = Contact::getAllFeedBack();
        return view('admin.feed_back.all_feedBack', compact('list_feedBack')); 
    }

    public function feedBackActive(Request $request,$id) {
        $active = Contact::active($id);
        $request->session()->put('msg','Chỉnh sửa thành công');
        return redirect() ->  route('feedBack.');

    }
    public function feedBackUnActive(Request $request,$id) {
        $active = Contact::unActive($id);
        return redirect() ->  route('feedBack.');
    }

    public function deleteFeedBack(Request $request,$id) {
        $del = Contact::removeFeedBack($id);
        $request->session()->put('msg','Xóa thành công');
        return redirect() -> route('feedBack.');
    }

}