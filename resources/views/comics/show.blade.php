@extends("layouts.main")

@section("content")
  <div class="container">
    <h2><strong>Titolo:</strong> {{$comic->title}}</h2>
    <p><strong>Descrizione:</strong> {{$comic->description}}</p>
    <h4><strong>Prezzo:</strong> {{ $comic->price }} €</h4>
    <h4><strong>Serie:</strong> {{ $comic->series }}</h4>
    <h4><strong>Data uscita:</strong> {{ $comic->sale_date }}</h4>
    <h4><strong>Tipologia:</strong> {{ $comic->type }}</h4>
    <img src="{{ $comic->thumb}}" alt="{{ $comic->title}}" class="h-100">
  </div>
@endsection