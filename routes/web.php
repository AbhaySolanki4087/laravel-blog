<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/register', function () {
    return view('register');
});
Route::post('/registration', [RegistrationController::class, 'store']);

// routes/web.php
Route::get('/login', function () {
    return view('login');
});
// Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/UserLogin', [LoginController::class, 'authenticate']);
Route::get('/profile', [LoginController::class, 'getCookies']);
Route::get('/logout', [LoginController::class, 'logOut']);

//Admin Record ---------------------------------------------------------------->
Route::get('/admin', function () {
    return view('admin.admin');
});
Route::get('/admin', [BlogController::class, 'adminEntry']);
Route::get('/admin-dashboard', [BlogController::class, 'dashboard'])->name('admin.admin-dashboard');
// Route::get('/admin-dashboard', function () {
//     return view('admin.admin-dashboard');
// });

Route::get('/add-blog', [BlogController::class , 'form']);
// categoroty related data  

Route::get('/ManageCategory',[CategoryController::class , 'index'  ]);
Route::post('/addCategory',[CategoryController::class , 'store'  ]);


// Admin blog routes
Route::get('/admin/blogs/{id}/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');
Route::put('/admin/blogs/{id}', [BlogController::class, 'update'])->name('admin.blogs.update');
Route::delete('/admin/blogs/{id}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');

Route::post('/newBlog', [BlogController::class, 'store']);
Route::get('/allBlog', [BlogController::class, 'index']);
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.read');

//------------------------------------------------ Users Section ------------------------>

Route::get('/user', function () {
    return view('user');
});
Route::get('/about', function () {
    return view('about');
});
// blog routes
Route::get('/blog', [BlogController::class, 'showBlogs'])->name('blogs.all');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.read');

Route::get('/content', function () {
    return view('content');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/view', function () {
    return view('view-blog');
});
Route::get('/search', [BlogController::class, 'searchBlog']);

// admin/category routes
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.delete');
