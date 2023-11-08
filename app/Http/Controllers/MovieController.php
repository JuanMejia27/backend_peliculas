<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\ActorMovie;
use App\Models\Genre;
use App\Models\GenreMovie;
use App\Models\Movie;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    public function getMovie(){
        $movies = Movie::all();
        foreach ($movies as $movie){
            $actores = ActorMovie::select("actors.name")
            ->join("actors","actors.id", "=", "id_actor")
            ->where("id_movie", "=", $movie->id)
            ->get();
            $actors = [];
            foreach ($actores as $actor){
                $actors[] = $actor->name;
            }
            $movie->actors = implode(",", $actors);
            Log::info($movie->actors);

            $generos = GenreMovie::select("genres.name")
            ->join("genres","genres.id", "=", "id_genre")
            ->where("id_movie", "=", $movie->id)
            ->get();
            $genres = [];
            foreach ($generos as $genero){
                $genres[] = $genero->name;
            }
            $movie->genre = implode(",", $genres);

            $movie->clasification = $movie->id_clasification;
        }

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $movies
        ]);
    }

    public function createMovie(Request $request){
        try{
            DB::beginTransaction();//uso de la base de datos

            $movie = new Movie;
            $movie->title = $request->title;
            $movie->description = $request->description;
            $movie->image = $request->image;
            $movie->duration = $request->duration;
            $movie->id_clasification = $request->clasification;
            $movie->save();

            foreach($request->actors as $actor){
                $item = Actor::where("name", "like", $actor)->first();
                $actormovie = new ActorMovie;
                $actormovie->id_actor = $item->id;
                $actormovie->id_movie = $movie->id;
                $actormovie->save();
            }

            foreach($request->genre as $gen){
                $item = Genre::where("name", "like", $gen)->first();
                $genremovie = new GenreMovie;
                $genremovie->id_genre = $item->id;
                $genremovie->id_movie = $movie->id;
                $genremovie->save();
            }

            DB::commit();
            //DB::rollBack();

            return response()->json([
                "code" => 200,
                "message" => "Success",
                "payload" => $movie
            ]);
        }
        catch(Exception $e){
            Log::error($e);
            DB::rollBack();

            return response()->json([
                "code" => 500,//codigo de error
                "message" => "Error",
                "error" => $e
            ]);
        }
    }

    public function editMovie(Request $request, $id){
        try{
            DB::beginTransaction();//uso de la base de datos

            $movie = Movie::find($id);
            $movie->title = $request->title;
            $movie->description = $request->description;
            $movie->image = $request->image;
            $movie->duration = $request->duration;
            $movie->id_clasification = $request->clasification;
            $movie->save();

            ActorMovie::where("id_movie",$movie->id)->delete();
            GenreMovie::where("id_movie",$movie->id)->delete();

            $actors = explode(",",$request->actors);
            foreach($actors as $actor){
                $item = Actor::where("name", "like", $actor)->first();
                $actormovie = new ActorMovie;
                $actormovie->id_actor = $item->id;
                $actormovie->id_movie = $movie->id;
                $actormovie->save();
            }

            $genre = explode(",", $request->genre);
            foreach($genre as $gen){
                $item = Genre::where("name", "like", $gen)->first();
                $genremovie = new GenreMovie;
                $genremovie->id_genre = $item->id;
                $genremovie->id_movie = $movie->id;
                $genremovie->save();
            }

            DB::commit();
            //DB::rollBack();

            return response()->json([
                "code" => 200,
                "message" => "Success",
                "payload" => $movie
            ]);
        }
        catch(Exception $e){
            Log::error($e);
            DB::rollBack();

            return response()->json([
                "code" => 500,//codigo de error
                "message" => "Error",
                "error" => $e
            ]);
        }
    }

    public function deleteMovie($id){
        ActorMovie::where("id_movie",$id)->delete();
        GenreMovie::where("id_movie",$id)->delete();
        Movie::destroy($id);

        return response()->json([
            "code" => 200,
            "message" => "Success"
        ]);
    }
}
