<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MypostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\VotesController;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard',  [DashboardController::class, 'show_post'])->middleware(['auth', 'verified'])
->name('dashboard');

Route::get('/dashboard/{type}',  [DashboardController::class, 'show_post'])->middleware(['auth', 'verified'])
->name('dashboardType');

Route::get('/dashboard/upvote/{id}/{where}/{type}', [VotesController::class, 'upvote'])->middleware(['auth', 'verified'])
->name('upvote');

Route::get('/dashboard/downvote/{id}/{where}/{type}', [VotesController::class, 'downvote'])->middleware(['auth', 'verified'])
->name('downvote');

Route::get('/dashboard/unvote/{id}/{where}/{type}', [VotesController::class, 'unvote'])->middleware(['auth', 'verified'])
->name('unvote');

Route::get('/dashboard/upvotetodownvote/{id}/{where}/{type}', [VotesController::class, 'upvote_to_downvote'])->middleware(['auth', 'verified'])
->name('upvote_to_downvote');

Route::get('/dashboard/downvotetoupvote/{id}/{where}/{type}', [VotesController::class, 'downvote_to_upvote'])->middleware(['auth', 'verified'])
->name('downvote_to_upvote');

Route::get('/dashboard/author/{authorId}', [AuthorController::class, 'authorBlogs'])->middleware(['auth', 'verified'])
->name('authorBlogs');

Route::get('/dashboard/author/{authorId}/{type}', [AuthorController::class, 'authorBlogs'])->middleware(['auth', 'verified'])
->name('authorBlogsType');

Route::get('/mypost', [MypostController::class, 'my_post'])->middleware(['auth', 'verified'])
->name('mypost');

Route::get('/post', [PostController::class, 'index'])->middleware(['auth', 'verified'])
->name('post_index');

Route::post('/post', [PostController::class, 'create'])->middleware(['auth', 'verified'])
->name('post_create');

Route::get('/post/edit/{id}', [PostController::class, 'edit'])->middleware(['auth', 'verified'])
->name('post_edit');

Route::put('/post/edit/{id}', [PostController::class, 'update'])->middleware(['auth', 'verified'])
->name('post_update');

Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->middleware(['auth', 'verified'])
->name('post_destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get("/home",[PostController::class,"index"]);

require __DIR__.'/auth.php';
