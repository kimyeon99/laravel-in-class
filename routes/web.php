<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PostsController;
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

Route::resource('/posts', PostsController::class)->middleware(['auth']);
Route::delete('/posts/images/{id}', [PostsController::class, 'deleteImage'])->middleware(['auth']);

Route::post('/likes/{post}', [LikesController::class, "store"])->middleware(['auth'])->name('likes.store');

Route::get('/posts/{post_id}/comments', [CommentsController::class, "index"]);
Route::post('/posts/{post_id}/comments', [CommentsController::class, "store"]);
Route::put('/posts/comments/{com_id}', [CommentsController::class, "update"]);
Route::delete('/posts/comments/{com_id}', [CommentsController::class, "destroy"]);

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
