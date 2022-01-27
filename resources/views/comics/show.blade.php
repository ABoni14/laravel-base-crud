@extends("layouts.main")

@section("content")
  <div class="container">
    <h2>{{$comic->title}}</h2>
    <p>{{$comic->description}}</p>
    <h4>{{ $comic->price }}</h4>
    <h4>{{ $comic->series }}</h4>
    <h4>{{ $comic->sale_date }}</h4>
    <h4>{{ $comic->type }}</h4>
  </div>
@endsection