<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Event; 
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    
    // client 
    public function index(Request $request) {

        $list_events = Event::getListEventsActicve();
        if(session('login_success')) {
            $email = $request-> session()-> get('user_mail'); 
            $password = $request-> session() -> get('user_password'); 
            $user = User::authUser($email,  $password);
            return view('clients.events', compact('list_events', 'user'));  
        }

        return view('clients.events', compact('list_events')); 
    }



    // admin  /// 
    public function list() {
        $list_events = Event::getListEvents();
        return view('admin.event.all_event', compact('list_events'));
    }

    // add category 
    public function addView(){
        
        return view('admin.event.add_event');
    }

    
    public function addPost(Request $request) {
        
        
        $request->validate([
            'name' => ['required'],
            'address' => ['required'], 
            'start_hours' => ['required'],
            'end_hours' => ['required'],
            'start_time' => ['required'],
            'image' => ['required'],
            'end_time' => ['required'],
            'event_desc' => ['required']

        ]
        ,[
            'name.required' => 'Vui lòng nhập tên sự kiện!',
            'address.required' => 'Vui lòng nhập địa điểm diễn ra sự kiện!',
            'start_hours.required' => 'Vui lòng nhập giờ bắt đầu sự kiện!',
            'end_hours.required' => 'Vui lòng nhập giờ kết thúc sự kiện!',
            'image.required' => 'Vui lòng chọn hình ảnh',
            'start_time.required' => 'Vui lòng nhập ngày bắt đầu sự kiện', 
            'end_time.required' => 'Vui lòng nhập ngày kết thúc sự kiện', 
            'event_desc' => 'Vui lòng nhập mô tả sự kiện'
        ]);
        
        $name = $request->name;
        $address = $request->address; 
        $desc = $request->event_desc;
        $status = $request->event_status;
        $start_hours = $request->start_hours;
        $start_time = $request->start_time;
        $end_hours = $request->end_hours;
        $end_time = $request->end_time;

        $image = $request-> file('image');
        $imgName = current(explode('.', $image->getClientOriginalName()));
        $extension = $image-> getClientOriginalExtension();
        $img = $imgName.rand(1,100).'.'.$extension;
        $image -> move('uploads/events', $img); 
        $status = $request->status;
     

        $data = [
            'name'        => $name,
            'address'      => $address,
            'description' => $desc,
            'status'      => $status,
            'start_time' => $start_time,
            'start_hours' => $start_hours,
            'end_time' => $end_time,
            'end_hours' => $end_hours,
            'image'       => $img,
            
        ];

      
        Event::addEvent($data); 
        $request->session()->put('msg', 'Thêm sách thành công');
        return redirect() -> route('event.adim');

    }
 

    public function activeEvent(Request $request, $id) {
        $active = Event::active($id); 
        $request->session()->put('msg','Hiển thị thành cồng');
        return redirect() -> route('event.');

    }

    public function unActiveEvent(Request $request, $id) {
        $unActive = Event::unActive($id); 
        $request->session()->put('msg','Ẩn thành công');
        return redirect() -> route('event.');
    }

    // update event
    public function updateView($id) {
        $event = Event::getEvent($id);     
        return view('admin.event.edit_event', compact('id','event'));
    }

    public function updatePost(Request $request, $id) {
   
        $request->validate([
            'name' => ['required'],
            'address' => ['required'], 
            'start_hours' => ['required'],
            'end_hours' => ['required'],
            'start_time' => ['required'],
            
            'end_time' => ['required'],
            'event_desc' => ['required']

        ]
        ,[
            'name.required' => 'Vui lòng nhập tên sự kiện!',
            'address.required' => 'Vui lòng nhập địa điểm diễn ra sự kiện!',
            'start_hours.required' => 'Vui lòng nhập giờ bắt đầu sự kiện!',
            'end_hours.required' => 'Vui lòng nhập giờ kết thúc sự kiện!',
            'start_time.required' => 'Vui lòng nhập ngày bắt đầu sự kiện', 
            'end_time.required' => 'Vui lòng nhập ngày kết thúc sự kiện', 
            'event_desc' => 'Vui lòng nhập mô tả sự kiện'
        ]);

        $name = $request->name;
        $address = $request->address; 
        $desc = $request->event_desc;
        $status = $request->event_status;
        $start_hours = $request->start_hours;
        $start_time = $request->start_time;
        $end_hours = $request->end_hours;
        $end_time = $request->end_time;
        $status = $request->status;

        $image = $request-> file('image');
        if($image) {
            // delete old image 
            $old_image = $request-> old_image;
            File::delete(public_path("uploads/events/$old_image"));
            $imgName = current(explode('.', $image->getClientOriginalName()));
            $extension = $image-> getClientOriginalExtension();
            $img = $imgName.rand(1,100).'.'.$extension;
            $image -> move('uploads/events', $img); 
        } else {
            $img = $request-> old_image;
        }

        
        $data = [
            'name'        => $name,
            'address'      => $address,
            'description' => $desc,
            'status'      => $status,
            'start_time' => $start_time,
            'start_hours' => $start_hours,
            'end_time' => $end_time,
            'end_hours' => $end_hours,
            'image'       => $img,
            'status' => $status,
            'updated_at'  => now()
            
        ];
        $edit = Event::editEvent($data, $id); 
        $request->session()->put('msg','Cập nhật thành công');
        return redirect() -> route('event.admin');
    }
    // delete event 
    public function deleteEvent(Request $request, $id) {
       
        $nameImg = Event::getNameImage($id);
        $img = $nameImg->image;
        File::delete(public_path("uploads/events/$img"));
        $rs = Event::removeEvent($id);
        $request->session()->put('msg','Xóa thành công');
        return redirect() -> route('event.admin');
    }

 
}
