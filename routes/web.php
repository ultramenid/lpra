<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UpdatesController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/profile', [ProfileController::class, 'list'])->name('profile');
Route::get('/updates', [UpdatesController::class, 'updates'])->name('updates');
Route::get('/cms/addprofile', [ProfileController::class, 'addprofile']);
Route::get('/profile/{slug}', [ProfileController::class, 'detailprofile']);
Route::get('/update/{slug}', [UpdatesController::class, 'detailUpdate']);
Route::get('/cms/addabout', [AboutController::class, 'addabout']);
Route::get('/cms/addupdates', [UpdatesController::class, 'addupdates']);



Route::group(['prefix' => 'cms/lpra-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::group(['middleware' => 'checkSession'], function () {

});


//if there is no session , redirect to login page
Route::group(['middleware' => 'hasSession'], function () {
    Route::get('cms/login', [LoginController::class, 'index'])->name('login');
});
