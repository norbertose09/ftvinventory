<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;

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
Route::any('/', [homeController::class, 'signin'])->name('login')->middleware('guest');

Route::any('/signup', [homeController::class, 'signup'])->middleware('auth');

Route::any('/changepassword', [homeController::class, 'changepassword'])->middleware('auth');

Route::any('/dashboard', [homeController::class, 'index'])->middleware('auth');

Route::any('/adminsignup', [homeController::class, 'signupConfig'])->middleware('auth');

Route::any('/logout', [homeController::class, 'logout'])->middleware('auth');

Route::any('/adminsignin', [homeController::class, 'signinConfig']);

Route::any('/records', [homeController::class, 'records'])->middleware('auth');

Route::any('/revenue', [homeController::class, 'revenue'])->middleware('auth');

Route::any('/createcategory', [homeController::class, 'createCategory'])->middleware('auth');

Route::any('/createcatconfig', [homeController::class, 'createcatConfig'])->middleware('auth');

Route::any('/category', [homeController::class, 'category'])->middleware('auth');

Route::any('/createitem', [homeController::class, 'createItem'])->middleware('auth');

Route::any('/stocks', [homeController::class, 'stocks'])->middleware('auth');

Route::any('/createitemconfig', [homeController::class, 'createitemconfig']);

Route::any('/recordconfig', [homeController::class, 'recordconfig']);