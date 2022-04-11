<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;
use \App\Http\Controllers\AdminPanel\CategoryContoller as AdminCategoryController;
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

Route::get('/home', [HomeController::class, 'index']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/* Admin Panel Routes*/
Route::prefix('admin')->name("admin_")->group(function (){

    Route::get('/',[AdminHomeController::class,'index'])->name('index');

    /* Admin Panel Routes*/
    Route::prefix('/category')->name("category_")->controller(AdminCategoryController::class)->group(function (){

        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        /* -create-*/
        Route::post('/store', 'store')->name('store');
        /* -update- */
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        /* -delete- */
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
        /* -show- */
        Route::get('/show/{id}', 'show')->name('show');

    });
});
