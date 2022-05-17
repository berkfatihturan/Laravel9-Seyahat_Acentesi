<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminPanel\AdminHomeController as AdminHomeController;
use \App\Http\Controllers\AdminPanel\CategoryContoller as AdminCategoryController;
use \App\Http\Controllers\AdminPanel\PackageController as AdminPackageController;
use \App\Http\Controllers\AdminPanel\ImageController as AdminImageController;
use \App\Http\Controllers\AdminPanel\MessageController as AdminMessageController;
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
/*
Route::get('/', function () {
    return view('welcome');
});
/* Home Page */
Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/about', [HomeController::class, 'about'])->name("about");
Route::get('/references',[HomeController::class, 'references'])->name("references");
Route::get('/contact', [HomeController::class, 'contact'])->name("contact");
Route::post('/storemessage', [HomeController::class, 'storemessage'])->name("storemessage");

/* Home Page */
Route::post('/search', [HomeController::class, 'search'])->name("home_search");
Route::get('/list', [HomeController::class, 'list'])->name("home_list");
Route::get('/package/{pid}', [HomeController::class, 'package'])->name("home_package");


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


/* Admin Panel Routes*/
Route::prefix('admin')->name("admin_")->group(function (){

    Route::get('/',[AdminHomeController::class,'index'])->name('index');

    /*Admin General Route */
    Route::get('/setting',[AdminHomeController::class,'setting'])->name('setting');
    Route::post('/setting/update',[AdminHomeController::class,'settingUpdate'])->name('setting_update');

    /* Admin Controller Panel Routes*/
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

    /* Admin Package Panel Routes*/
    Route::prefix('/package')->name("package_")->controller(AdminPackageController::class)->group(function (){

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

    /* Admin Image Panel Routes*/
    Route::prefix('/image')->name("image_")->controller(AdminImageController::class)->group(function (){

        Route::get('/{pid}', 'index')->name('index');
        /* -create-*/
        Route::post('/store/{pid}', 'store')->name('store');
        /* -update- */
        Route::get('/update/{pid}/{id}', 'update')->name('update');
        /* -delete- */
        Route::get('/destroy/{pid}/{id}', 'destroy')->name('destroy');

    });


    /* Admin Message Panel Routes*/
    Route::prefix('/message')->name("message_")->controller(AdminMessageController::class)->group(function (){

        Route::get('/', 'index')->name('index');
        /* -show- */
        Route::get('/show/{id}', 'show')->name('show');
        /* -update- */
        Route::post('/update/{id}', 'update')->name('update');
        /* -delete- */
        Route::get('/destroy/{id}', 'destroy')->name('destroy');

    });
});
