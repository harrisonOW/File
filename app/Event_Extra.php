<?php
/**
 * Created by PhpStorm.
 * User: harri
 * Date: 01/11/2018
 * Time: 16:52
 */

namespace App;
use Illuminate\Database\Eloquent\Model;


class Event_Extra extends model
{

    protected $guarded = [];

    public function ExtraBelongsTo(){
        return $this->belongsTo(Event::class,'event_id');
    }

    public function ExtrasBooked(){

        return $this->hasMany(Booking_Extra::class,'extra_id');
    }



    public function ExtraAvailability(){
        $booked = 0;
        foreach($this->ExtrasBooked as $extraBooked){
            $booked = $booked + $extraBooked->quantity;
        }
       if($booked < $this->amount_available){
            return true;
        }
        return false;
    }

    public function AmountBookable(){
        $Avaliablebooking = $this->amount_available;
        foreach($this->ExtrasBooked as $extraBooked){
            $Avaliablebooking = $Avaliablebooking - $extraBooked->quantity;
        }

        if($Avaliablebooking<=$this->extras_per_person){
            return $Avaliablebooking;
        }
        return $this->extras_per_person;

    }



    protected $table = 'booking_system_event_extras';
}
