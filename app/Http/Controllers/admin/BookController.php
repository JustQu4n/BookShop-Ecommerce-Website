<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    

    public function index() {
        $list_books = Book::getListBooks();
        return view('admin.book.all_book', compact('list_books')); 
    }


    // add book 
    public function addView() {
        return view('admin.book.add_book'); 
    }

    public function addPost(Request $request) {
        
        
        $request->validate([
            'name' => ['required', 'unique:book,name,'],
            'author' => ['required'], 
            'book_desc' => ['required'],
            'book_content' => ['required'],
            'price' => ['required'],
            'image' => ['required'],
            'year' => ['required', 'integer'],
            'total_page' => ['required', 'integer'],
            'publisher' => ['required']

        ]
        ,[
            'name.required' => 'Vui lòng nhập tên sách !',
            'author.required' => 'Vui lòng nhập tên tác giả',
            'name.unique' => 'Thương hiệu đã tồn tại đã tồn tại',
            'book_desc.required' => 'Vui lòng nhập mô tả  sách!',
            'book_content.required' => 'Vui lòng nhập mô tả nội dung sách!',
            'image.required' => 'Vui lòng chọn hình ảnh',
            'price.required' => 'Vui lòng nhập giá', 
            'year.required' => 'Vui lòng nhập năm xuất bản', 
            'year.integer' => 'Năm xuất bản phải là số nguyên', 
            'total_page' => 'Vui lòng nhập số trang',
            'publisher' => 'Vui lòng nhập nhà xuất bản'
        ]);
        
        $name = $request->name;
        $author = $request->author; 
        $desc = $request->book_desc;
        $status = $request->book_status;
        $content = $request-> book_content;
        $price = $request->price;
        $total_page = $request->total_page;
        $year = $request->year;
        $publisher = $request->publisher;
        $category_id = $request->book_category;
        $brand_id = $request->book_brand; 
        $image = $request-> file('image');
        $imgName = current(explode('.', $image->getClientOriginalName()));
        $extension = $image-> getClientOriginalExtension();
        $img = $imgName.rand(1,100).'.'.$extension;
        $image -> move('uploads/books', $img); 
     
        $data = [
            'name'        => $name,
            'author'      => $author,
            'description' => $desc,
            'status'      => $status,
            'price'       => $price,
            'content'     => $content,
            'image'       => $img,
            'category_id' => $category_id,
            'brand_id'    => $brand_id,
            'total_page'  => $total_page,
            'publisher'  => $publisher, 
            'year'      => $year   

        ];
        Book::addBook($data); 
        $request->session()->put('msg', 'Thêm sách thành công');
  

        return redirect() -> route('book.');


    }

    // delete book 

    public function deleteBook(Request $request, $id) {
        $nameImg = Book::getNameImage($id);
        $img = $nameImg->image;
        File::delete(public_path("uploads/books/$img"));
        Book::removeBook($id);
        $request->session()-> put('msg','Xóa thành công');
        return redirect() -> route('book.'); 
    }

    // active and unActive
    public function activeBook(Request $request, $id) {
        Book::active($id);
        $request->session()->put('msg','Hiển thị thành cồng');
        return redirect() -> route('book.');
    }

    public function unActiveBook(Request $request, $id) {
        Book::unActive($id);
        $request->session()->put('msg','Ẩn thành công');
        return redirect() -> route('book.');
    }


    // update book 
    public function updateView($id) {
        $book = Book::getBook($id);

        
        return view('admin.book.edit_book', compact('id', 'book'));
    }

    public function updatePost(Request $request, $id) {
 
        $request->validate([
            'name' => ['required'],
            'author' => ['required'],
            'book_desc' => ['required'],
            'book_content' => ['required'],
            'price' => ['required'],
            'year' => ['required', 'integer'],
            'total_page' => ['required', 'integer'],
            'publisher' => ['required']
          
        ]
        ,[
            'name.required' => 'Vui lòng nhập tên sách !',
            'author.required' => 'Vui lòng nhập tên tác giả', 
            'book_desc.required' => 'Vui lòng nhập mô tả  sách!',
            'book_content.required' => 'Vui lòng nhập mô tả nội dung sách!',
            'price.required' => 'Vui lòng nhập giá',
            'year.required' => 'Vui lòng nhập năm xuất bản', 
            'year.integer' => 'Năm xuất bản phải là số nguyên', 
            'total_page' => 'Vui lòng nhập số trang',
            'publisher' => 'Vui lòng nhập nhà xuất bản'
        ]);

        $name = $request->name;
        $author = $request->author;
        $desc = $request->book_desc;
        $status = $request->book_status;
        $content = $request-> book_content;
        $price = $request->price;
        $total_page = $request->total_page;
        $year = $request->year;
        $publisher = $request->publisher;
        $category_id = $request->book_category;
        $brand_id = $request->book_brand;
       
        
        $image = $request-> file('image');
        if($image) {
            // delete old image 
            $old_image = $request-> old_image;
            File::delete(public_path("uploads/books/$old_image"));
            $imgName = current(explode('.', $image->getClientOriginalName()));
            $extension = $image-> getClientOriginalExtension();
            $img = $imgName.rand(1,100).'.'.$extension;
            $image -> move('uploads/books', $img); 
        } else {
            $img = $request-> old_image;
        }
       
     
        $data = [
            'name'        => $name,
            'author'      => $author,
            'description' => $desc,
            'status'      => $status,
            'price'       => $price,
            'content'     => $content,
            'image'       => $img,
            'category_id' => $category_id,
            'brand_id'    => $brand_id,
            'total_page'  => $total_page,
            'publisher'  => $publisher, 
            'year'        => $year,
            'updated_at'  => now()
        ];
        $request->session()->put('msg','Chỉnh sửa thành công');
        Book::editBook($data, $id); 
        return redirect() -> route('book.');
    }
}
