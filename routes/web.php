<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login']);

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});
Route::get('/editProfile', function () {
    return view('editProfile', ['title' => 'Edit Profile']);
})->name('editProfile');

Route::get('/addBlog', function () {
    return view('addBlog', ['title' => 'Tambah Blog']);
})->name('addBlog'); 

Route::get('/profile', function () {
    return view('profile', [ 'title' => 'Profile','nama' => 'jois tika']);
});
Route::get('/posts', function () {
    return view('posts',  ['title' => 'Blog', 'posts'=> Post::all()]);
});
Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    $posts = $user->posts()->with('author')->get();
    return view('posts', [
        'title' => count($user->posts) . ' articles by ' . $user->name, 
        'posts' => $posts,
        'author' => $user
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', ['title' => count($category->posts) . ' Category : ' . $category->slug, 'posts' => $category->posts]);
});

Route::get('/myblog', [PostController::class, 'index'])->name('myblog.index')->middleware('auth'); 
Route::get('/addBlog', [PostController::class, 'create'])->name('posts.create');
Route::post('/addBlog', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/post/checkSlug', [PostController::class, 'checkSlug']);
Route::get('/posts/{post:slug}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{post:slug}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');
Route::delete('/posts/{post:slug}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');

Route::get('/profile', [PostController::class, 'lihat'])->name('profile.lihat')->middleware('auth'); 
Route::put('/editProfile', [PostController::class, 'perbarui'])->name('user.update');
