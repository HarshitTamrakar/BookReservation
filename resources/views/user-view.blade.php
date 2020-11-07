@extends('layouts.app')

@section('content')
<div class="container">
  <?php
    $index = 0;
  ?>
  @foreach($books as $book)
  <?php $index++;?>
  <div class="border border-black rounded my-2 p-4">
    <h2 class="h2">{{$index}}) {{$book->title}}</h2>
    <h4 class="h4">{{$book->author}}</h4>
  </div>
  @endforeach
  <div class="my-3 text-center">
    {{ $books->links() }}
  </div>
</div>
@endsection