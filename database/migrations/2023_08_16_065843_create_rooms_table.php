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
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id_rooms');
            $table->string('rooms_name');
            $table->string('image_rooms');
            $table->string('price_rooms');
            $table->string('description');
            $table->unsignedInteger('id_categori_room');
            $table->foreign('id_categori_room')->references('id_categori_room')->on('category_rooms');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
