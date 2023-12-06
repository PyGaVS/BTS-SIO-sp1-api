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
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('damages');
        Schema::dropIfExists('reports');
        Schema::dropIfExists('booking_users');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('cars');
        Schema::dropIfExists('car_models');
        //test
    }
};
