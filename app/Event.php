<?php
/**
 * Created by PhpStorm.
 * User: harri
 * Date: 01/11/2018
 * Time: 16:53
 */

namespace App;
use app\Booking;
use Illuminate\Database\Eloquent\Model;

class Event extends model
{
    protected $fillable = [
        'name', 'description', 'img_path','start_date','end_date',
    ];

    public function BookingsMade(){
        return $this->hasMany(Booking::class,'event_id'); //This will be able to show who has booked onto the event, and
        //how many people
    }

    public function BookableExtras(){
        return $this->hasMany(Event_Extra::class,'event_id'); //This will show what extras can be booked along with the event
    }

    public function path(){
         return '/Event/'.$this->id;
    }

    protected $table = 'booking_system_events';
}
