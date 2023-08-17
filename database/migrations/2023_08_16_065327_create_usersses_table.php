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
        Schema::create('usersses', function (Blueprint $table) {
            $table->increments('id_users');
            $table->string('lastname',255);
            $table->string('firstname',255);
            $table->string('email',255);
            $table->string('password',255);
            $table->boolean('role')->default(1)->nullable();
            $table->boolean('verify')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usersses');
    }
};
