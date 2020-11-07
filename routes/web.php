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
});

Route::get('/users/{user_id}/books/{book_id}', [UserController::class, 'buyBook']);

Route::get('/users/{id}', [UserController::class, 'getBooks']);

Auth::routes();

Route::get('/home', [UserController::class, 'index'])->name('home');

Route::get('/generate-user-{number}', function($number){
    User::factory()->count($number)->create();
    return "Generated $number users";
    sleep(4);
    return redirect('/');
});

Route::get('users/{user_id}/delete-book/{book_id}', function($user_id, $book_id){
    Auth::user()->deleteBook($book_id);
    return redirect('users/'.$user_id);
});

Route::get('/generate-book-{number}', function($number){
    Book::factory()->count($number)->create();
    return "Generated $number books";
    sleep(4);
    return redirect('/');
});