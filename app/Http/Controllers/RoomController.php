<?php

namespace App\Http\Controllers;

use App\Models\call_room_services;
use App\Models\category_rooms;
use App\Models\kitchen_room_services;
use App\Models\rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RoomController extends Controller
{
    public function getcategoryRoom(){
        $categoryRoom = category_rooms::all();
        return response()->json($categoryRoom);
    }


    public function getRoom(){
        $room = rooms::all();
        return response()->json($room);
    }

    
    public function getcallRoomService(){
        $callRoomService = call_room_services::all();
        return response()->json($callRoomService);
    }

    public function getketchenRoomService(){
        $callKitchenRoomService = kitchen_room_services::all();
        return response()->json( $callKitchenRoomService);
    }



    public function getRoomDetail($CategoryID)
    {
        $roomsInCategory = DB::table('rooms')
            ->join('category_rooms', 'rooms.id_categori_room', '=', 'category_rooms.id_categori_room')
            ->join('information_rooms', 'rooms.id_rooms', '=', 'information_rooms.id_rooms')
            ->join('room_services', 'rooms.id_rooms', '=', 'room_services.id_rooms')
            ->join('coffee_room_services', 'room_services.id_coffee_room_services', '=', 'coffee_room_services.id_coffee_room_services')
            ->join('call_room_services', 'room_services.id_call_room_services', '=', 'call_room_services.id_call_room_services')
            ->join('kitchen_room_services', 'room_services.id_kitchen_room_services', '=', 'kitchen_room_services.id_kitchen_room_services')
            ->join('bathtub_room_services', 'room_services.id_bathtub_room_services', '=', 'bathtub_room_services.id_bathtub_room_services')
            ->join('internet_room_services', 'room_services.id_internet_room_services', '=', 'internet_room_services.id_internet_room_services')
            ->join('old_people_information', 'information_rooms.id_old_people_information', '=', 'old_people_information.id_old_people_information')
            ->join('youngg_people_information', 'information_rooms.id_young_people_information', '=', 'youngg_people_information.id_young_people_information')
            ->join('acreage_information', 'information_rooms.id_acreage_information', '=', 'acreage_information.id_acreage_information')
            ->select('category_rooms.*', 'rooms.*', 'information_rooms.*', 'room_services.*', 'coffee_room_services.*', 'call_room_services.*', 'kitchen_room_services.*', 'bathtub_room_services.*', 'internet_room_services.*', 'old_people_information.*', 'youngg_people_information.*', 'acreage_information.*')
            ->where('category_rooms.id_categori_room', '=', $CategoryID)
            ->get();
    
        return response()->json(['roomsInCategory' => $roomsInCategory], 200);
    }
    

    public function getSimilarRooms($RoomID){
    // Lấy thông tin id_categori_room của phòng hiện tại
    $currentRoom = DB::table('rooms')
        ->select('id_categori_room')
        ->where('id_rooms', '=', $RoomID)
        ->first();
    
    $similarRooms = DB::table('rooms')
        ->join('category_rooms', 'rooms.id_categori_room', '=', 'category_rooms.id_categori_room')
        ->join('information_rooms', 'rooms.id_rooms', '=', 'information_rooms.id_rooms')
        ->join('room_services', 'rooms.id_rooms', '=', 'room_services.id_rooms')
        ->join('coffee_room_services', 'room_services.id_coffee_room_services', '=', 'coffee_room_services.id_coffee_room_services')
        ->join('call_room_services', 'room_services.id_call_room_services', '=', 'call_room_services.id_call_room_services')
        ->join('kitchen_room_services', 'room_services.id_kitchen_room_services', '=', 'kitchen_room_services.id_kitchen_room_services')
        ->join('bathtub_room_services', 'room_services.id_bathtub_room_services', '=', 'bathtub_room_services.id_bathtub_room_services')
        ->join('internet_room_services', 'room_services.id_internet_room_services', '=', 'internet_room_services.id_internet_room_services')
        ->join('old_people_information', 'information_rooms.id_old_people_information', '=', 'old_people_information.id_old_people_information')
        ->join('youngg_people_information', 'information_rooms.id_young_people_information', '=', 'youngg_people_information.id_young_people_information')
        ->join('acreage_information', 'information_rooms.id_acreage_information', '=', 'acreage_information.id_acreage_information')
        ->select('category_rooms.*', 'rooms.*', 'information_rooms.*', 'room_services.*', 'coffee_room_services.*', 'call_room_services.*', 'kitchen_room_services.*', 'bathtub_room_services.*', 'internet_room_services.*', 'old_people_information.*', 'youngg_people_information.*', 'acreage_information.*')
        ->where('rooms.id_categori_room', '=', $currentRoom->id_categori_room)
        ->where('rooms.id_rooms', '<>', $RoomID) // Loại trừ phòng hiện tại
        ->get();

    return response()->json(['similar_rooms' => $similarRooms], 200);
}

public function getTypeRooms($CategoryID) {
    $TypeRooms = DB::table('rooms')
        ->join('category_rooms', 'rooms.id_categori_room', '=', 'category_rooms.id_categori_room')
        ->join('information_rooms', 'rooms.id_rooms', '=', 'information_rooms.id_rooms')
        ->join('room_services', 'rooms.id_rooms', '=', 'room_services.id_rooms')
        ->join('coffee_room_services', 'room_services.id_coffee_room_services', '=', 'coffee_room_services.id_coffee_room_services')
        ->join('call_room_services', 'room_services.id_call_room_services', '=', 'call_room_services.id_call_room_services')
        ->join('kitchen_room_services', 'room_services.id_kitchen_room_services', '=', 'kitchen_room_services.id_kitchen_room_services')
        ->join('bathtub_room_services', 'room_services.id_bathtub_room_services', '=', 'bathtub_room_services.id_bathtub_room_services')
        ->join('internet_room_services', 'room_services.id_internet_room_services', '=', 'internet_room_services.id_internet_room_services')
        ->join('old_people_information', 'information_rooms.id_old_people_information', '=', 'old_people_information.id_old_people_information')
        ->join('youngg_people_information', 'information_rooms.id_young_people_information', '=', 'youngg_people_information.id_young_people_information')
        ->join('acreage_information', 'information_rooms.id_acreage_information', '=', 'acreage_information.id_acreage_information')
        ->select('category_rooms.*', 'rooms.*', 'information_rooms.*', 'room_services.*', 'coffee_room_services.*', 'call_room_services.*', 'kitchen_room_services.*', 'bathtub_room_services.*', 'internet_room_services.*', 'old_people_information.*', 'youngg_people_information.*', 'acreage_information.*')
        ->where('rooms.id_categori_room', '=', $CategoryID)
        ->get();

    return response()->json(['type_rooms' => $TypeRooms], 200);
}




    
}
