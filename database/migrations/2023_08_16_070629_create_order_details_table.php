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
       Schema::create('order_details', function (Blueprint $table) {
            $table->unsignedInteger('id_orders');
            $table->unsignedInteger('id_foods');
            $table->integer('quantity');
            $table->foreign('id_orders')->references('id_orders')->on('orders');
            $table->foreign('id_foods')->references('id_foods')->on('foods');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
