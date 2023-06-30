<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Message;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



//----------All posts Routes________
Route::get('posts',[PostController::class ,'index'])->name('posts.index')->middleware('auth');
Route::get('posts/create',[PostController::class ,'create'])->name('posts.create')->middleware('auth');
Route::post('posts',[PostController::class ,'store'])->name('posts.store')->middleware('auth');
Route::get('posts/{post}',[PostController::class ,'show'])->name('posts.show')->middleware('auth');
Route::get('posts/{post}/edit',[PostController::class ,'edit'])->name('posts.edit')->middleware('auth');
Route::put('posts/{post}',[PostController::class ,'update'])->name('posts.update')->middleware('auth');
Route::delete('posts/{post}',[PostController::class ,'destroy'])->name('posts.destroy')->middleware('auth');
Route::put('posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');





//--------------------









Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// errorr in pakage
Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('home');
Route::get('delete_chat', function () {
    Message::truncate();
    return redirect()->route('dashboard');

})->middleware(['auth'])->name('delete_chat');