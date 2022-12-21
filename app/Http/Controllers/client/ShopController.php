<?php

namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Book; 
use App\Models\Category;
use App\Models\Brand;

class ShopController extends Controller
{
    
    // category product sales 
    public function index(Request $request) {
        $id = Category::getFirstCategory();
        $id1 = $id -> id; 
        $name = $id->name; 
        $list_books = Book::getListBookCategory($id1);
        session() -> put('type_filter', 'category'); 
        session() -> put('id_filter', $id1); 
        if(session('login_success')) {
            $email = $request-> session()-> get('user_mail'); 
            $password = $request-> session() -> get('user_password'); 
            $user = User::authUser($email,  $password);

            
         
            return view('clients.shop', compact('list_books', 'name', 'user'));
        }
        return view('clients.shop', compact('list_books', 'name')); 
    }

    public function bookCategory($id) {
        session() -> put('type_filter', 'category'); 
        session() -> put('id_filter', $id);
        $name = Category::getCategoryName($id) -> name; 
        $list_books = Book::getListBookCategory($id);
        return view('clients.shop', compact('list_books', 'name'));
    }

    public function bookBrand($id) {
        session() -> put('type_filter', 'Brand'); 
        session() -> put('id_filter', $id);
        $name = Brand::getBrandName($id)->name;
        $list_books = Book::getListBookBrand($id);
        return view('clients.shop', compact('list_books', 'name'));
    }

    public function bookPrice(Request $request) {
        $min_price = $request-> min_price;
        $max_price = $request-> max_price;
        $name_min = number_format($min_price); 
        $name_max = number_format($max_price);
        $name = $name_min . "-" . $name_max;
        
        $list_books = Book::getListBookPrice($min_price, $max_price);
 
        return view('clients.shop', compact('list_books', 'name'));
    }

    public function add_cart(Request $request) {
      
       $name = $request -> name;
       return $name. ' Đã được thêm vào giỏ hàng'; 
    }

    public function filter(Request $request) {
        $value_filter = $request->value_filter;
        $list_books = null ;
        $type_filter = session() -> get('type_filter');
        $id_filter = session() -> get('id_filter');
        switch ($value_filter) {
            case 'price-ascending':
                if($type_filter === 'Brand') { // get book follow brand anh price ascending
                    $list_books = Book::listBooksBPA($id_filter); 
                } else {

                    $list_books = Book::listBooksCPA($id_filter);
                }
                
                break;
            case 'price-descending':
                if($type_filter === 'Brand') { // get book follow brand anh price ascending
                    $list_books = Book::listBooksBPD($id_filter); 
                } else {
                    $list_books = Book::listBooksCPD($id_filter);
                }
                    
                break;
            case 'title-ascending':
                if($type_filter === 'Brand') { // get book follow brand anh price ascending
                    $list_books = Book::listBooksBTA($id_filter); 
                } else {
                    $list_books = Book::listBooksCTA($id_filter);
                }
                  
                break;
            case 'title-descending':
                if($type_filter === 'Brand') { // get book follow brand anh price ascending
                    $list_books = Book::listBooksBTD($id_filter); 
                } else {
                    $list_books = Book::listBooksCTD($id_filter);
                }
                    
                break;
            case 'created-ascending':
                if($type_filter === 'Brand') { // get book follow brand anh price ascending
                    $list_books = Book::listBooksBYA($id_filter); 
                } else {
                    $list_books = Book::listBooksCYA($id_filter);
                }
                  
                    
                break;
            case 'created-descending':
                if($type_filter === 'Brand') { // get book follow brand anh price ascending
                    $list_books = Book::listBooksBYD($id_filter); 
                } else {
                    $list_books = Book::listBooksCYD($id_filter);
                }
                    
                break;
            default:
                if($type_filter === 'Brand') { // get book follow brand anh price ascending
                    $list_books = Book::getListBookBrand($id_filter); 
                } else {
                    $list_books = Book::getListBookCategory($id_filter);
                }
                break;
        }
      
        $result = ""; 
       
        foreach ($list_books as $book) {

            $result .= '<div class="my-book ">
                    <div class="dropdown">
                    <div class="thumbnail-drama">'.
                    '<a href="'.route("detail", ["id" =>$book->id ]). '"><img src="'. asset("uploads/books/$book->image").'"alt=""></a>'
                    .'</div>
                    <div class="more">
                        <ul type="none">
                            <li>
                                <form method="POST">
                                    '.
                                    '<input type="hidden" name="cart_name" class="cart_book_name_'.$book->id. '" value="'.$book->name.'">'
                                    .'<input type="hidden" name="cart_image" class="cart_book_image_'.$book->id.'" value="'.$book->image.'">'
                                    .'<input type="hidden" name="cart_price" class="cart_book_price_'.$book->id.'" value="'.$book->price.'">'
                                    .'<input type="hidden" name="cart_qty" class="cart_book_qty_'.$book->id.'" value="1">'
                                    .'<button class="add-cart"  data-id="'.$book->id.'"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Thêm vào giỏ hàng</button>'  
                                .'</form>
                            </li>
                            <li><a href=""><i class="fa fa-heart-o" aria-hidden="true"></i>Yêu thích</a> </li>
                        </ul>
                    </div>
                    </div>
                    <div class="title-drama">
                        <h6>'.$book->name.'</h6>
                    </div>
                    <div class="author-drama">
                        <p>'.$book->author.'</p>
                    </div>
                    <div class="star-drama">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <div class="price-drama">
                        <h6>' .number_format($book->price).'VNĐ</h6>
                    </div>
                </div>';
                    

        }

        return $result; 
    }

    
}
