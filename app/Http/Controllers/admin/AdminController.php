<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book; 
use App\Models\OrderDetail; 
use App\Models\Order;
use App\Models\User; 
use App\Models\Event; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class AdminController extends Controller
{
    public function AuthLogin(){
        // $admin_id = Session::get('admin_id');
        $admin_id = Auth::id();
        if($admin_id){
             return Redirect::to('/ad');
        }else{
          return Redirect::to('login-auth')->send();
        }
      }
    public function index() {
        $this->AuthLogin();

        $books_rating = Book::getBookRating(); 
        $books_bestSell = OrderDetail::getBestSelling();

        $book_sell = null; 
        $i = 0 ; 
        foreach($books_bestSell as $book) {
            $infor_book= Book::getBook($book->book_id);
            $item['book'] = $infor_book;
            $item['qty'] = $book->qty;  
            $book_sell[$i] = $item; 
            $i++; 
        }

        $data['user_qty'] = sizeof(User::getUserActive());
        $data['book_qty'] = sizeof(Book::getAllBook());
        $data['order_qty'] = sizeof(Order::getAllOrder());
        $data['event_qty'] = sizeof(Event::getListEventsActicve());
        
  
        return view('admin.dashboard', compact('books_rating', 'book_sell', 'data'));
    }

    public function list_view() {
      $list = Book::getAllBookRating();
      $i = 0; 
      foreach($list as $book) {
        $book->number = ++$i; 
      }
      return view('admin.thong_ke.list_view', compact('list')); 
    }

    public function list_order() {
      $books_bestSell = OrderDetail::getBestSelling();
      $list = null; 
      $i = 0 ; 
      foreach($books_bestSell as $book) {
          $infor_book= Book::getBook($book->book_id);
          $item['book'] = $infor_book;
          $item['qty'] = $book->qty;  
          $list[$i] = $item; 
          $i++; 
      }

    
      return view('admin.thong_ke.list_order', compact('list'));
    }
}