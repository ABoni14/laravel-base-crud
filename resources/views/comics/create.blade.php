@extends("layouts.main")

@section("content")
<div class="container">
  <h2>Inserisci il tuo fumetto!</h2>
  
  @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{  $error }}</li>
      @endforeach
      </ul>
    </div>
  @endif

  <form action="{{route("comics.store")}}" method="POST">
    @csrf
    @method("POST")
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" 
      class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}"
      id="title" name="title" 
      placeholder="Titolo">
      @error("title")
        <p class="form_errors">
          {{ $message }}
        </p>
      @enderror
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" 
      class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}"
      id="description" name="description" placeholder="Descrizione">
      @error("description")
        <p class="form_errors">
          {{ $message }}
        </p>
      @enderror
    </div>
    <div class="form-group">
      <label for="thumb">Thumb</label>
      <input type="text" 
      class="form-control @error('thumb') is-invalid @enderror" value="{{old('thumb')}}" 
      id="thumb" name="thumb" 
      placeholder="Immagine">
      @error("thumb")
        <p class="form_errors">
          {{ $message }}
        </p>
      @enderror
    </div>
    <div class="form-group">
      <label for="price">Price</label>
      <input type="text" 
      class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}"
      id="price" name="price" 
      placeholder="Prezzo">
      @error("price")
        <p class="form_errors">
          {{ $message }}
        </p>
      @enderror
    </div>
    <div class="form-group">
      <label for="series">Series</label>
      <input type="text" 
      class="form-control @error('series') is-invalid @enderror" value="{{old('series')}}"
      id="series" name="series" 
      placeholder="Serie">
      @error("series")
        <p class="form_errors">
          {{ $message }}
        </p>
      @enderror
    </div>
    <div class="form-group">
      <label for="sale_date">Sale Date</label>
      <input type="text" 
      class="form-control @error('sale_date') is-invalid @enderror" value="{{old('sale_date')}}"
      id="sale_date" name="sale_date" 
      placeholder="Data di uscita">
      @error("slae_date")
        <p class="form_errors">
          {{ $message }}
        </p>
      @enderror
    </div>
    <div class="form-group">
      <label for="type">Type</label>
      <input type="text" 
      class="form-control @error('type') is-invalid @enderror" value="{{old('type')}}"
      id="type" name="type" 
      placeholder="Tipologia">
      @error("type")
        <p class="form_errors">
          {{ $message }}
        </p>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-primary">Reset</button>
  </form>
</div>
@endsection