<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingSystemEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_system_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->decimal('price')->nullable();
            $table->string('external_link')->nullable();
            $table->integer('capacity');
            $table->integer('booking_per_person');
            $table->string('img_path')->default("/images/event.jpg");
            $table->text('event_address');
            $table->decimal('long', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamp('cancelled_at');
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
        Schema::dropIfExists('booking_system_events');
    }
}
