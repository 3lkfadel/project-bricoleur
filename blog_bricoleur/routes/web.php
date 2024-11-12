<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikesController;

Route::get('/index', function () {
    return view('posts.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostsController::class);
    Route::post('posts/{post}/comments', [CommentsController::class, 'store'])->name('comments.store');
    Route::delete('comments/{comment}', [CommentsController::class, 'destroy'])->name('comments.destroy');
    Route::post('posts/{post}/like', [LikesController::class, 'store'])->name('likes.store');
    Route::delete('posts/{post}/like', [LikesController::class, 'destroy'])->name('likes.destroy');
});

// Route pour afficher le formulaire de création d'un post
Route::get('/posts/create', [PostsController::class, 'create'])
    ->middleware('auth') // Assurez-vous que seuls les utilisateurs authentifiés peuvent accéder à cette page
    ->name('posts.create');

// Route pour traiter l'envoi du formulaire de création d'un post
Route::post('/posts', [PostsController::class, 'store'])
    ->middleware('auth') // Assurez-vous que seuls les utilisateurs authentifiés peuvent créer des posts
    ->name('posts.store');

    Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');


    Route::middleware(['auth'])->group(function () {
        Route::resource('posts', PostsController::class);
        Route::post('posts/{post}/comments', [CommentsController::class, 'store'])->name('comments.store');
        Route::delete('comments/{comment}', [CommentsController::class, 'destroy'])->name('comments.destroy');
        Route::post('posts/{post}/like', [LikesController::class, 'store'])->name('likes.store');
        Route::delete('posts/{post}/like', [LikesController::class, 'destroy'])->name('likes.destroy');

    });

    use App\Http\Controllers\ChatController;

Route::middleware('auth')->group(function () {
    Route::get('/chat/{userId}', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat/{userId}', [ChatController::class, 'store'])->name('chat.store');
});



// // Route pour aimer un post
// Route::post('posts/{post}/like', [LikesController::class, 'store'])->name('posts.like');

// // Route pour annuler le like d'un post
// Route::delete('posts/{post}/like', [LikesController::class, 'destroy'])->name('posts.unlike');

Route::resource('posts', PostsController::class);

require __DIR__.'/auth.php';
