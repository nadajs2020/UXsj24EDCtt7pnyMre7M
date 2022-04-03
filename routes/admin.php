<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\VendorsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LanguagesController;
use App\Http\Controllers\Admin\MainCategoriesController;




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

// Route::get('/home', function () {
//     return view('front.home');
// });


//, 'middleware' => 'auth:admin'
define('PAGINATION_COUNT', 10);

Route::group(['namespace' => 'Admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    ######################### Begin Languages Route ########################
    Route::group(['prefix' => 'languages'], function () {
        Route::get('/', [LanguagesController::class, 'index'])->name('admin.languages');
        Route::get('/create', [LanguagesController::class, 'create'])->name('admin.languages.create');
        Route::post('/store', [LanguagesController::class, 'store'])->name('admin.languages.store');

        Route::get('/edit/{id}', [LanguagesController::class, 'edit'])->name('admin.languages.edit');
        Route::post('/update/{id}', [LanguagesController::class, 'update'])->name('admin.languages.update');
        Route::get('/delete/{id}', [LanguagesController::class, 'destroy'])->name('admin.languages.delete');
    });
    ######################### End Languages Route ########################
    ######################### Begin Main Categoris Routes ########################
    Route::group(['prefix' => 'main_categories'], function () {
        Route::get('/', [MainCategoriesController::class, 'index'])->name('admin.maincategories');
        Route::get('/create', [MainCategoriesController::class, 'create'])->name('admin.maincategories.create');
        Route::post('/store', [MainCategoriesController::class, 'store'])->name('admin.maincategories.store');
        Route::get('/edit/{id}', [MainCategoriesController::class, 'edit'])->name('admin.maincategories.edit');
        Route::post('/update/{id}', [MainCategoriesController::class, 'update'])->name('admin.maincategories.update');
        Route::get('/delete/{id}', [MainCategoriesController::class, 'destroy'])->name('admin.maincategories.delete');
        Route::get('changeStatus/{id}', [MainCategoriesController::class, 'changeStatus'])->name('admin.maincategories.status');
    });
    ######################### End  Main Categoris Routes  ########################

    ######################### Begin Vendors Routes ########################
    Route::group(['prefix' => 'vendors'], function () {
        Route::get('/', [VendorsController::class, 'index'])->name('admin.vendors');
        Route::get('/create', [VendorsController::class, 'create'])->name('admin.vendors.create');
        Route::post('/store', [VendorsController::class, 'store'])->name('admin.vendors.store');
        Route::get('/edit/{id}', [VendorsController::class, 'edit'])->name('admin.vendors.edit');
        Route::post('/update/{id}', [VendorsController::class, 'update'])->name('admin.vendors.update');
        Route::get('/delete/{id}', [VendorsController::class, 'destroy'])->name('admin.vendors.delete');
        Route::get('changeStatus/{id}', [VendorsController::class, 'changeStatus'])->name('admin.vendors.status');
    });
    ######################### End  Main Vendors Routes  ########################
});

Route::group(['namespace' => 'Admin'], function () {
    Route::get('/login', [LoginController::class, "getLogin"])->name('get.admin.login');
    Route::post('/login', [LoginController::class, "login"])->name('admin.login');
});
