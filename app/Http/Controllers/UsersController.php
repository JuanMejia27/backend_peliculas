<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function getUsers(){
        $users = User::all();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $users
        ]);
    }

    public function createUser(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->type = $request->type;

        $user->save();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $user
        ]);
    }

    public function editUser(Request $request, $id){
        $user =  User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->type = $request->type;

        $user->save();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $user
        ]);
    }

    public function deleteUser(Request $request, $id){
        $user =  User::find($id);

        $user->delete();

        return response()->json([
            "code" => 200,
            "message" => "Success",
            "payload" => $user
        ]);
    }
}
