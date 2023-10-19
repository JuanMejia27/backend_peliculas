<?php

namespace App\Http\Controllers;
use App\Models\Clasification;
use Illuminate\Http\Request;

class ClasificationController extends Controller
{
    public function getClasification(){
        $clasif = Clasification::all();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $clasif
        ]);
    }

    public function createClasification(Request $request){
        $clasif = new Clasification;
        $clasif->name = $request->name;

        $clasif->save();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $clasif
        ]);
    }

    public function editClasification(Request $request, $id){

        $clasif = Clasification::find($id);
        $clasif->name = $request->name;

        $clasif->save();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $clasif
        ]);
    }

    public function deleteClasification(Request $request, $id){
        $clasif = Clasification::find($id);

        $clasif->delete($id);

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $clasif
        ]);
    }
}
