<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_records', function (Blueprint $table) {
            $table->id();
            $table->string('attend_id');
            $table->string('staff_id');
            $table->string('current_date');
            $table->string('date_checkIn')->nullable();
            $table->string('time_checkIn')->nullable();
            $table->string('location_checkIn')->nullable();
            $table->string('profile_photo_url')->nullable();
            $table->string('time_checkOut')->nullable();
            $table->string('location_checkOut')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_records');
    }
};
