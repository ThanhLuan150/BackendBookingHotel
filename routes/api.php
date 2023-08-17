<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\RoomController;
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
//Rooms
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/category',[RoomController::class,'getCategoryRoom']);

Route::get('/rooms',[RoomController::class ,'getRoom']);

// Route::get('/callroomservice',[RoomController::class ,'getcallRoomService']);
// Route::get('/callkitchen',[RoomController::class ,'getketchenRoomService']);



Route::get('/room/{id_rooms}',[RoomController::class ,'getRoomDetail']);

Route::get('/similar-rooms/{id_room}', [RoomController::class, 'getSimilarRooms']);
Route::get('/type-rooms/{id_categori_room}', [RoomController::class, 'getTypeRooms']);


//Food
Route::get('/foods',[FoodController::class, 'getFood']);
Route::get('category',[FoodController::class ,'getCategoryFood']);

Route::get('/food/{id_foods}',[FoodController::class ,'getFoodDetail']);
Route::get('/similar-foods/{id_foods}',[FoodController::class , 'getSimilarFoods']);
Route::get('/type-foods/{id_categori_foods}', [FoodController::class, 'getTypeFoods']);