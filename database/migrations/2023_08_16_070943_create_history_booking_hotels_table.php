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
        Schema::create('history_booking_hotels', function (Blueprint $table) {
            $table->increments('history_booking_id');
            $table->unsignedInteger('room_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('booking_id');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->timestamps();
        
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('user_id')->references('id')->on('usersses');
            $table->foreign('booking_id')->references('id')->on('bookings');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_booking_hotels');
    }
};
