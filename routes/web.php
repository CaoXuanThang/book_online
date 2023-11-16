<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Client\ReviewController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\MarketingBannerController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Client\DirectoryController;
use App\Http\Controllers\Client\BookController as ClientBookController;
use App\Http\Controllers\Client\PromotionController as ClientPromotionController;


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

//login
Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
//register
Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('register');
// logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
  Route::get('/', [AdminController::class, 'index'])->name('admin');
  //brand
  Route::get('/brand', [BrandController::class, 'index'])->name('admin.brand.index');
  Route::match(['get', 'post'], '/brand/create', [BrandController::class, 'create'])->name('admin.brand.create');
  Route::match(['get', 'post'], '/brand/edit/{brand}', [BrandController::class, 'edit'])->name('admin.brand.edit');
  Route::get('/brand/delete/{brand}', [BrandController::class, 'destroy'])->name('admin.brand.delete');

  //category
  Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
  Route::match(['get', 'post'], '/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
  Route::match(['get', 'post'], '/category/edit/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
  Route::get('/category/delete/{category}', [CategoryController::class, 'destroy'])->name('admin.category.delete');

  //invoice
  Route::get('/invoice', [InvoiceController::class, 'index'])->name('admin.invoice.index');
  Route::get('/invoice/detail/{invoice}', [InvoiceController::class, 'detail'])->name('admin.invoice.detail');
  Route::post('/invoice/update/{invoice}', [InvoiceController::class, 'update'])->name('admin.invoice.update');

  //marketing banner
  Route::get('/marketing_banner', [MarketingBannerController::class, 'index'])->name('admin.marketing_banner.index');
  Route::match(['get', 'post'], '/marketing_banner/create', [MarketingBannerController::class, 'create'])->name('admin.marketing_banner.create');
  Route::match(['get', 'post'], '/marketing_banner/edit/{marketing_banner}', [MarketingBannerController::class, 'edit'])->name('admin.marketing_banner.edit');
  Route::get('/marketing_banner/delete/{marketing_banner}', [MarketingBannerController::class, 'destroy'])->name('admin.marketing_banner.delete');

  // book
  Route::get('/book', [BookController::class, 'index'])->name('admin.book.index');
  Route::match(['get', 'post'], '/book/create', [BookController::class, 'create'])->name('admin.book.create');
  Route::match(['get', 'post'], '/book/edit/{book}', [BookController::class, 'edit'])->name('admin.book.edit');
  Route::get('/book/delete/{book}', [BookController::class, 'destroy'])->name('admin.book.delete');

  //promotion
  Route::get('/promotion', [PromotionController::class, 'index'])->name('admin.promotion.index');
  Route::match(['get', 'post'], '/promotion/create', [PromotionController::class, 'create'])->name('admin.promotion.create');
  Route::match(['get', 'post'], '/promotion/edit/{promotion}', [PromotionController::class, 'edit'])->name('admin.promotion.edit');
  Route::get('/promotion/delete/{promotion}', [PromotionController::class, 'destroy'])->name('admin.promotion.delete');

  //review
  Route::get('/review', [AdminReviewController::class, 'index'])->name('admin.review.index');
  //user
  Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');
});


// client.cart.create
Route::post('/cart/create', [CartController::class, 'create'])->name('client.cart.create');
//client home
Route::get('/', [HomeController::class, 'index'])->name('client.home');
Route::get('/directory', [DirectoryController::class, 'index'])->name('client.directory');
// client.detail
Route::get('/detail/{book}', [ClientBookController::class, 'detail'])->name('client.detail');
// cart
Route::get('/cart', [CartController::class, 'index'])->name('client.cart');
//client.cart.update
Route::post('/cart/update', [CartController::class, 'update'])->name('client.cart.update');
// client.cart.delete
Route::get('/cart/{id}/delete', [CartController::class, 'destroy'])->name('client.cart.delete');
Route::get('/cart/delete', [CartController::class, 'destroyAll'])->name('client.cart.deleteAll');
//client.promotion post
Route::post('/promotion/addPromotion', [ClientPromotionController::class, 'addPromotion'])->name('client.promotion.addToCart');
//order
Route::get('/order', [OrderController::class, 'index'])->name('client.order.index');
// client.order.create
Route::post('/order/create', [OrderController::class, 'create'])->name('client.order.create');
//client.order.list
Route::get('/order/list', [OrderController::class, 'list'])->name('client.order.list');
// client.order.detail
Route::get('/order/detail/{order}', [OrderController::class, 'detail'])->name('client.order.detail');
Route::middleware('auth')->group(function () {
  //client.profile
  Route::get('/profile', [ProfileController::class, 'index'])->name('client.profile');
  // client.profile.update
  Route::post('/profile/update', [ProfileController::class, 'update'])->name('client.profile.update');
  Route::post('/review/store', [ReviewController::class, 'store'])->name('client.review.store');
});
