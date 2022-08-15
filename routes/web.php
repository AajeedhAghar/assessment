<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadImagesController;


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
    return view('welcome');
});




Route::get('upload-multiple-image-preview', [UploadImagesController::class, 'index']);

Route::post('upload-multiple-image-preview', [UploadImagesController::class, 'store']);
