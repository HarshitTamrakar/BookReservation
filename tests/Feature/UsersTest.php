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

    public function test_books_are_added_successfully(){
        $user = User::factory()->create();
        $this->actingAs($user);
        $book = Book::factory()->create();
        $this->get('/users/'.$user->id.'/books/'.$book->id)->assertRedirect('/home');
        $this->assertCount(1, $user->books()->get());
    }

}
