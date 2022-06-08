<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminPanel\AdminHomeController as AdminHomeController;
use \App\Http\Controllers\AdminPanel\CategoryContoller as AdminCategoryController;
use \App\Http\Controllers\AdminPanel\PackageController as AdminPackageController;
use \App\Http\Controllers\AdminPanel\ImageController as AdminImageController;
use \App\Http\Controllers\AdminPanel\MessageController as AdminMessageController;
use App\Http\Controllers\AdminPanel\FaqController as AdminFaqController;
use App\Http\Controllers\AdminPanel\CommentController as AdminCommentController;
use App\Http\Controllers\AdminPanel\AdminUserController as AdminUserController;
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

Route::get('/a', function () {
    return view('welcome');
});
/* Home Page */
Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/about', [HomeController::class, 'about'])->name("about");
Route::get('/references',[HomeController::class, 'references'])->name("references");
Route::get('/contact', [HomeController::class, 'contact'])->name("contact");
Route::post('/storemessage', [HomeController::class, 'storemessage'])->name("storemessage");
Route::get('/faq',[HomeController::class,'faq'])->name("home_faq");
Route::post('/packagecomment',[HomeController::class,'packagecomment'])->name("packagecomment");
Route::view('/loginuser','home.login');
Route::view('/registeruser','home.register');


Route::get('/logoutuser', [AdminHomeController::class, 'logout'])->name("logoutuser");

Route::view('/loginadmin','admin.login')->name('loginadmin');
Route::post('/loginadmincheck', [AdminHomeController::class, 'loginAdmincheck'])->name("loginAdmincheck");

/* Home Page */
Route::post('/search', [HomeController::class, 'search'])->name("home_search");
Route::get('/list', [HomeController::class, 'list'])->name("home_list");
Route::get('/package/{pid}', [HomeController::class, 'package'])->name("home_package");
Route::get('/categorypackage/{id}/{slug}', [HomeController::class, 'categorypackage'])->name("home_categorypackage");


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


/* Admin Panel Routes*/
Route::middleware(['auth'])->group(function (){

    Route::prefix('userpanel')->name('userpanel_')->controller(UserController::class)->group(function (){

        Route::get('/','index')->name('index');
        Route::get('/comments','comments')->name('comments');
        Route::get('/commentsDestroy/{id}','commentDestroy')->name('commentsdestroy');
        Route::post('/commentUpdate/{id}','commentUpdate')->name("commentUpdate");
    });



    Route::middleware(['admin'])->prefix('admin')->name("admin_")->group(function (){

        Route::get('/',[AdminHomeController::class,'index'])->name('index');

        /*Admin General Route */
        Route::get('/setting',[AdminHomeController::class,'setting'])->name('setting');
        Route::post('/setting/update',[AdminHomeController::class,'settingUpdate'])->name('setting_update');

        /*deneme*/
        Route::get('/mainStyleSetting',[AdminHomeController::class,'mainStyleSetting'])->name('mainStyleSetting');
        Route::get('/mainStyleSetting_show/{id}',[AdminHomeController::class,'mainStyleSetting_Show'])->name('mainStyleSetting_show');
        Route::post('/mainStyleSetting_Store/{pid}',[AdminHomeController::class,'mainStyleSetting_Store'])->name('mainStyleSetting_store');


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
            Route::post('/update/{id}', 'update')->name('update');
            /* -delete- */
            Route::get('/destroy/{pid}/{id}', 'destroy')->name('destroy');
            /* edit */
            Route::get('/edit/{id}', 'edit')->name('edit');

            Route::get('/show/{id}', 'show')->name('show');
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

        /* Admin FAQ Panel Routes*/
        Route::prefix('/faq')->name("faq_")->controller(AdminFaqController::class)->group(function (){

            Route::get('/', 'index')->name('index');
            /* -create- */
            Route::get('/create', 'create')->name('create');
            /* -store- */
            Route::post('/store', 'store')->name('store');
            /* -edit- */
            Route::get('/edit/{id}', 'edit')->name('edit');
            /* -show- */
            Route::get('/show/{id}', 'show')->name('show');
            /* -update- */
            Route::post('/update/{id}', 'update')->name('update');
            /* -delete- */
            Route::get('/destroy/{id}', 'destroy')->name('destroy');

        });

        /* Admin Commment Panel Routes*/
        Route::prefix('/comment')->name("comment_")->controller(AdminCommentController::class)->group(function (){

            Route::get('/', 'index')->name('index');
            /* -show- */
            Route::get('/show/{id}', 'show')->name('show');
            /* -update- */
            Route::post('/update/{id}', 'update')->name('update');
            /* -delete- */
            Route::get('/destroy/{id}', 'destroy')->name('destroy');

        });

        /* Admin User Panel Routes*/
        Route::prefix('/user')->name("user_")->controller(AdminUserController::class)->group(function (){

            Route::get('/', 'index')->name('index');
            /* -edit- */
            Route::get('/edit/{id}', 'edit')->name('edit');
            /* -show- */
            Route::get('/show/{id}', 'show')->name('show');
            /* -update- */
            Route::post('/update/{id}', 'update')->name('update');
            /* -Add Role- */
            Route::post('/addRole/{id}', 'addRole')->name('addRole');
            /* -Delete Role- */
            Route::get('/deleteRole/{rid}/{uid}', 'deleteRole')->name('deleteRole');
            /* -delete- */
            Route::get('/destroy/{id}', 'destroy')->name('destroy');

        });

    });
});
