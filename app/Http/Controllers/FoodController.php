<?php

namespace App\Http\Controllers;

use App\Models\category_foods;
use App\Models\foods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FoodController extends Controller
{
    public function getFood(){
        $foods  = foods::all();
        return response()-> json( $foods );
    }
    public function getCategoryFood(){
        $categoryfoods  = category_foods::all();
        return response()-> json(  $categoryfoods  );
    }

    public function getFoodDetail($FoodID)
    {
        $foodDetail = DB::table('foods')
            ->join('category_foods', 'foods.id_categori_foods', '=', 'category_foods.id_categori_foods')
            ->select('category_foods.*', 'foods.*')
            ->where('foods.id_foods', '=', $FoodID)
            ->get();
    
        return response()->json(['foodDetail' =>  $foodDetail], 200);
    }
    public function getSimilarFoods($FoodID){
        // Lấy thông tin id_categori_room của phòng hiện tại
        $currentFood = DB::table('foods')
            ->select('id_categori_foods')
            ->where('id_foods', '=', $FoodID)
            ->first();
        
        $similarFoods = DB::table('foods')
            ->join('category_foods', 'foods.id_categori_foods', '=', 'category_foods.id_categori_foods')
            ->select('category_foods.*', 'foods.*')
            ->where('foods.id_categori_foods', '=', $currentFood->id_categori_foods)
            ->where('foods.id_foods', '<>', $FoodID) // Loại trừ phòng hiện tại
            ->get();
    
        return response()->json(['similar_rooms' => $similarFoods], 200);
    }

    public function getTypeFoods($CategoryID) {
        $TypeFoods = DB::table('foods')
            ->join('category_foods', 'foods.id_categori_foods', '=', 'category_foods.id_categori_foods')
            ->select('category_foods.*', 'foods.*')
            ->where('foods.id_categori_foods', '=', $CategoryID)
            ->get();
    
        return response()->json(['type_foods' => $TypeFoods], 200);
    }
    public function getListFoods() {
        $ListFoods = DB::table('foods')
            ->join('category_foods', 'foods.id_categori_foods', '=', 'category_foods.id_categori_foods')
            ->select('category_foods.*', 'foods.*')
            ->get();
    
        return response()->json(['list_foods' => $ListFoods], 200);
    }
}
