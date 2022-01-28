@extends("layouts.main")

@section("content")
  <div class="container">
    <h2>Comics</h2>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#ID</th>
          <th scope="col">Titolo</th>
          <th scope="col">Prezzo</th>
          <th scope="col">Serie</th>
          <th scope="col">Data uscita</th>
          <th scope="col">Tipologia</th>
          <th scope="col">Mostra</th>
          <th scope="col">Modifica</th>
          <th scope="col">Elimina</th>
        </tr>
      </thead>
      <tbody>
  
          @forelse ($comicList as $comic)
          <tr>
              <th scope="row">{{ $comic->id }}</th>
              <td>{{ $comic->title }}</td>
              <td>{{ $comic->price }} €</td>
              <td>{{ $comic->series }}</td>
              <td>{{ $comic->sale_date }}</td>
              <td>{{ $comic->type }}</td>
              <td><a href="{{route("comics.show", $comic)}}" class="btn btn-primary">SHOW</a></td>
              <td><a href="{{route("comics.edit", $comic)}}" class="btn btn-warning">EDIT</a></td>
              <td> <form action="{{ route('comics.destroy', $comic) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">DELETE</button></td>
          </tr>
          @empty
              <h3>Nessun risultato trovato</h3>
          @endforelse
      </tbody>
    </table>

    {{$comicList->links()}}
  </div>
@endsection