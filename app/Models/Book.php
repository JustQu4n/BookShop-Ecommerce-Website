<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    use HasFactory;


    // get list all book
    static  function getAllBook() {
        $list = DB::table('book') -> get();
        return $list; 

    }

    static function getListBooks() {
        $list = DB::table('book') 
                -> join('category', 'category_id', '=', 'category.id')
                -> join('brand', 'brand_id', '=', 'brand.id')
                -> select('book.*', 'brand.name as brand_name', 'category.name as category_name')
                -> orderBy('book.id', 'ASC')
                -> paginate(8) -> withQueryString();
        return $list;
    }
    // get name image 
    static  function getNameImage($id) {
        $image = DB::table('book') -> select('book.image') -> where('id', $id) -> first();
        return $image;
    }
    // get list category_id 
    static function getListBookCategory($id) {
        $list = DB::table('book') 
                -> join('category', 'category_id', '=', 'category.id')
                -> join('brand', 'brand_id', '=', 'brand.id')
                -> select('book.*', 'brand.name as brand_name', 'category.name as category_name')
                -> orderBy('book.id', 'ASC')
                -> where('category_id',$id)
                -> where('book.status', 1)
                -> paginate(12) -> withQueryString();
        return $list ;
    }

    static  function listBooksCPA($id) {
        $list = DB::table('book') 
            -> join('category', 'category_id', '=', 'category.id')
            -> join('brand', 'brand_id', '=', 'brand.id')
            -> select('book.*', 'brand.name as brand_name', 'category.name as category_name')
            -> orderBy('book.price', 'ASC')
            -> where('category_id',$id)
            -> where('book.status', 1)
            -> paginate(12) -> withQueryString();
        return $list ;
        
    }

    static  function listBooksCPD($id) {
        $list = DB::table('book') 
            -> join('category', 'category_id', '=', 'category.id')
            -> join('brand', 'brand_id', '=', 'brand.id')
            -> select('book.*', 'brand.name as brand_name', 'category.name as category_name')
            -> orderBy('book.price', 'DESC')
            -> where('category_id',$id)
            -> where('book.status', 1)
            -> paginate(12) -> withQueryString();
        return $list ;
        
    }

    static  function listBooksCTA($id) {
        $list = DB::table('book') 
                -> join('category', 'category_id', '=', 'category.id')
                -> join('brand', 'brand_id', '=', 'brand.id')
                -> select('book.*', 'brand.name as brand_name', 'category.name as category_name')
                -> orderBy('book.name', 'ASC')
                -> where('category_id',$id)
                -> where('book.status', 1)
                -> paginate(12) -> withQueryString();
        return $list ;

    }

    static  function listBooksCTD($id) {
        $list = DB::table('book') 
                -> join('category', 'category_id', '=', 'category.id')
                -> join('brand', 'brand_id', '=', 'brand.id')
                -> select('book.*', 'brand.name as brand_name', 'category.name as category_name')
                -> orderBy('book.name', 'DESC')
                -> where('category_id',$id)
                -> where('book.status', 1)
                -> paginate(12) -> withQueryString();
        return $list ;

    }

    static  function listBooksCYA($id) {
        $list = DB::table('book') 
                -> join('category', 'category_id', '=', 'category.id')
                -> join('brand', 'brand_id', '=', 'brand.id')
                -> select('book.*', 'brand.name as brand_name', 'category.name as category_name')
                -> orderBy('book.year', 'ASC')
                -> where('category_id',$id)
                -> where('book.status', 1)
                -> paginate(12) -> withQueryString();
        return $list ;

    }

    static  function listBooksCYD($id) {
        $list = DB::table('book') 
                -> join('category', 'category_id', '=', 'category.id')
                -> join('brand', 'brand_id', '=', 'brand.id')
                -> select('book.*', 'brand.name as brand_name', 'category.name as category_name')
                -> orderBy('book.year', 'DESC')
                -> where('category_id',$id)
                -> where('book.status', 1)
                -> paginate(12) -> withQueryString();
        return $list ;

    }



    /** brand  */
    static function getListBookBrand($id) {
        $list = DB::table('book') 
                -> join('category', 'category_id', '=', 'category.id')
                -> join('brand', 'brand_id', '=', 'brand.id')
                -> select('book.*', 'brand.name as brand_name', 'category.name as category_name')
                -> orderBy('book.id', 'ASC')
                -> where('brand_id', $id)
                -> where('book.status', 1)
                -> paginate(12) -> withQueryString();
        return $list ; 

    }

    static  function listBooksBPA($id) {
        $list = DB::table('book') 
                -> join('category', 'category_id', '=', 'category.id')
                -> join('brand', 'brand_id', '=', 'brand.id')
                -> select('book.*', 'brand.name as brand_name', 'category.name as category_name')
                -> orderBy('book.price', 'ASC')
                -> where('brand_id', $id)
                -> where('book.status', 1)
                -> paginate(12) -> withQueryString();
        return $list ; 

    }

    static  function listBooksBPD($id) {
        $list = DB::table('book') 
                -> join('category', 'category_id', '=', 'category.id')
                -> join('brand', 'brand_id', '=', 'brand.id')
                -> select('book.*', 'brand.name as brand_name', 'category.name as category_name')
                -> orderBy('book.price', 'DESC')
                -> where('brand_id', $id)
                -> where('book.status', 1)
                -> paginate(12) -> withQueryString();
        return $list ; 

    }

    static  function listBooksBTA($id) {
        $list = DB::table('book') 
                -> join('category', 'category_id', '=', 'category.id')
                -> join('brand', 'brand_id', '=', 'brand.id')
                -> select('book.*', 'brand.name as brand_name', 'category.name as category_name')
                -> orderBy('book.name', 'ASC')
                -> where('brand_id', $id)
                -> where('book.status', 1)
                -> paginate(12) -> withQueryString();
        return $list ; 
    }
    static  function listBooksBTD($id) {
        $list = DB::table('book') 
                -> join('category', 'category_id', '=', 'category.id')
                -> join('brand', 'brand_id', '=', 'brand.id')
                -> select('book.*', 'brand.name as brand_name', 'category.name as category_name')
                -> orderBy('book.name', 'DESC')
                -> where('brand_id', $id)
                -> where('book.status', 1)
                -> paginate(12) -> withQueryString();
        return $list ; 
    }

    static  function listBooksBYA($id) {
        $list = DB::table('book') 
                -> join('category', 'category_id', '=', 'category.id')
                -> join('brand', 'brand_id', '=', 'brand.id')
                -> select('book.*', 'brand.name as brand_name', 'category.name as category_name')
                -> orderBy('book.year', 'ASC')
                -> where('brand_id', $id)
                -> where('book.status', 1)
                -> paginate(12) -> withQueryString();
        return $list ;
    }

    static  function listBooksBYD($id) {
        $list = DB::table('book') 
                -> join('category', 'category_id', '=', 'category.id')
                -> join('brand', 'brand_id', '=', 'brand.id')
                -> select('book.*', 'brand.name as brand_name', 'category.name as category_name')
                -> orderBy('book.year', 'DESC')
                -> where('brand_id', $id)
                -> where('book.status', 1)
                -> paginate(12) -> withQueryString();
        return $list ;
    }



    static function getListBookPrice($min, $max) {
        $list = DB::table('book') 
            -> join('category', 'category_id', '=', 'category.id')
            -> join('brand', 'brand_id', '=', 'brand.id')
            -> select('book.*', 'brand.name as brand_name', 'category.name as category_name')
            -> orderBy('book.id', 'ASC')
            -> where('price', '>=', $min)
            -> where('price', '<=', $max)
            -> where('book.status', 1)
            -> paginate(12) -> withQueryString();
        return $list ; 

    }

    static function getBook($id) {
        $book = DB::table('book') 
                -> where('book.id', $id)
                -> first();
        return $book;
    }

    static  function getCategory($id) {
        $category_id = DB::table('book') -> where('id', $id) -> select('category_id') ->  first();
        return $category_id; 
    }
    static function getRelatedBook($data) {
        $relatedBook = DB::table('book') 
                        -> where('category_id',  $data['cat_id']) 
                        -> whereNotIn('id', [$data['id']]) 
                        -> limit(5) 
                        -> orderBy('id', 'ASC')
                        -> get();
        return $relatedBook;
    }

    // add book 
    static  function addBook($data) {
        $add = DB::table('book') -> insert($data);
        return $add;
    }

    // delete book 
    static function removeBook($id) {
        $del = DB::table('book') ->where('id', $id) -> delete();
        return $del ; 

    }

    // active and unActive 
    static  function active($id) {
        $active = DB::table('book') -> where('id', $id) -> update(['status' => 1]);
        return $active;
    }
    static  function unActive($id) {
        $unActive = DB::table('book') -> where('id', $id) -> update(['status' => 0]);
        return $unActive;

    }

    // update book status
    static  function editBook($data, $id) {
        $edit = DB::table('book') -> where('id', $id) -> update($data); 
        return $edit;
    }

    // update rating for a book 
    static function updateRating($id, $rating) {
        DB::table('book') -> where('id', $id) -> update(['rating' => $rating]);
    }

    // get book rating 
    static function getBookRating() {
        $lists_books = DB::table('book') -> orderBy('rating', 'DESC') -> limit(5) -> get();
        return $lists_books; 
    }

    static function getAllBookRating() {
        $lists_books = DB::table('book') -> orderBy('rating', 'DESC')-> get();    
        return $lists_books; 
    }

    // get book best selling book
   static function getArriveBook(){
    $arrivebook = DB::table('book')->where('created_at','like','2022-11%')->orderBy('created_at','DESC')->get();
    return $arrivebook;
   }
   static  function getNameCategory(){
    $category = DB::table('category')->get();
    return $category;
   }
}