<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingSystemEventExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_system_event_extras', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('event_id');
            $table->string('name');
            $table->text('description');
            $table->string('external_path')->default("Null");
            $table->string('optional');
            $table->decimal('price')->default(0.0);
            $table->integer('extras_per_person');
            $table->integer('amount_available');
            $table->timestamp('cancelled_at')->default(null);
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
        Schema::dropIfExists('booking_system_event_extras');
    }
}
