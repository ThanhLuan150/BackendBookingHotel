<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('history_buy_foods', function (Blueprint $table) {
            $table->increments('history_buy_food_id');
            $table->unsignedInteger('food_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('order_id');
            $table->timestamps();
        
            $table->foreign('food_id')->references('id')->on('foods');
            $table->foreign('user_id')->references('id')->on('usersses');
            $table->foreign('order_id')->references('id')->on('orders');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_buy_foods');
    }
};
