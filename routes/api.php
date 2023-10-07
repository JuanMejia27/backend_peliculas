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
