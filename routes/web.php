<?php

use App\Http\Controllers\UserController;
use App\Models\Book;
use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
    // User::factory()->count(3)->create();
    // Book::factory()->count(5)->create();
    // return "Databse populated";
});

Route::get('/users/{user_id}/books/{book_id}', [UserController::class, 'buyBook']);

Route::get('/users/{id}', [UserController::class, 'getBooks']);

Auth::routes();

Route::get('/home', [UserController::class, 'index'])->name('home');
