<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',                      function () { return redirect('dashboard/index'); });

/* Dashboard */
Route::get('dashboard',              function () { return redirect('dashboard/index'); });
Route::get ('dashboard/index',                     [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get ('dashboard/index',                     [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get ('gallery/index',                      [GalleryController::class, 'index'])->name('gallery.index');
Route::get ('gallery/create',                      [GalleryController::class, 'create'])->name('gallery.create');

