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
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id_bookings');
            $table->string('status');
            $table->date('date_booking');
            $table->string('feedBack');
            $table->float('total_price');
            $table->unsignedInteger('id_users');
            $table->foreign('id_users')->references('id_users')->on('usersses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
