<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function getMovie(){
        $movie = Movie::all();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $movie
        ]);
    }

    public function createMovie(Request $request){
        $movie = new Movie;
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->image = $request->image;
        $movie->duration = $request->duration;
        $movie->id_clasificacion = [];
        $movie->save();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $movie
        ]);
    }

    public function editMovie(){
        
    }
}
