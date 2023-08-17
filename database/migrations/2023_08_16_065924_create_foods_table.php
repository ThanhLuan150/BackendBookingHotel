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
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('id_foods');
            $table->string('name_foods');
            $table->string('image_foods');
            $table->string('cost_price');
            $table->string('discount_price');
            $table->string('discription_food');
            $table->unsignedInteger('id_categori_foods');
            $table->foreign('id_categori_foods')->references('id_categori_foods')->on('category_foods');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
