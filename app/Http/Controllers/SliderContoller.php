<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SliderContoller extends Controller
{
   public function manage_slider(){
    $slider = Slider::all();
    return view('admin.slider.manage-slider',compact('slider'));
   }
   public function unactive_slide($id){
    Slider::where('id',$id)->update(['status'=>1]);
    Session::put('message','Không kích hoạt slider thành công');
    return Redirect::to('manage-slider');

}
public function active_slide($id){
    Slider::where('slider_id',$id)->update(['status'=>0]);
    Session::put('message','Kích hoạt slider thành công');
    return Redirect::to('manage-slider');

}
public function delete_slider($id){
    Slider::where('id',$id)->delete();
    return Redirect::to('manage-slider');
}
   public function save_slider(Request  $request){
    $data = $request->all();
       	$get_image = request('slider_image');
      
        if($get_image){
            $get_name_image =$get_image->getClientOriginalName();
            $name_img= current(explode(',',$get_name_image));
            $new_image = $name_img;
            $get_image->move('uploads/sliderImage/',$new_image);

            $slider = new Slider();
            $slider->name = $data['slider_name'];
            $slider->image = $new_image;
            $slider->status = $data['slider_status'];
           	$slider->save();
            Session::put('message','Thêm slider thành công');
            return Redirect::to('manage-slider');
        }else{
        	Session::put('message','Làm ơn thêm hình ảnh');
    		return Redirect::to('manage-slider');
        }

   }
}
