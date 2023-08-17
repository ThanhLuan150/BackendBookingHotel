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
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id_likes');
            $table->unsignedInteger('id_rooms');
            $table->unsignedInteger('id_users');
            $table->foreign('id_users')->references('id_users')->on('usersses');
            $table->foreign('id_rooms')->references('id_rooms')->on('rooms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
