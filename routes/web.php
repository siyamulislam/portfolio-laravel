<?php

use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\FileController;
use Illuminate\Support\Facades\Route;


Route::get('/',                      function () { return redirect('dashboard/index'); });


/* Dashboard */
Route::redirect('dashboard',                      'dashboard/index');
Route::get ('dashboard/index',                    [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get ('dashboard/index',                    [DashboardController::class, 'dashboard'])->name('dashboard');

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
Route::get ('gallery/download',                   [GalleryController::class, 'fileDownload'])->name('gallery.download');

Route::get ('gallery/file',                       [GalleryController::class, 'fileSize'])->name('gallery.fileSize');

//education
Route::get ('education/index',                   [EducationController::class, 'index'])->name('education.index');
Route::get ('education/create',                  [EducationController::class, 'create'])->name('education.create');
Route::post ('education/store',                  [EducationController::class, 'store'])->name('education.store');
Route::get ('education/edit/{id}',               [EducationController::class, 'edit'])->name('education.edit');
Route::post ('education/update/{id}',            [EducationController::class, 'update'])->name('education.update');
Route::delete ('education/destroy/{id}',         [EducationController::class, 'destroy'])->name('education.destroy');

Route::get('/change-degree-status/{id}',         [EducationController::class,'changeDegreeStatus'])->name('degree.status');
Route::get ('degree/show/{id}',                  [EducationController::class, 'show'])->name('degree.show');

Route::resource('certifications',      CertificationController::class);

Route::get('/change-certificate-status/{id}',    [CertificationController::class,'changeCertificateStatus'])->name('certificate.status');
Route::get ('certificate/show/{id}',             [CertificationController::class, 'show'])->name('certificate.show');

Route::resource('files',               FileController::class);
Route::get('storage',                           [FileController::class,'getFile'])->name('storage.size');

