<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\TestController;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

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




// Test Route

Route::get('/test1', function(){
    // Schema::create("test", function($table){
    //     $table->increments("id");

    // });
    // DB::table('categories')->insert(["name"=>"Vay Nam", "slug"=>"vay-nam", "parent"=> 1]);
    // DB::table('categories')->insert([
    //     ["name"=>"Vay Nam", "slug"=>"vay-nam-dep", "parent" => 1],
    //     ["name"=>"Vay Nam", "slug"=>"vay-nam-xau", "parent" => 1]
    // ]);
    // DB::table('categories')->where("id", 8) -> update(["slug" => "vay-nam-cute"]);

    // $categories = DB::table('products')->join('categories', "products.categories_id", "=", "categories.id")->select("products.name as product_name", "categories.name as category_name")->get()->all();
    // dd($categories);
    
    $products = Category::find(2)->product->toArray();
    dd($products);

    
    
});



//// Route Login

Route::Group(["prefix" => "login", "middleware" => "checklogin"], function(){
    Route::get('/',[AuthController::class, "getLogin"]);
    
    Route::post('/',[AuthController::class, "postLogin"]);
});



//// Route Admin


Route::Group(["prefix" => "admin", "middleware" => "checkadmin"], function(){

   Route::get('/',[AdminController::class, "index"]);

   Route::get('/logout',[AdminController::class, "logout"]);

   //// route product


   Route::Group(["prefix" => "product"], function(){

    Route::get('/', [ProductController::class, "index"]);
    
    Route::get('/create',[ProductController::class, "create"]);
    
    Route::post('/create', [ProductController::class, "store"]);

    Route::get('/edit/{id}', [ProductController::class, "edit"]);

    Route::post('/edit/{id}', [ProductController::class, "update"]);

    Route::get('/delete/{id}', [ProductController::class, "delete"]);

   });

   //// route category

   Route::Group(["prefix" => "category"], function(){

    Route::get('/', [CategoryController::class, "index"]);
    
    Route::post('/', [CategoryController::class, "store"]);

    Route::get('/edit/{id}', [CategoryController::class, "edit"]);

    Route::post('/edit/{id}', [CategoryController::class, "update"]);

    Route::get('/delete/{id}', [CategoryController::class, "delete"]);

   });

   //// route user

   Route::Group(["prefix" => "user"], function(){

    Route::get('/', [UserController::class, "index"]);
    
    Route::get('/create',[UserController::class, "create"]);
    
    Route::post('/create', [UserController::class, "store"]);

    Route::get('/edit/{id}', [UserController::class, "edit"]);

    Route::post('/edit/{id}', [UserController::class, "update"]);

    Route::get('/delete/{id}', [UserController::class, "delete"]);

   });

   //// ROUTER orders
   Route::Group(["prefix" => "order"], function(){

    Route::get('/', [OrderController::class, "index"]);
    Route::get('/processed', [OrderController::class, "processed"]);
    Route::get('/detail/{id}', [OrderController::class, "detail"]);
    Route::post('/detail/{id}', [OrderController::class, "postdetail"]);
    
    
  

   });
   
   

});

//////////FRONTEND///////////

Route::get('/', [FrontendController::class, "index"]);
Route::get('/detail/{id}/{slug}.html', [FrontendController::class, "detail"]);
Route::post('/detail/{id}/{slug}.html', [FrontendController::class, "postComment"]);
Route::get('/category/{id}/{slug}', [FrontendController::class, "category"]);
Route::get('/search', [FrontendController::class, "search"]);
Route::get('/addtocart/{id}', [FrontendController::class, "addtocart"]);
Route::get('/showcart', [FrontendController::class, "showcart"]);
Route::get('/updatecart', [FrontendController::class, "updatecart"]);
Route::get('/deletecart', [FrontendController::class, "deletecart"]);
Route::get('/deleteall', [FrontendController::class, "deleteall"]);
Route::post('/showcart', [FrontendController::class, "complete"]);
Route::get('/success', [FrontendController::class, "success"]);