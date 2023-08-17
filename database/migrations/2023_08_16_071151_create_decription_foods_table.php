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
        Schema::create('decription_foods', function (Blueprint $table) {
            $table->increments('id_decription_food');
            $table->string('decription_food_content');
            $table->unsignedInteger('id_foods');
            $table->foreign('id_foods')->references('id_foods')->on('foods');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('decription_foods');
    }
};
