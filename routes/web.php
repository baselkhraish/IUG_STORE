<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\StoreController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\site\SiteController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [SiteController::class,'index'])->name('site.index');

Route::get('/store/search', [SiteController::class,'search_store'])->name('site.search');
Route::get('/product/search', [SiteController::class,'search_product'])->name('product.search');
Route::get('/shop', [SiteController::class,'shop'])->name('site.shop');
Route::get('/store', [SiteController::class,'store'])->name('site.store');


Route::get('shop/{product}/product_single',[SiteController::class,'product_single'])->name('product.show');

Route::get('shop/{shop}/shop_single',[SiteController::class,'shop_single'])->name('shop.show');

Route::post('/transactions/{id}',[SiteController::class,'transactions'])->name('site.transactions');



Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::get('/transaction',[AdminController::class,'transaction'])->name('transaction');

    Route::get('/total',[AdminController::class,'total'])->name('total');

    Route::resource('store', StoreController::class);
    Route::resource('product', ProductController::class);
    Route::get('trash',[AdminController::class,'trash'])->name('trash');
    Route::get('/stores/trashed',[StoreController::class,'trashed'])->name('stores.trashed');
    Route::post('/stores/trashed/{id}/restore',[StoreController::class,'trashedRestore'])->name('stores.trashed.restore');
    Route::post('/stores/trashed/{id}/delete',[StoreController::class,'trashedDelete'])->name('stores.trashed.destroy');

    Route::get('/products/trashed',[ProductController::class,'trashed'])->name('products.trashed');
    Route::post('/products/trashed/{id}/restore',[ProductController::class,'trashedRestore'])->name('products.trashed.restore');
    Route::post('/products/trashed/{id}/delete',[ProductController::class,'trashedDelete'])->name('products.trashed.destroy');
});


