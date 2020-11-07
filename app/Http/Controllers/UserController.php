<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $books = Book::simplePaginate(10);
        return view('user-index', compact('books'));
    }

    public function buyBook($user_id, $book_id){
        $user = User::find($user_id);
        $user->books()->attach($book_id);
        return redirect('/home');
    }

    public function getBooks($id){
        $books = User::find($id)->books()->simplePaginate(10);
        return view('user-view', compact('books'));
    }
}
