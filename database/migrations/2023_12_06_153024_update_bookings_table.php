<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up(): void
    {
        $psCustomerBookings = "
        CREATE PROCEDURE `ps_customer_bookings`(IN user_id INT)
        BEGIN
            SELECT
                bookings.*,
                GROUP_CONCAT(CONCAT(users.firstname, ' ', users.lastname) SEPARATOR ', ') AS driver_names
            FROM bookings
            LEFT JOIN booking_users ON bookings.id = booking_users.booking_id
            LEFT JOIN users ON users.id = booking_users.user_id
            WHERE bookings.customer = user_id
            GROUP BY bookings.id, bookings.number;
        END
        ";
        $psCustomerBookingsShow = "
        CREATE PROCEDURE `ps_customer_bookings_show`(IN user_id INT, IN id INT)
        BEGIN
            SELECT
                bookings.*,
                GROUP_CONCAT(CONCAT(users.firstname, ' ', users.lastname) SEPARATOR ', ') AS driver_names
            FROM bookings
            LEFT JOIN booking_users ON bookings.id = booking_users.booking_id
            LEFT JOIN users ON users.id = booking_users.user_id
            WHERE bookings.customer = user_id AND bookings.id = id
            GROUP BY bookings.id, bookings.number;
        END
        ";

        Schema::table('bookings', function (Blueprint $table) {
            $table->foreignId('car_id')->constrained();
            $table->foreignId('car_model_id')->constrained();
            $table->foreignId('customer')->constrained('users');
        });

        DB::unprepared($psCustomerBookings);
        DB::unprepared($psCustomerBookingsShow);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP procedure IF EXISTS `ps_customer_bookings`");
        DB::unprepared("DROP procedure IF EXISTS `ps_customer_bookings_show`");
    }
};
