@extends('layouts.app')

@section('content')
<div class="container my-3">
  <div class="bg-primary text-light border border-dark rounded p-2">
    <h3 class="h3 text-center">You have currently <a href="/users/{{Auth::user()->id}}" class="text-white font-weight-bolder text-decoration-none">{{Auth::user()->books()->count()}} books</a></h3>
  </div>
  <?php
  $index = 0;
  ?>
  @foreach($books as $book)
  <?php $index++; ?>
  <div class="border border-black rounded my-2 p-4">
    <div class="row">
      <div class="col-10">
        <h2 class="h2">{{$index}}) {{$book->title}}</h2>
      </div>
      <div class="col-2">
        <h3 class="h3">${{$book->price}}.00</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-10">
        <h4 class="h4">{{$book->author}}</h4>
      </div>
      <div class="col-2">
        <a href="/users/{{Auth::user()->id}}/books/{{$book->id}}" class="btn btn-lg btn-success">Buy</a>
      </div>
    </div>
  </div>
  @endforeach
  <div class="my-3 text-center">
    {{ $books->links() }}
  </div>
</div>
@endsection