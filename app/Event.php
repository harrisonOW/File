<?php
/**
 * Created by PhpStorm.
 * User: harri
 * Date: 01/11/2018
 * Time: 16:53
 */

namespace App;
use App\Booking;
use Illuminate\Database\Eloquent\Model;

class Event extends model
{
//    protected $fillable  = [
//        'name', 'description', 'img_path','start_date','end_date','price','booking_per_person','capacity','external_link',"event_address","long","lat"
//    ];
    protected  $guarded = [""];

    public function getStartDateAttribute($value) {
        return \Carbon\Carbon::parse($value);
    }

    public function getFinishDateAttribute($value) {
        return \Carbon\Carbon::parse($value);
    }

    public function getEndDateAttribute($value) {
        return \Carbon\Carbon::parse($value);
    }




    public function EventBelongsTo(){
        return $this->belongsTo(User::class,'user_id'); //This will be able to show who has booked onto the event, and
        //how many people
    }

    public function BookingsMade(){
        return $this->hasMany(Booking::class,'event_id'); //This will be able to show who has booked onto the event, and
        //how many people
    }

    public function BookableExtras(){
        return $this->hasMany(Event_Extra::class,'event_id');
    }

    public function path(){
         return '/Event/'.$this->id;
    }

    public function EventAvailability(){
        $Available = $this->capacity;
        foreach($this->BookingsMade() as $booking){
            $Available = $Available - $booking->booking_quantity;
        }

        return  ($Available >=1 ? true : false);
    }

    public function AvailableSpaces(){
        $Available = $this->capacity;
        foreach($this->BookingsMade as $booking){

            $Available = $Available - $booking->booking_quantity;
        }
        if  ($Available <= $this->booking_per_person){
            return $Available;
        }
        return $this->booking_per_person;

    }


    protected $table = 'booking_system_events';
}
