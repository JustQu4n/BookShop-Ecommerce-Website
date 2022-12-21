<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController; 
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\admin\ContactController;
use  App\Http\Controllers\admin\DiscountController; 
use  App\Http\Controllers\admin\DeliveryController; 
use  App\Http\Controllers\admin\OrderController; 
use  App\Http\Controllers\admin\StatisticalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\t;
use App\Http\Controllers\client\ShopController; 
use App\Http\Controllers\client\DetailController; 
use App\Http\Controllers\client\EventController;
use App\Http\Controllers\client\BlogController;
use App\Http\Controllers\client\LoginController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\CheckOutController; 
use App\Http\Controllers\client\MyAccountController; 


use App\Http\Controllers\MailController; 
use  App\Http\Controllers\TestController; 




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/test', [OrderController::class, 'change_status']) -> name('test'); 


// admin mangaWeb
Route::prefix('ad') -> group( function () {
   
   Route::get('/', [AdminController::class, 'index']) ->name('admin');

    // view statistical 
    Route::prefix('statistical') -> group( function () {
        Route::post('/', [StatisticalController::class, 'statistical_order']) -> name('statistical_order'); 

        Route::post('/filter', [StatisticalController::class, 'filter']) -> name('filter_profit'); 
        // filter profit
       
    });

   // category
   Route::prefix('category') -> name('category.') -> group( function () {
        // all category 
        Route::get('/',[CategoryController::class, 'index']) ;

        // add category 
        Route::get('/add', [CategoryController::class,'addView']) -> name('add');
        Route::post('/add', [CategoryController::class, 'addPost']) ->name('addPost');

        // category active and unactive 
        Route::get('/active/{id}',[CategoryController::class, 'activeCat']) -> name('active') ;
        Route::get('/unactive/{id}',[CategoryController::class, 'unactiveCat']) -> name('unactive') ;

        // update category
        Route::get('/update/{id}', [CategoryController::class, 'updateView'])-> name('update') ;
        Route::post('update/{id}', [CategoryController::class, 'updatePost'])-> name('updatePost');
        // delete category
        Route::get('/delete/{id}', [CategoryController::class, 'deleteCategory']) -> name('delete') ;

   });

   Route::prefix('brand') -> name('brand.') -> group( function () {
        // all brand 
        Route::get('/',[BrandController::class, 'index']) ;

        // add brand 
        Route::get('/add', [BrandController::class,'addView']) -> name('add');
        Route::post('/add', [BrandController::class, 'addPost']) ->name('addPost');

        // brand active and unactive 
        Route::get('/active/{id}',[BrandController::class, 'activeBrand']) -> name('active') ;
        Route::get('/unactive/{id}',[BrandController::class, 'unactiveBrand']) -> name('unactive') ;

        // update brand
        Route::get('/update/{id}', [BrandController::class, 'updateView'])-> name('update') ;
        Route::post('update/{id}', [BrandController::class, 'updatePost'])-> name('updatePost');
        // delete brand
        Route::get('/delete/{id}', [BrandController::class, 'deletebrand']) -> name('delete') ;

    });

    // book 

    Route::prefix('book') -> name('book.') -> group( function () {
        // all book 
        Route::get('/',[BookController::class, 'index']) ;

        // add book 
        Route::get('/add', [BookController::class,'addView']) -> name('add');
        Route::post('/add', [BookController::class, 'addPost']) ->name('addPost');

        // book active and unactive 
        Route::get('/active/{id}',[BookController::class, 'activeBook']) -> name('active') ;
        Route::get('/unactive/{id}',[BookController::class, 'unActiveBook']) -> name('unactive') ;

        // update book
        Route::get('/update/{id}', [BookController::class, 'updateView'])-> name('update') ;
        Route::post('update/{id}', [BookController::class, 'updatePost'])-> name('updatePost');
        // delete book
        Route::get('/delete/{id}', [BookController::class, 'deleteBook']) -> name('delete') ;

    });

    // feedBack
    Route::prefix('feedBack') -> name('feedBack.') -> group( function () {
        Route::get('/', [ContactController::class, 'feedBackView']);
        Route::get('active/{id}', [ContactController::class, 'feedBackActive']) -> name('active'); 
        Route::get('unactive/{id}', [ContactController::class, 'feedBackUnActive']) -> name('unactive'); 
        Route::get('delete/{id}', [ContactController::class, 'deleteFeedBack']) -> name('delete'); 
    });

    // event 
    Route::prefix('event') -> name('event.') -> group( function () {
        // all event 
        Route::get('/',[EventController::class, 'list']) -> name('admin');

        // add event 
        Route::get('/add', [EventController::class,'addView']) -> name('add');
        Route::post('/add', [EventController::class, 'addPost']) ->name('addPost');

        // event active and unactive 
        Route::get('/active/{id}',[EventController::class, 'activeBlog']) -> name('active') ;
        Route::get('/unactive/{id}',[EventController::class, 'unactiveBlog']) -> name('unactive') ;

        // update event
        Route::get('/update/{id}', [EventController::class, 'updateView'])-> name('update') ;
        Route::post('update/{id}', [EventController::class, 'updatePost'])-> name('updatePost');
        // delete event
        Route::get('/delete/{id}', [EventController::class, 'deleteBlog']) -> name('delete') ;

    });
    Route::prefix('blog') -> name('blog.') -> group( function () {
        // all event 
        Route::get('/',[BlogController::class, 'list']) -> name('admin');

        // add event 
        Route::get('/add', [BlogController::class,'addView']) -> name('add');
        Route::post('/add', [BlogController::class, 'addPost']) ->name('addPost');

        // event active and unactive 
        Route::get('/active/{id}',[BlogController::class, 'activeBlog']) -> name('active') ;
        Route::get('/unactive/{id}',[BlogController::class, 'unactiveEvent']) -> name('unactive') ;

        // update event
        Route::get('/update/{id}', [BlogController::class, 'updateView'])-> name('update') ;
        Route::post('update/{id}', [BlogController::class, 'updatePost'])-> name('updatePost');
        // delete event
        Route::get('/delete/{id}', [BlogController::class, 'deleteBlog']) -> name('delete') ;
        
      
    });

       // discount 

       Route::prefix('discount') -> name('discount.') -> group( function () {
        // all discount 
            Route::get('/',[DiscountController::class, 'index']) ;

            // add discount 
            Route::get('/add', [DiscountController::class,'addView']) -> name('add');
            Route::post('/add', [DiscountController::class, 'addPost']) ->name('addPost');

            // discount active and unactive 
            Route::get('/active/{id}',[DiscountController::class, 'activeDiscount']) -> name('active') ;
            Route::get('/unactive/{id}',[DiscountController::class, 'unActiveDiscount']) -> name('unactive') ;

            // update discount
            Route::get('/update/{id}', [DiscountController::class, 'updateView'])-> name('update') ;
            Route::post('update/{id}', [DiscountController::class, 'updatePost'])-> name('updatePost');
            // delete discount
            Route::get('/delete/{id}', [DiscountController::class, 'deleteDiscount']) -> name('delete') ;

    });

    // delivery 
    Route::prefix('delivery') -> name('delivery.') -> group( function () {

            Route::get('/', [DeliveryController::class, 'index']); 

            Route::post('select-delivery', [DeliveryController::class, 'select_delivery']) -> name('select-delivery');
            Route::post('save-delivery', [DeliveryController::class, 'save_delivery']) -> name('save-delivery');
            Route::post('show-delivery', [DeliveryController::class, 'show_delivery']) -> name('show-delivery');
            Route::post('edit-delivery', [DeliveryController::class, 'edit_delivery']) -> name('edit-delivery');

    });

    // order 
    Route::prefix('order') -> name('order.') -> group( function () {
        Route::get('/', [OrderController::class, 'index']); 

        Route::post('/change-status', [OrderController::class, 'change_status']) -> name('change-status');

        Route::get('order-detail/{id}', [OrderController::class, 'order_detail']) -> name('order-detail');
    }); 

});



// client 

/** shop  */
Route::prefix('shop') -> name('shop.') -> group( function () {

    // 
    Route::get('/', [ShopController::class,'index']);
    Route::post('/', [ShopController::class, 'add_cart']) -> name('add_cart');
    Route::get('category/{id}', [ShopController::class, 'bookCategory'] ) -> name('category');
    Route::get('brand/{id}', [ShopController::class, 'bookBrand']) -> name('brand');

    // price 
    Route::get('price', [ShopController::class, 'bookPrice']) -> name('price');

    Route::post('/filter', [ShopController::class, 'filter']) -> name('filter');

    Route::post('/test_filter', [ShopController::class, 'test_filter']) -> name('test_filter');

    // detail

}); 
Route::get('product/{id}', [DetailController::class,'index']) -> name('detail'); 

/** contact */
Route::prefix('contact') -> name('contact.') -> group( function () {
    // view contact page
    Route::get('/', [ContactController::class, 'index']);

    // 
    Route::post('/', [ContactController::class, 'saveFeedBack']) -> name('save');
}); 

/** Event */
Route::get('/events', [EventController::class, 'index']) -> name('event.');

/** Blog */
Route::get('/blog', [BlogController::class, 'index']) -> name('blog.'); 

Route::get('/blog-detail/{id}', [BlogController::class, 'blogDetail']) ;
/** Home */
Route::prefix('/') -> name('home.') -> group(function () {
    Route::get('/', [HomeController::class, 'index']);
});





/** Login */
Route::prefix('/login') -> name('login')-> group(function () {
    Route::get('/', [LoginController::class, 'index']) -> name('.');
    Route::post('/', [LoginController::class,'login']);
    
    Route::prefix('forget-password') -> group(function() {
        Route::get('/', [LoginController::class, 'forget_password']) -> name('.viewPass');
        Route::post('/', [LoginController::class, 'post_forget_password']); 

        Route::get('/get-password/{id}/{token}', [LoginController::class, 'view_change_pass']) -> name('.postPass');
       
    });
    Route::post('/change-password', [LoginController::class,'change_password']) -> name('.save_change_password'); 

    /** Login with social */
    Route::get('/social/policy', function () {

    }); // 

    // facebook
    Route::get('/facebook', [LoginController::class,'facebook']) -> name('.facebook');
    Route::get('/facebook/callback', [LoginController::class,'facebook_callback']) -> name('facebook_callback');

    // google
    Route::get('/google', [LoginController::class,'google']) -> name('.google');
    Route::get('/google/callback', [LoginController::class,'google_callback']) -> name('google_callback');
    
});
/** Register */
Route::prefix('/register') -> name('register') -> group(function () {
    Route::get('/', [LoginController::class, 'registerView']) -> name('index');
    Route::post('/post', [LoginController::class, 'register']) -> name('post');
    Route::get('/active_account/{id}/{token}', [LoginController::class, 'active_account']) -> name('.activate_account');
}); 

/** log out */
Route::get('/logout', [LoginController::class, 'logout']) -> middleware('checkLoginUser') -> name('logout');
// active

/** cart  */
Route::prefix('cart') -> name('cart.') -> group( function () {
    Route::get('/', [CartController::class, 'index']);

    Route::post('/add', [CartController::class, 'add']) -> name('add');

    Route::get('remove/{id}/{book_id}', [CartController::class, 'remove']) -> name('remove');

    Route::post('update', [CartController::class, 'update']) -> name('update');

    Route::post('discount', [CartController::class, 'discount']) -> name('discount'); 

    Route::post('/test', [CartController::class, 'test']) -> name('test'); 
    
}); 



/** Checkout order book */
Route::prefix('checkout') -> middleware('checkLoginUser') ->  name('checkout.') -> group( function () {

    Route::post('/', [CheckoutController::class, 'index']);

    Route::post('/insert', [CheckoutController::class, 'insert_shipping']) ->name('insert_shipping');

    Route::post('/insert_order', [CheckoutController::class, 'insert_order']) -> name('insert_order');
   
});
Route::post('/t1', [CheckoutController::class, 'insert_shipping']) -> name('t1');

Route::get('/t2', [CheckoutController::class, 'insert_shipping']) -> name('t2');

/** my account */
Route::prefix('myAccount') -> middleware('checkLoginUser') ->  name('myAccount.') -> group( function () {
    Route::get('/', [MyAccountController::class, 'index']); 
    Route::post('/', [MyAccountController::class, 'updateAccount']) -> name('update'); 

    Route::get('/order', [MyAccountController::class, 'order']) -> name('order'); 
    
}); 

/** Login auth */
Route::get('/register-auth',[AuthenController::class,'register_auth']);
Route::post('/register',[AuthenController::class,'register']);
Route::get('/login-auth',[AuthenController::class,'login_auth']);
Route::post('/login-auth',[AuthenController::class,'login_authentication']);
Route::get('/logout-auth',[AuthenController::class,'logout_auth']);

Route::post('/tim-kiem',[HomeController::class,'search']);
Route::post('/autocomplete-ajax',[HomeController::class,'autocomplete_ajax']);  
 