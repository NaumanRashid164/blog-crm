<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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
    return view('auth.login');
})->middleware("guest");

// Route::get("/",[UserController::class,"index"]);


Route::group(['prefix' => 'artisan'], function () {
    Route::get('clear', function () {
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        return 'Successfully Cleared !';
    });
});

Route::middleware("auth")->group(function () {

    Route::get("/dashboard", [AdminController::class, "index"])->name("dashboard");
    Route::get("/setup", [SetupController::class, "index"])->name("setup.index");


    // Setup
    Route::name('tag.')->prefix('tag')->controller(TagController::class)->group(function () {

        Route::get('/', 'index')->name('index');

        Route::get('/list', 'list')->name('ajax.list');

        Route::get('/addfrom', 'addfrom')->name('ajax.addfrom');

        Route::post('/addTag', 'addTag')->name('ajax.addTag');

        Route::get('/edit/{id}', 'edit')->name('ajax.edit');

        Route::get('/delete/{id}',  'delete')->name('ajax.delete');
    });

    Route::name('category.')->prefix('category')->controller(CategoryController::class)->group(function () {

        Route::get('/', 'index')->name('index');

        Route::get('/list', 'list')->name('ajax.list');

        Route::get('/addfrom', 'addfrom')->name('ajax.addfrom');

        Route::post('/addCategory', 'addCategory')->name('ajax.addCategory');

        Route::get('/edit/{id}', 'edit')->name('ajax.edit');

        Route::get('/status',  'status')->name('status');

        Route::get('/delete/{id}',  'delete')->name('ajax.delete');
    });

    Route::name('gallery.')->prefix('gallery')->controller(GalleryController::class)->group(function () {

        Route::get('/', 'index')->name('index');

        Route::get('/list', 'list')->name('ajax.list');

        Route::get('/addfrom', 'addfrom')->name('ajax.addfrom');

        Route::post('/addFile', 'addFile')->name('ajax.addFile');
    });


    // Post 
    Route::name('post.')->prefix('post')->controller(PostController::class)->group(function () {

        Route::get('/', 'index')->name('index');

        Route::get('/list', 'list')->name('ajax.list');

        Route::get('/addfrom', 'addfrom')->name('ajax.addfrom');

        Route::post('/addPost', 'addPost')->name('ajax.addPost');

        Route::get('/edit/{id}', 'edit')->name('ajax.edit');

        Route::post("/blog/Images", 'blogImage')->name("blog_images");

        Route::get('/status',  'status')->name('status');

        Route::get('/feature',  'feature')->name('feature');

        Route::get('/delete/{id}',  'delete')->name('ajax.delete');
    });
});

require __DIR__ . '/auth.php';
