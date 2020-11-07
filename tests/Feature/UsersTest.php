<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_only_logged_in_users_are_not_allowed(){
        $this->get('/home')->assertRedirect('/login');
    }

    public function test_only_logged_in_users_are_allowed(){
        $this->actingAs(User::factory()->create());
        $this->get('/home')->assertStatus(200);
    }

    public function test_user_entry(){
        User::factory()->create();
        User::factory()->create();
        User::factory()->create();
        User::factory()->create();
        User::factory()->create();
        $this->assertCount(5, User::all());
    }

    public function test_book_entry(){
        Book::factory()->create();
        Book::factory()->create();
        Book::factory()->create();
        $this->assertCount(3, Book::all());
    }

    public function test_books_are_added_successfully(){
        $user = User::factory()->create();
        $this->actingAs($user);
        $book = Book::factory()->create();
        $this->get('/users/'.$user->id.'/books/'.$book->id)->assertRedirect('/home');
        $this->assertCount(1, $user->books()->get());
    }

    public function test_basic(){
        $this->get('/')->assertStatus(200);
    }

    public function test_removing_book(){        
        $user = User::factory()->create();
        $this->actingAs($user);
        $books = Book::factory()->count(5)->create();
        foreach($books as $book){
            $user->books()->save($book);
        }
        $this->assertCount(5, $user->books()->get());
        foreach($books as $book){
            $this->get('/users/'.$user->id.'/delete-book/'.$book->id)->assertRedirect('users/'.($user->id));
            
        }
        $this->assertCount(0, $user->books()->get());
    }

}
