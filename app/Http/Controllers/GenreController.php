<?php

namespace App\Http\Controllers;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function getGenre(){
        $genre = Genre::all();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $genre
        ]);
    }

    public function createGenre(Request $request){
        $genre = new Genre;
        $genre->name = $request->name;
        $genre->save();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $genre
        ]);
    }

    public function editGenre(Request $request, $id){
        $genre = Genre::find($id);
        $genre->name = $request->name;
        $genre->save();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $genre
        ]);
    }

    public function deleteGenre(Request $request, $id){
        $genre = Genre::find($id);
        $genre->delete();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $genre
        ]);
    }
}
