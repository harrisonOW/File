<?php
/**
 * Created by PhpStorm.
 * User: harri
 * Date: 01/11/2018
 * Time: 16:52
 */

namespace App;
//use App\Event;
//use App\Booking_Extra;
//use App\Event_Extra;
//use App\User;
use Illuminate\Database\Eloquent\Model;

class Booking extends model
{
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'start_date',
        'end_date'
    ];


    public function EventBooked(){
        return $this->belongsTo(Event::class,'event_id'); //This will find occasions where the BookingController, belongs to specific Event
    }

    public function Owner(){
        return $this->belongsTo(User::class,'user_id'); //This will allow the option to find which user has booked the Event
    }

    public function ExtrasBooked(){
        return $this->hasMany(Booking_Extra::class,'booking_id'); //This will allow the extras which have been booked along with the event
    }

    public function ExtrasCost(){
        $cost = 0.00;
        foreach($this->ExtrasBooked as $extra)
        {
            $cost += $extra->total_extra_cost;
        }
        return $cost;
    }


    protected $table = 'booking_system_event_bookings';
}
