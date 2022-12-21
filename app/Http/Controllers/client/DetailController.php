<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Book; 
use App\Models\User;
class DetailController extends Controller
{
    

    public function index(Request $request, $id) {
        $book = Book::getBook($id);

        // update rating 
        if($book->rating) {
            Book::updateRating($id, $book->rating + 1); 
        } else {
            Book::updateRating($id, 1); 
        }
        $category_id = Book::getCategory($id);
        
        $cat_id = $category_id-> category_id; 
        $data = [
            'id' => $id,
            'cat_id' => $cat_id,
        ];
        $relateBook = Book::getRelatedBook($data); 

        if(session('login_success')) {
            $email = $request-> session()-> get('user_mail'); 
            $password = $request-> session() -> get('user_password'); 
            $user = User::authUser($email,  $password);
            return view('clients.detail', compact('book', 'id', 'relateBook', 'user')); 
        }

        
       
        return view('clients.detail', compact('book', 'id', 'relateBook')); 
    }

}
