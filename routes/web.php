<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductCategoryController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontController::class,'index'])->name('home');
Route::get('/about',[FrontController::class,'about'])->name('about');
Route::get('/faq',[FrontController::class,'faq'])->name('faq');
Route::get('/contact',[FrontController::class,'contact'])->name('contact');
Route::get('/blog',[FrontController::class,'blog'])->name('blog');
Route::get('/products',[FrontController::class,'products'])->name('products');
Route::get('/products/{slug}',[FrontController::class,'products_single'])->name('products_single');
Route::get('/cart',[FrontController::class,'cart'])->name('cart');
Route::get('/checkout',[FrontController::class,'checkout'])->name('checkout');
Route::get('/privacy',[FrontController::class,'privacy'])->name('privacy');
Route::get('/terms-conditions',[FrontController::class,'terms'])->name('terms');


//user route
   Route::middleware('auth')->group(function(){
Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard');
Route::get('/profile',[UserController::class,'profile'])->name('profile');
Route::put('/profile-submit',[UserController::class,'profileSubmit'])->name('profile_submit');
Route::get('/wishlist',[UserController::class,'wishlist'])->name('wishlist');
Route::get('/orders',[UserController::class,'orders'])->name('orders');
Route::get('/orders/{id}',[UserController::class,'orders_single'])->name('orders_single');


});
Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/register',[UserController::class,'register_submit'])->name('register_submit');
Route::get('/register-verify/{token}/{email}', [UserController::class, 'register_verify'])->name('register_verify');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'login_submit'])->name('login_submit');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::get('/forget-password',[UserController::class,'forget_password'])->name('forget_password');
Route::post('/forget-password-submit',[UserController::class,'forget_password_submit'])->name('forget_password_submit');
Route::get('/reset-password/{token}/{email}',[UserController::class,'reset_password'])->name('reset_password');
Route::post('/reset-password/{token}/{email}',[UserController::class,'reset_password_submit'])->name('reset_password_submit');
// Admin routes

Route::prefix('admin')->group(function(){
    Route::get('/', function () {
    return redirect()->route('admin_login');
});
Route::get('/login',[AdminController::class,'login'])->name('admin_login');
Route::post('/login',[AdminController::class,'login_submit'])->name('admin_login_submit');
Route::get('/logout',[AdminController::class,'logout'])->name('admin_logout');
Route::get('/forget-password',[AdminController::class,'forget_password'])->name('admin_forget_password');
Route::post('/forget-password-submit',[AdminController::class,'forget_password_submit'])->name('admin_forget_password_submit');
Route::get('/admin-reset-password/{token}/{email}',[AdminController::class,'reset_password'])->name('admin_reset_password');
Route::post('/admin-reset-password/{token}/{email}',[AdminController::class,'reset_password_submit'])->name('admin_reset_password_submit');
});
// Admin logged In Routes
Route::middleware('admin')->prefix('admin')->group(function(){
Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin_dashboard');
Route::get('/profile',[AdminController::class,'profile'])->name('admin_profile');
Route::put('/profile-submit',[AdminController::class,'profileSubmit'])->name('admin_profile_submit');

//admin user route
Route::get('/user',[AdminUserController::class,'user_index'])->name('admin_user_index');
Route::get('/user/create',[AdminUserController::class,'user_create'])->name('admin_user_create');
Route::post('/user/submit',[AdminUserController::class,'user_submit'])->name('admin_user_submit');
Route::get('/user/edit/{id}',[AdminUserController::class,'user_edit'])->name('admin_user_edit');
Route::put('/user/update/{id}',[AdminUserController::class,'user_update'])->name('admin_user_update');
Route::get('/user/delete/{id}',[AdminUserController::class,'user_delete'])->name('admin_user_delete');
// product category routes
Route::get('/product-category',[AdminProductCategoryController::class,'product_category_index'])->name('admin_product_category_index');
Route::get('/product-category/create',[AdminProductCategoryController::class,'product_category_create'])->name('admin_product_category_create');
Route::post('/product-category/submit',[AdminProductCategoryController::class,'product_category_submit'])->name('admin_product_category_submit');
Route::get('/product-category/edit/{id}',[AdminProductCategoryController::class,'product_category_edit'])->name('admin_product_category_edit');
Route::put('/product-category/update/{id}',[AdminProductCategoryController::class,'product_category_update'])->name('adminproduct_category_update');
Route::get('/product-category/delete/{id}',[AdminProductCategoryController::class,'product_category_delete'])->name('admin_product_category_delete');
});
