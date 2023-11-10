<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\ActorSerie;
use App\Models\Genre;
use App\Models\GenreSerie;
use App\Models\Movie;
use App\Models\Serie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SerieController extends Controller
{
    public function getSerie(){
        $series = Serie::all();

        foreach ($series as $serie){
            $actores = ActorSerie::select("actors.name")
            ->join("actors","actors.id", "=", "id_actor")
            ->where("id_serie", "=", $serie->id)
            ->get();
            $actors = [];

            foreach ($actores as $actor){
                $actors[] = $actor->name;
            }

            $serie->actors = implode(",", $actors);
            Log::info($serie->actors);

            $generos = GenreSerie::select("genres.name")
            ->join("genres","genres.id", "=", "id_genre")
            ->where("id_serie", "=", $serie->id)
            ->get();
            $genres = [];
            foreach ($generos as $genero){
                $genres[] = $genero->name;
            }
            $serie->genre = implode(",", $genres);

            $serie->clasification = $serie->id_clasification;
        }

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $series
        ]);

    }

    public function createSerie(Request $request){
        try{
            DB::beginTransaction();

            $serie = New Serie();
            $serie->title = $request->title;
            $serie->description = $request->description;
            $serie->image = $request->image;
            $serie->episodes = $request->episodes;
            $serie->id_clasification = $request->clasification;
            $serie->save();

            foreach($request->actors as $actor){
                $item = Actor::where("name", "like", $actor)->first();
                $actorserie = new ActorSerie;
                $actorserie->id_actor = $item->id;
                $actorserie->id_serie = $item->id;
                $actorserie->save();
            }

            foreach($request->genre as $gen){
                $item = Genre::where("name", "like", $gen)->first();
                $genreserie = new GenreSerie;
                $genreserie->id_genres = $item->id;
                $genreserie->id_serie = $item->id;
                $genreserie->save();
            }

            Db::commit();
            return response()->json([
                "code" => 200,
                "message" => "Success",
                "payload" => $serie
            ]);
        }

        catch(Exception $e){
            Log::error($e);
            DB::rollBack();

            return response()->json([
                "code" => 500,
                "message" => "Success",
                "payload" => $e
            ]);
        }
    }

    public function editSerie(Request $request, $id){

    }

    public function deleteSerie($id){
        ActorSerie::where("id_serie",$id)->delete();
        GenreSerie::where("id_serie",$id)->delete();

        Movie::destroy($id);
        return response()->json([
            "code" => 200,
            "message" => "Success"
        ]);
    }
}
