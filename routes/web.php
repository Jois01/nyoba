<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});
Route::get('/addBlog', function () {
    return view('addBlog', ['title' => 'Tambah Blog']);
});
Route::get('/profile', function () {
    return view('profile', [ 'title' => 'rofile','nama' => 'jois tika']);
});
Route::get('/posts', function () {
    return view('posts',  ['title' => 'Blog', 'posts'=> Post::all()]);
});
Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    return view('posts', ['title' => count($user->posts) . ' articles by ' . $user->name, 'posts' => $user->posts]);
});
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', ['title' => count($category->posts) . ' Category : ' . $category->slug, 'posts' => $category->posts]);
});
Route::get('/myblog', function () {
    $posts = Post::all();
    return view('myblog', ['title' => 'Blog', 'posts' => $posts]);
});