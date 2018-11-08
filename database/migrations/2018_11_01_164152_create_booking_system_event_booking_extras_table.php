<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingSystemEventBookingExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_system_event_booking_extras', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('extra_id');
            $table->unsignedInteger('event_id');
            $table->unsignedInteger('booking_id');
            $table->string('name');
            $table->decimal('total_extra_cost',10,2);
            $table->decimal('individual_price',10,2);
            $table->integer('quantity');
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
        Schema::dropIfExists('booking_system_event_booking_extras');
    }
}
