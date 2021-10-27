<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CartController;
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

Route::get('/',[HomeController::class,'index']);
Route::get('/admin',[AdminController::class,'index']);
Route::get('/dashboard',[AdminController::class,'show_dasdboard']);
Route::get('/logout',[AdminController::class,'logout']);

//checklogin
Route::post('/admin-dashboard',[AdminController::class,'check_login']);

//category
Route::get('/show-category',[CategoryProduct::class,'showCategory']);
Route::get('/add-category',[CategoryProduct::class,'addCategory']);
Route::post('/save-category-product',[CategoryProduct::class,'saveCategory']);
Route::get('/undisplay-category-product/{id}',[CategoryProduct::class,'unDisplayCategory']);
Route::get('/display-category-product/{id}',[CategoryProduct::class,'displayCategory']);



Route::get('/edit-category-product/{id}',[CategoryProduct::class,'editCategory']);



Route::get('/delete-category-product/{id}',[CategoryProduct::class,'deleteCategory']);


//brand
Route::get('/show-brand',[BrandController::class,'showBrand']);
Route::get('/add-brand',[BrandController::class,'addBrand']);
Route::post('/save-brand',[BrandController::class,'saveBrand']);
Route::get('/undisplay-brand/{id}',[BrandController::class,'unDisplayBrand']);
Route::get('/display-brand/{id}',[BrandController::class,'displayBrand']);
Route::get('/edit-brand/{id}',[BrandController::class,'editBrand']);
Route::get('/delete-brand/{id}',[BrandController::class,'deleteBrand']);


//supplier
Route::get('/show-supplier',[SupplierController::class,'showSupplier']);
Route::get('/add-supplier',[SupplierController::class,'addSupplier']);
Route::post('/save-supplier',[SupplierController::class,'saveSupplier']);
Route::get('/undisplay-supplier/{id}',[SupplierController::class,'unDisplaySupplier']);
Route::get('/display-supplier/{id}',[SupplierController::class,'displaySupplier']);
Route::get('/edit-supplier/{id}',[SupplierController::class,'editSupplier']);
Route::get('/delete-supplier/{id}',[SupplierController::class,'deleteSupplier']);


//product-admin
Route::get('/show-product-admin',[ProductController::class,'showProduct']);
Route::get('/add-product-admin',[ProductController::class,'addProduct']);

//cart
Route::get('/cart',[CartController::class,'showCart']);








