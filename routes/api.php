<?php

use App\Http\Controllers\Api\GalleryApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/galleries',                [GalleryApiController::class, 'index'])         ->name('gallery.index');
Route::post('/galleries',               [GalleryApiController::class, 'store'])         ->name('gallery.store');
Route::put('galleries/update/{id}',     [GalleryApiController::class, 'update'])        ->name('gallery.update');
Route::delete('galleries/delete/{id}',  [GalleryApiController::class, 'delete'])        ->name('gallery.delete');
Route::get('/galleries/{id}',           [GalleryApiController::class, 'indexSingle'])   ->name('gallery.index-single');
Route::get('/who',                      [GalleryApiController::class, 'pickRandom'])    ->name('gallery.random');
