<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\OrderDetail;
use App\Models\Blog;
class HomeController extends Controller
{
    //

    public function index(Request $request) {
        $list_blog = Blog::getListBlog();
        if(session('login_success')) {
            $email = $request-> session()-> get('user_mail'); 
            $password = $request-> session() -> get('user_password'); 
            $user = User::authUser($email,  $password);
            $books_rating = Book::getBookRating();
        $arrivebook =Book::getArriveBook();
        $books_bestSell = OrderDetail::getBestSelling();
        $category = Book::getNameCategory();
            return view('clients.index', compact('user','books_rating','arrivebook','category','list_blog')); 
        }
        $books_rating = Book::getBookRating();
        $arrivebook =Book::getArriveBook();
        $books_bestSell = OrderDetail::getBestSelling();
        $category = Book::getNameCategory();
   
        return view('clients.index',compact('books_rating','arrivebook','category','list_blog')); 
    }

    public function autocomplete_ajax(Request $request){
        $data = $request->all();
        if($data['query']){
            $product = Book::where('status',1)->where('name','LIKE','%'.$data['query'].'%')->get();
            $output = '<ul class="dropdown-menu" style="display:block ; position:absolute; width:700px">';
            foreach($product as $key => $val){
                $output.= '<li class="li_search_ajax" style="font-size:16px; display: flex ;flex-direction:row; align-items: center;" ><img src="public/upload/productImage/'.$val->product_image.'" width="100"; height="100" /><a href="/chi-tiet-san-pham/'.$val->product_id.'" ><span>'.$val->product_name.'</span></a></li>';
            }
            $output.= '</ul>';
            echo $output;
        }
    
       }
}
