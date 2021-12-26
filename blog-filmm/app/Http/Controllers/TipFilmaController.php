<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Resources\TipFilmaResource;
//use App\Http\Resources\FilmCollection;
use App\Models\TipFilma;

class TipFilmaController extends Controller
{
    
    public function index()
    {
        $tipfilmas=TipFilma::all();
        return $tipfilmas;
    }
    public function show($tipfilma_id){
        //$film=Film::find($id);
        $tipfilma=TipFilma::find($tipfilma_id);
        if(is_null($tipfilma))
            return response()->json('Data not faunt',404);
        return new TipFilmaResource($tipfilma);
    }
    
    
}