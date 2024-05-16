<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [AuthController::class, 'index'])->name('index');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginPost', [AuthController::class, 'loginPost'])->name('loginPost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/product', [AuthController::class, 'product'])->name('product');
Route::get('/productDetail/{id}', [AuthController::class, 'productDetail'])->name('productDetail');

Route::get('/team', [AuthController::class, 'team'])->name('team');
Route::get('/address', [AuthController::class, 'address'])->name('address');
Route::get('/cart', [AuthController::class, 'cart'])->name('cart');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/product', [AdminController::class, 'product'])->name('admin.product');
    Route::post('/admin/addProduct', [AdminController::class, 'addProduct'])->name('admin.addProduct');
    Route::post('/admin/updateProduct', [AdminController::class, 'updateProduct'])->name('admin.updateProduct');
    Route::get('/admin/deleteProduct/{id}', [AdminController::class, 'deleteProduct'])->name('admin.deleteProduct');
    
    
    Route::get('/admin/category', [AdminController::class, 'category'])->name('admin.category');
    Route::post('/admin/addCategory', [AdminController::class, 'addCategory'])->name('admin.addCategory');
    Route::post('/admin/updateCategory', [AdminController::class, 'updateCategory'])->name('admin.updateCategory');
    Route::get('/admin/deleteCategory/{id}', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
    
    Route::get('/admin/order', [AdminController::class, 'order'])->name('admin.order');
    Route::get('/admin/detailOrder/{kodePesanan}', [AdminController::class, 'detailOrder'])->name('admin.detailOrder');
    Route::get('/admin/confirmOrder/{kode_pesanan}', [AdminController::class, 'confirmOrder'])->name('admin.confirmOrder');
    Route::get('/admin/downloadPaymentProof/{payment_proof}', [AdminController::class, 'downloadPaymentProof'])->name('admin.downloadPaymentProof');
});
Route::group(['middleware' => 'user'], function () {
    Route::post('/addToCart', [UserController::class, 'addToCart'])->name('addToCart');
    Route::get('/cart', [UserController::class, 'cart'])->name('cart');
    Route::post('/minQtyCart', [UserController::class, 'minQtyCart'])->name('minQtyCart');
    Route::post('/addQtyCart', [UserController::class, 'addQtyCart'])->name('addQtyCart');
    Route::get('/deleteCart/{id}', [UserController::class, 'deleteCart'])->name('deleteCart');
    
    Route::get('/prosesCheckout', [UserController::class, 'prosesCheckout'])->name('prosesCheckout');
    Route::get('/order/{kodePesanan}', [UserController::class, 'order'])->name('order');
    Route::get('/deleteOrderProduct/{id}', [UserController::class, 'deleteOrderProduct'])->name('deleteOrderProduct');
    Route::post('/orderPost', [UserController::class, 'orderPost'])->name('orderPost');
    
    Route::get('/orders', [UserController::class, 'orders'])->name('orders');
    Route::get('/detailOrder/{kodePesanan}', [UserController::class, 'detailOrder'])->name('detailOrder');
    
});