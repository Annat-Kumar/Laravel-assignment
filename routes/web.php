<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Auth::routes();


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/test', [TestingController::class, 'test']);

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/blog', [AdminController::class, 'blogListing'])->name('blog');
Route::get('/addblog', [AdminController::class, 'addBlog']);
Route::post('/addnewblog', [AdminController::class, 'addNewBlog'])->name('addnewblog');
// Show edit form
Route::get('/blogs/{id}/edit', [AdminController::class, 'editBlog'])->name('editBlog');

// Update blog post
Route::post('/blogs/{id}', [AdminController::class, 'updateBlog'])->name('updateBlog');

Route::post('/deleteblogs/{id}', [AdminController::class, 'destroy'])->name('deleteBlog');

Route::get('/myblog', [FrontendController::class, 'index']);
