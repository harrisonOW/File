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

    public function ExtraBelongsTo(){
        return $this->belongsTo(Event::class, 'event_id'); //This will which event this is associated to
    }



    protected $table = 'booking_system_event_extras';
}
