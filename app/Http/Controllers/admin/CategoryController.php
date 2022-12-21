<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


session_start();
class CategoryController extends Controller
{
    private $db = null ; 
    public function __construct() {
        $this->db = new Category();
    }

    public function index() {
        $categories = $this->db-> getListCategories();
        return view('admin.category.all_category', compact('categories'));
    }

    // add category 
    public function addView(){
        return view('admin.category.add_category');
    }
    public function addPost(Request $request) {
        $request->validate([
            'name' => ['required', 'unique:category,name,'],
            'category_desc' => ['required'],
            'category_status' => ['required']

        ]
        ,[
            'name.required' => 'Vui lòng nhập tên danh mục sản phẩm!',
            'name.unique' => 'Danh mục đã tồn tại',
            'category_desc.required' => 'Vui lòng nhập mô tả danh mục  sản phẩm!',
            'category_status.required' => 'Vui lòng chọn trạng thái!',
        ]);

        $name = $request->name;
        $desc = $request->category_desc;
        $status = $request->category_status;
        $data = [
            'name' => $name,
            'description' => $desc,
            'status' => $status,
        ];

        $result = $this->db->addCategory($data);

        $request->session()->put('msg', 'Thêm loại sản phẩm thành công');

        return redirect() -> route('category.');

    }

    // update category with

    public function updateView($id) {
        $category = $this->db -> getCategory($id); 
        
        return view('admin.category.edit_category', compact('id', 'category'));
    }

    public function updatePost(Request $request, $id) {

         
        $request->validate([
            'name' => ['required'],
            'category_desc' => ['required'],
        ]
        ,[
            'name.required' => 'Vui lòng nhập tên loại sản phẩm!',
            'name.unique' => 'Loại sản phẩm đã tồn tại',
            'category_desc.required' => 'Vui lòng nhập mô tả loại sản phẩm!',          
        ]);
       
        $name = $request->name;
        $desc = $request->category_desc;
        $data = [
            'name' => $name,
            'description' => $desc,
            'updated_at' => now()
        ];
        $request->session()->put('msg','Chỉnh sửa thành công');
        $rs = $this->db -> edit($data,$id);
        return redirect() -> route('category.');

    }

    // delete category

    public function deleteCategory(Request $request, $id) {
        $rs = $this->db -> remove($id);
        $request->session()->put('msg','Xóa thành công');
        return redirect() -> route('category.');
    }
    
    //active and unactive
    public function activeCat(Request $request, $id) {
        $active = $this-> db -> active($id);
        $request->session()->put('msg','Hiển thị thành cồng');
        return redirect() -> route('category.');

    }

    public function unactiveCat(Request $request, $id) {
        $active = $this-> db -> unactive($id);
        $request->session()->put('msg','Ẩn thành công');
        return redirect() -> route('category.');
    }
}
