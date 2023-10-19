<?php

use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get("/usuarios", [UsersController::class, "getUsers"]);
Route::post("/usuarios/save", [UsersController::class, "createUser"]);
Route::post("/usuarios/edit/{id}", [UsersController::class, "editUser"]);
Route::post("/usuarios/delete/{id}", [UsersController::class, "deleteUser"]);

Route::get("/clasificaiones", [ClasificationController::class, "getClasification"]);
Route::post("/clasificaiones/save", [ClasificationController::class, "createClasification"]);
Route::post("/clasificaiones/edit/{id}", [ClasificationController::class, "editClasification"]);
Route::post("/clasificaiones/delete/{id}", [ClasificationController::class, "deleteClasification"]);

Route::get("/generos", [GenreController::class, "getGenre"]);
Route::post("/generos/save", [GenreController::class, "createGenre"]);
Route::post("/generos/edit/{id}", [GenreController::class, "editGenre"]);
Route::post("/generos/delete/{id}", [GenreController::class, "deleteGenre"]);

Route::get("/rooms", [RoomController::class, "getRoom"]);
Route::post("/rooms/save", [RoomController::class, "createRoom"]);
Route::post("/rooms/edit/{id}", [RoomController::class, "editRoom"]);
Route::post("/rooms/delete/{id}", [RoomController::class, "deleteRoom"]);