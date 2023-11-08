<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function getActor(){
        $actor = Actor::all();

        foreach ($actor as $act){
            $act->photo = $act->image;
        }

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $actor
        ]);
    }

    public function createActor(Request $request){
        $actor = new Actor;
        $actor->name = $request->name;
        $actor->image = $request->photo;

        $actor->save();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $actor
        ]);
    }

    public function editActor(Request $request, $id){

        $actor = Actor::find($id);
        $actor->name = $request->name;
        $actor->image = $request->photo;

        $actor->save();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $actor
        ]);
    }

    public function deleteActor(Request $request, $id){
        $actor = Actor::find($id);

        $actor->delete($id);

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $actor
        ]);
    }
}
