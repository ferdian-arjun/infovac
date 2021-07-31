<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VaksinsController;
use App\Http\Controllers\MemberController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/post/{id}', [PageController::class, 'detailPost'])->name('detail.post');


//Ke halaman dashboard
// Route::get('/admin', function () {
//     return redirect()->route('admin.index');
// });


//Ke halaman admin 
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
//ke halaman admin data vaksin 
Route::get('/admin/vaksin', [VaksinsController::class, 'index'])->name('vaksin.index');
Route::get('/admin/vaksin/tambah', [VaksinsController::class, 'create'])->name('vaksin.tambah');
Route::post('/admin/vaksin/store', [VaksinsController::class, 'store'])->name('vaksin.store');
Route::get('/admin/vaksin/edit/{id}', [VaksinsController::class, 'edit'])->name('vaksin.edit');
Route::post('/admin/vaksin/update/{id}', [VaksinsController::class, 'update'])->name('vaksin.update');
Route::get('/admin/vaksin/delete/{id}', [VaksinsController::class, 'destroy'])->name('vaksin.delete');

//ke halaman admin data posts 
Route::get('/admin/posts', [PostsController::class, 'index'])->name('posts.index');

//ke halaman admin data user 
Route::get('/admin/user', [UserController::class, 'index'])->name('member.index');
Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('member.edit');
Route::get('/admin/user/delete/{id}', [UserController::class, 'destroy'])->name('member.delete');



//auth route
Route::get('/auth', [AuthController::class, 'index'])->name('login');
Route::post('/login/procces', [AuthController::class, 'login'])->name('login.process');
Route::get('/auth/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/procces', [AuthController::class, 'registerProcess'])->name('register.process');



//member post
Route::get('/member', [MemberController::class, 'index'])->name('my');
