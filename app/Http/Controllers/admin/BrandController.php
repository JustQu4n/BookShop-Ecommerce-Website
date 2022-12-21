<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use  App\Models\Brand; 

class BrandController extends Controller
{
    private $db = null ; 
    public function __construct() {
        $this->db = new Brand();
    }

    public function index() {
        $list_brands = $this->db-> getListBrands();
        return view('admin.brand.all_brand', compact('list_brands'));
    }

    // add category 
    public function addView(){
        
        return view('admin.brand.add_brand');
    }
    public function addPost(Request $request) {
        $request->validate([
            'name' => ['required', 'unique:brand,name,'],
            'brand_desc' => ['required'],
            'brand_status' => ['required']

        ]
        ,[
            'name.required' => 'Vui lòng nhập tên thương hiệu !',
            'name.unique' => 'Thương hiệu đã tồn tại đã tồn tại',
            'brand_desc.required' => 'Vui lòng nhập mô tả thương hiệu sản phẩm!',
            'brand_status.required' => 'Vui lòng chọn trạng thái!',
        ]);

        $name = $request->name;
        $desc = $request->brand_desc;
        $status = $request->brand_status;
        $data = [
            'name' => $name,
            'description' => $desc,
            'status' => $status,
        ];

        $result = $this->db->addBrand($data);

        $request->session()->put('msg', 'Thêm loại sản phẩm thành công');

        return redirect() -> route('brand.');
    }

    public function activeBrand(Request $request, $id) {
        $active = $this-> db -> active($id);
        $request->session()->put('msg','Hiển thị thành cồng');
        return redirect() -> route('brand.');

    }

    public function unactiveBrand(Request $request, $id) {
        $active = $this-> db -> unactive($id);
        $request->session()->put('msg','Ẩn thành công');
        return redirect() -> route('brand.');
    }

    // update brand
    public function updateView($id) {
        $brand = $this->db -> getBrand($id);      
        return view('admin.brand.edit_brand', compact('id','brand'));
    }

    public function updatePost(Request $request, $id) {
   
        $request->validate([
            'name' => ['required'],
            'brand_desc' => ['required'],
        ]
        ,[
            'name.required' => 'Vui lòng nhập tên thương hiệu!',
        
            'brand_desc.required' => 'Vui lòng nhập mô tả thương hiệu!',          
        ]);
       
        $name = $request->name;
        $desc = $request->brand_desc;
        $data = [
            'name' => $name,
            'description' => $desc,
            'updated_at' => now()
        ];
        $request->session()->put('msg','Chỉnh sửa thành công');
        $rs = $this->db -> edit($data,$id);
        return redirect() -> route('brand.');

    }
    // delete brand 
    public function deleteBrand(Request $request, $id) {
        $rs = $this->db -> remove($id);
        $request->session()->put('msg','Xóa thành công');
        return redirect() -> route('brand.');
    }
}
