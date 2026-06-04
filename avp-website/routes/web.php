<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Product routes
Route::get('/api/search-products', [ProductController::class, 'searchJson'])->name('api.products.search');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/category/{slug}', [ProductController::class, 'category'])->name('category.show');

// Blog routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');

// Gallery routes
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('gallery.show');

// Contact routes
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Service routes
Route::get('/dich-vu/nap-muc-in', function () {
    return view('services.nap-muc-in');
})->name('services.nap-muc-in');

Route::get('/dich-vu/cho-thue-photocopy', function () {
    return view('services.cho-thue-photocopy');
})->name('services.cho-thue-photocopy');

Route::get('/dich-vu/sua-chua-may-tinh', function () {
    return view('services.sua-chua-may-tinh');
})->name('services.sua-chua-may-tinh');

Route::get('/dich-vu/sua-chua-may-in', function () {
    return view('services.sua-chua-may-in');
})->name('services.sua-chua-may-in');

Route::get('/dich-vu', function () {
    return view('services.index');
})->name('services.index');

Route::get('/dich-vu/camera-quan-sat', function () {
    return view('services.camera-quan-sat');
})->name('services.camera-quan-sat');

Route::get('/dich-vu/he-thong-server', function () {
    return view('services.he-thong-server');
})->name('services.he-thong-server');

Route::get('/dich-vu/cho-thue-thiet-bi-ngan-han', function () {
    return view('services.cho-thue-thiet-bi-ngan-han');
})->name('services.cho-thue-thiet-bi-ngan-han');

Route::get('/gioi-thieu', function () {
    return view('about');
})->name('about');

// Cart routes
use App\Http\Controllers\CartController;
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/checkout', [CartController::class, 'placeOrder'])->name('cart.place_order');


// Auth routes
use App\Http\Controllers\Auth\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin routes (admin access enforced in controller)
    Route::get('/admin/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders.index');
    Route::post('/admin/orders/{id}/status', [\App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('admin.orders.update_status');
});