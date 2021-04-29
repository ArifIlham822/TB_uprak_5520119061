<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [App\Http\Controllers\BrandController::class,'index'])
    ->name('admin.home')
    ->middleware('is_admin');

Route::get('admin/brands', [App\Http\Controllers\BrandController::class, 'brands'])
    ->name('admin.brands')
    ->middleware('is_admin');

//ajax
Route::get('admin/ajaxadmin/databrand/{id}', [App\Http\Controllers\BrandController::class, 'getdatabrand']);

//penambahan brand
Route::post('admin/brands', [App\Http\Controllers\BrandController::class, 'submit_brand'])
    ->name('admin.brand.submit')
    ->middleware('is_admin');



//edit brand
Route::patch('admin/brands/update', [App\Http\Controllers\BrandController::class, 'update_brand'])
    ->name('admin.brand.update')
    ->middleware('is_admin');


//delete brand
Route::delete('admin/brands/delete', [App\Http\Controllers\BrandController::class, 'delete_brand'])
    ->name('admin.brand.delete')
    ->middleware('is_admin');



//awal categorie
Route::get('admin/categories', [App\Http\Controllers\CategorieController::class, 'categories'])
    ->name('admin.categories')
    ->middleware('is_admin');

//penambahan categorie
Route::post('admin/categories', [App\Http\Controllers\CategorieController::class, 'submit_categories'])
    ->name('admin.categorie.submit')
    ->middleware('is_admin');

//edit categorie
Route::patch('admin/categories/update', [App\Http\Controllers\CategorieController::class, 'update_categorie'])
    ->name('admin.categories.update')
    ->middleware('is_admin');
Route::get('admin/ajaxadmin/DataCategories/{id}', [App\Http\Controllers\CategorieController::class, 'getdataCate']);

Route::delete('admin/categories/delete', [App\Http\Controllers\CategorieController::class, 'delete_categorie'])
    ->name('admin.categorie.delete')
    ->middleware('is_admin');



// pengelolaan Product
Route::get('admin/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product');
Route::get('admin/ajax/dataProduct/{id}', [App\Http\Controllers\ProductController::class, 'getDataProduct']);

Route::post('admin/product', [App\Http\Controllers\ProductController::class, 'submit_product'])
->name('admin.product.submit');


Route::patch('admin/product/update', [App\Http\Controllers\ProductController::class, 'update_product'])
->name('admin.product.update');


Route::delete('admin/product/delete', [App\Http\Controllers\ProductController::class, 'delete_product'])
->name('admin.product.delete');
