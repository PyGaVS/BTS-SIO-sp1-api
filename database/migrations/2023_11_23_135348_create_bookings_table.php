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
            $table->id();
            $table->integer('number')->unique();
            $table->string('status');
            $table->dateTime('beginDate');
            $table->dateTime('endDate');
            $table->integer('nbPassenger');
            $table->foreignId('startAgency')->nullable()->constrained('agencies');
            $table->foreignId('endAgency')->nullable()->constrained('agencies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_users');
        Schema::dropIfExists('bookings');
    }
};
