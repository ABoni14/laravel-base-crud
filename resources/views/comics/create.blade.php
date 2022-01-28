@extends("layouts.main")

@section("content")
<div class="container">
  <h2>Inserisci il tuo fumetto!</h2>
  
  <form action="{{route("comics.store")}}" method="POST">
    @csrf
    @method("POST")
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Titolo">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" id="description" name="description" placeholder="Descrizione">
    </div>
    <div class="form-group">
      <label for="thumb">Thumb</label>
      <input type="text" class="form-control" id="thumb" name="thumb" placeholder="Immagine">
    </div>
    <div class="form-group">
      <label for="price">Price</label>
      <input type="text" class="form-control" id="price" name="price" placeholder="Prezzo">
    </div>
    <div class="form-group">
      <label for="series">Series</label>
      <input type="text" class="form-control" id="series" name="series" placeholder="Serie">
    </div>
    <div class="form-group">
      <label for="sale_date">Sale Date</label>
      <input type="text" class="form-control" id="sale_date" name="sale_date" placeholder="Data di uscita">
    </div>
    <div class="form-group">
      <label for="stype">Type</label>
      <input type="text" class="form-control" id="type" name="type" placeholder="Tipologia">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-primary">Reset</button>
  </form>
</div>
@endsection