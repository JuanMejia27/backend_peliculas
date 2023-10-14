<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function getRoom(){
        $room = Room::all();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $room
        ]);
    }

    public function createRoom(Request $request){
        $room = new Room;
        $room->name = $request->name;
        $room->capacity = $reques->capacity;
        $room->save();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $room
        ]);
    }

    public function editRoom(Request $request, $id){
        $room = Room::find($id);
        $room->name = $reques->name;
        $room->capacity = $request->capacity;
        $room->save();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $room
        ]);
    }

    public function deleteRoom(Request $request, $id){
        $room = Room::find($id);
        $room->delete();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $room
        ]);
    }
}
