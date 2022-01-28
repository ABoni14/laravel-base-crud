@extends("layouts.main")

@section("content")
<div class="container">
  <h2>Stai aggiornando il fumetto: {{ $comic->title}}</h2>
  
  <form action="{{route("comics.update", $comic)}}" method="POST">
    @csrf
    @method("PUT")
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" value="{{ $comic->title }}" id="title" name="title" placeholder="Titolo">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" value="{{ $comic->description }}" id="description" name="description" placeholder="Descrizione">
    </div>
    <div class="form-group">
      <label for="thumb">Thumb</label>
      <input type="text" class="form-control" value="{{ $comic->thumb }}" id="thumb" name="thumb" placeholder="Immagine">
    </div>
    <div class="form-group">
      <label for="price">Price</label>
      <input type="text" class="form-control" value="{{ $comic->price }}" id="price" name="price" placeholder="Prezzo">
    </div>
    <div class="form-group">
      <label for="series">Series</label>
      <input type="text" class="form-control" value="{{ $comic->series }}" id="series" name="series" placeholder="Serie">
    </div>
    <div class="form-group">
      <label for="sale_date">Sale Date</label>
      <input type="text" class="form-control" value="{{ $comic->sale_date }}" id="sale_date" name="sale_date" placeholder="Data di uscita">
    </div>
    <div class="form-group">
      <label for="stype">Type</label>
      <input type="text" class="form-control" value="{{ $comic->type }}" id="type" name="type" placeholder="Tipologia">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-primary">Reset</button>
  </form>
</div>
@endsection