<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\FilmResource;
use App\Models\Film;
class FilmTestController extends Controller
{
    public function index(){
        $films=Film::all();
        return $films;
    }
    public function show(Film $film){
        //$film=Film::find($id);
        return new FilmResource($film);
    }
}
