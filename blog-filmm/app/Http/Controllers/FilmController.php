<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\FilmResource;
use App\Http\Resources\FilmCollection;
use App\Models\Film;
class FilmController extends Controller
{
    public function index(){
        $films=Film::all();
       // return FilmResource::collection($films);
       return new FilmCollection($films);
    }
    public function show(Film $film){
        //$film=Film::find($id);
        return new FilmResource($film);
    }

    public function destroy($film_id){
        $film=Film::find($film_id);
        if(is_null($film))
            return response()->json('Data not faunt',404);
        else $film->delete();
        return response()->json('Film je obrisan');
    }
    
}
