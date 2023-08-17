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
        Schema::create('information_rooms', function (Blueprint $table) {
            $table->increments('id_information_room');
            $table->string('information_room_image');
            $table->string('information_room_name');
            $table->unsignedInteger('id_rooms');
            $table->foreign('id_rooms')->references('id_rooms')->on('rooms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information_rooms');
    }
};
