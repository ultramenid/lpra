<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UpdatesController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::get('/', [IndexController::class, 'beranda'])->name('beranda');
Route::get('/map/{status}', [IndexController::class, 'index'])->name('index');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/profile', [ProfileController::class, 'list'])->name('profile');
Route::get('/updates', [UpdatesController::class, 'updates'])->name('updates');
Route::get('/profile/{fid}/{desa_kel}', [ProfileController::class, 'detailprofile']);
Route::get('/update/{slug}', [UpdatesController::class, 'detailUpdate']);


Route::get('/service/lpra', [IndexController::class, 'getLPRA']);








Route::group(['middleware' => 'checkSession'], function () {
    Route::get('/cms/dashboard', [DashboardController::class, 'index']);
    Route::get('/cms/updates', [UpdatesController::class, 'index']);
    Route::get('/cms/profiles', [ProfileController::class, 'profiles']);
    Route::get('/cms/addabout', [AboutController::class, 'addabout']);
    Route::get('/cms/addupdates', [UpdatesController::class, 'addupdates']);
    Route::get('/cms/addprofile', [ProfileController::class, 'addprofile']);
    Route::get('/cms/settings', [SettingsController::class, 'index']);
    Route::get('/cms/kekuatan', [AboutController::class, 'kekuatan']);
    Route::get('/cms/objeksubjek', [AboutController::class, 'objeksubjek']);
    Route::get('/cms/penguatan', [AboutController::class, 'addpenguatan']);
    Route::get('/cms/advokasi', [AboutController::class, 'advokasi']);
    Route::get('/cms/carakerja', [AboutController::class, 'carakerja']);
    Route::get('/cms/database', [AboutController::class, 'database']);

    Route::get('/cms/editprofile/{id}', [ProfileController::class, 'editprofile']);
    Route::get('/cms/editupdates/{id}', [UpdatesController::class, 'editupdates']);


    Route::group(['prefix' => 'cms/lpra-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});


//if there is no session , redirect to login page
Route::group(['middleware' => 'hasSession'], function () {
    Route::get('cms/login', [LoginController::class, 'index'])->name('login');
});

//route logout
Route::get('/cms/page/logout', function () {
    session()->flush();
    return redirect('/cms/login');
});
