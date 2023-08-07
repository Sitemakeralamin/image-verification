<?php

use App\Http\Controllers\SettingController;
use App\Http\Controllers\UploadImageController;
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
    return view('welcome');
});

Auth::routes(["register" =>false]);

Route::middleware('auth')->group(function (){
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// setting route
Route::get('admin/setting',[SettingController::class,'changepassword'])->name('admin.setting');
Route::post('admin/change/password',[SettingController::class,'newpasswordSave'])->name('admin.change.password');

// upload image route
Route::get('upload/image',[UploadImageController::class,'index'])->name('upload.image');
Route::post('image/save',[UploadImageController::class,'saveImage'])->name('image.save');

// manage image route
Route::get('manage/image',[UploadImageController::class,'manage'])->name('manage.image');
Route::get('delete/image/{id}',[UploadImageController::class,'deleteImage'])->name('delete.image');
Route::get('edit/image/{id}',[UploadImageController::class,'editImage'])->name('edit.image');
Route::post('update/image/{id}',[UploadImageController::class,'updateImage'])->name('image.update');

});

// image search frontend page

Route::get('search/image',[UploadImageController::class,'searchImg'])->name('search.image');
Route::get('image/view',[UploadImageController::class,'imgView'])->name('image.view');
Route::get('download-image/{id}',[UploadImageController::class,'download'])->name('download-image');

