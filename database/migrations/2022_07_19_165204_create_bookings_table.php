<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('agenda', 100);
            $table->string('snack');
            $table->date('date');
            $table->integer('person');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('room_id')->references('id')->on('rooms');
            $table->foreignId('unit_id')->references('id')->on('units');
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
        Schema::dropIfExists('bookings');
    }
}
