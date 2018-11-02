<?php
/**
 * Created by PhpStorm.
 * User: harri
 * Date: 01/11/2018
 * Time: 16:52
 */

namespace App;
use app\Booking;
use Illuminate\Database\Eloquent\Model;

class Booking_Extra extends model
{

    public function ExtraBelongsTo(){
        return $this->belongsTo(Booking::class,'booking_id'); // This will show what the extra booked, is booked with ie.
        //which user booked the event, and to which event
    }

    protected $table = 'booking_system_event_booking_extras';
}
