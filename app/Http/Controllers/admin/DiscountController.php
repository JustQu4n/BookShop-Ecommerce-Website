<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount; 

class DiscountController extends Controller
{
    
    public function index() {
        $list_discounts = Discount::getListDiscounts();
        return view('admin.discount.all_discount', compact('list_discounts')); 
    }

    // delete discount 
    public function deleteDiscount(Request $request, $id) {
        $rs = Discount::remove($id);
        $request->session()->put('msg','Xóa thành công');
        return redirect() -> route('discount.');
    }

    // update discount
    public function updateView($id) {
        $discount = Discount::getDiscountByID($id);      
        return view('admin.discount.edit_discount', compact('id','discount'));
    }

    public function updatePost(Request $request, $id) {
        $request->validate([
            'code' => 'required',
            'percent_discount' => 'required|integer',
            'date_end' => 'required'
        ],[
            'code.required' => 'Vui lòng nhập mã code',
            'percent_discount.required' => 'Vui lòng nhập phần trăm giảm giá',
            'percent_discount.integer' => "Nhập số nguyên",
        ]);
        $data['code'] = $request->code;
        $data['percent_discount'] = $request->percent_discount;
        $data['date_end'] = $request->date_end;

        $update = Discount::updateDiscount($id, $data); 
        $request->session()->put('msg','Chỉnh sửa thành công');
        return redirect() -> route('discount.'); 
    }

    // active discount 
    public function activeDiscount(Request $request, $id) {
        Discount::active($id);
        $request->session()->put('msg','Mã giảm giá đã có hiệu lực');
        return redirect() -> route('discount.');
    }
    public function unActiveDiscount(Request $request, $id) {
        Discount::unActive($id);
        $request->session()->put('msg','Mã giảm giá đã không còn có hiệu lực');
        return redirect() -> route('discount.');
    }

    // add discount
    public function addView(){
        return view('admin.discount.add_discount'); 
    }
    
    public function addPost(Request $request) {
        $request -> validate([
            'code' => 'required|min:6|unique:discount,code',
            'percent_discount' => 'required|integer|min:0',
        ],[
            'code.required' => 'Vui lòng nhập mã code', 
            'percent_discount.required' => 'Vui lòng nhập phần trăm mã giảm giá',
            'percent_discount.integer' => 'Vui lòng nhập số nguyên',
            'code.unique' => 'Mã code đã tồn tại', 
        ]);
        $data['code'] = $request->code; 
        $data['percent_discount'] = $request-> percent_discount;
        $data['date_end'] = $request->date_end;
        $data['status'] = $request->status;
        Discount::add($data);
        $request -> session()->put('msg', 'Thêm sách thành công');
        return redirect() -> route('discount.'); 
    }

}
