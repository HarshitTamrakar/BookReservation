@extends('layouts.app')

@section('content')
<div class="container">
  <?php
  $index = 0;
  $total = 0;
  ?>
  @foreach($books as $book)
  <?php $index++;
  $total += $book->price;
  ?>
  <div class="border border-black rounded my-2 p-4">
    <h2 class="h2">{{$index}}) {{$book->title}}</h2>
    <h4 class="h4">{{$book->author}}</h4>
    <h3 class="h3">Price is : ${{$book->price}}.00</h3>
  </div>
  @endforeach
  <div class="border border-dark p-3 my-2 bg-dark text-light text-center">
    <h4 class="h4"><strong>Bill amount for {{$books->count()}} books is ${{$total}}.00</strong></h4>
  </div>
  <div class="my-3 text-center">
    {{ $books->links() }}
  </div>
</div>
@endsection