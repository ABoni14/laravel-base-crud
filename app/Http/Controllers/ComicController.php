<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comicList = Comic::paginate(5);
        return view("comics.home", compact("comicList"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("comics.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validData(), $this->validErrors());

        $data = $request->all();
        $new_comic = new Comic();
        $new_comic->slug = Str::slug($data["title"], "-");
        $new_comic->fill($data);
        $new_comic->save();
        return redirect()->route("comics.show", $new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);
        if ($comic) {
            return view("comics.show", compact("comic"));
        }
        abort(404, "Fumetto non trovato");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);
        if($comic){
            return view('comics.edit', compact('comic'));
        }
        abort(404, 'Fumetto non trovato');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $request->validate($this->validData(), $this->validErrors());
        
        $data = $request->all();
        $data['slug'] = $this->createSlug($data['title']);
        $comic->update($data);
        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index')->with("deleted", "Il fumetto $comic->title è stato eliminato.");
    }

    public function validData(){
        return [
            "title" => "required|max:50",
            "description" => "required|max:50|min:2",
            "thumb" => "required",
            "price" => "required|numeric|max:100",
            "series" => "required|max:50",
            "sale_date" => "required",
            "type" => "required|max:50"
        ];
    }

    public function validErrors(){
        return [
            "title.required" => "Il titolo è un campo obbligatorio",
            "title.max" => "Il numero massimo di caratteri è di :max",
            "description.required" => "La descrizione è un campo obbligatorio",
            "description.max" => "Il numero massimo di caratteri è di :max",
            "description.min" => "Il numero massimo di caratteri è di :min",
            "thumb.required" => "L'immagine è un campo obbligatorio",
            "price.required" => "Il prezzo è un campo obbligatorio",
            "price.numeric" => "Il prezzo è un campo numerico",
            "price.max" => "Il costo massimo inseribile è di :max €",
            "series.required" => "La serie è un campo obbligatorio",
            "series.max" => "Il numero massimo di caratteri è di :max",
            "sale_date.required" => "L'anno di pubblicazione è un campo obbligatorio",
            "type.required" => "Il tipo è un campo obbligatorio",
            "type.max" => "Il numero massimo di caratteri è di :max"
        ];
    }
}
