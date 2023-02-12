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
Route::redirect('/',                      function () { return redirect('dashboard/index'); });

/* Dashboard */
Route::redirect('dashboard',                        'dashboard/index');
Route::get ('dashboard/index',                     [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get ('dashboard/index',                     [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get ('gallery/index',                      [GalleryController::class, 'index'])->name('gallery.index');
Route::get ('gallery/create',                     [GalleryController::class, 'create'])->name('gallery.create');
Route::post ('gallery/store',                     [GalleryController::class, 'store'])->name('gallery.store');
Route::get ('gallery/edit/{id}',                  [GalleryController::class, 'edit'])->name('gallery.edit');
Route::post ('gallery/update/{id}',               [GalleryController::class, 'update'])->name('gallery.update');
Route::delete ('gallery/destroy/{id}',            [GalleryController::class, 'destroy'])->name('gallery.destroy');
Route::get ('gallery/show/{id}',                  [GalleryController::class, 'show'])->name('gallery.show');


Route::get('/change-image-status/{id}',           [GalleryController::class,'changeImageStatus'])->name('image.status');
Route::get ('gallery/grid',                       [GalleryController::class, 'grid'])->name('gallery.grid');
Route::get ('gallery/magic',                      [GalleryController::class, 'magic'])->name('gallery.magic');



