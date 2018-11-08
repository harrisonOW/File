<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Event_Extra;
use App\Event;
class StoreBooking extends FormRequest
{

    protected $rules =
        [
            "EventBooking_id"=>["bail","exists:booking_system_events,id", "required","integer"],
            "EventExtraId.*"=>["exists:booking_system_event_extras,id","integer"],
            "Extra_Qty_.*" => ["sometimes","required","integer"]
        ];
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        if(!request()->EventExtraId == null) {
            foreach (request()->EventExtraId as $count => $extra) {
                //This will get the refernce of the extra, get how many spaces are avaliable and the user is able to book and apply this as a rule
                $extraBooking = Event_Extra::find($extra);
                if($extraBooking ==null){
                    return $this->rules;
                }
                $space = $extraBooking->AmountBookable();
                $validationMethods = ["required","integer","between:0,$space"];
                $this->rules["Extra_Qty_.*"] = $validationMethods;

            }
        }
        if(!request()->EventBooking_id == null){

                //This will get the refernce of the event, get how many spaces are avaliable and the user is able to book and apply this as a rule
                $eventBooking = Event::find(request()->EventBooking_id);
                if($eventBooking ==null){
                    return $this->rules;
                }
                $Eventspace = $eventBooking->AvailableSpaces();
                $validationMethods = ["required","integer","between:0,$Eventspace"];
                $this->rules["Event_Qty"] = $validationMethods;

        }


        return $this->rules;
    }

    public function messages()
    {
        return [
            'EventBooking_id.required' => 'A name attribute is required',
            'Extra_Qty_.required'  => 'A price attribute is required',

        ];
    }
}
