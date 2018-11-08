<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class StoreEvent extends FormRequest
{

    protected $rules = [
        'EventName' => ['required', 'min:5', 'max:255'],
        'EventDescription' => ['required', 'min:5', 'max:1000'],
        'EventPrice' => ['required'],
        'EventImg_path' => ['required'],
        'EventCapacity' => ['required'],
        'EventPerPerson' => ['required'],
        'EventStartDate' => ['required', 'date'],
        'EventEndDate' => ['required', 'date'],
        'EventExternalLink' => [],
        'Event_address' => ['required'],
        'Event_lat' =>['required'],
        'Event_long' =>['required'],
        'Extra_Name.*' => ['required'],
        'Extra_Description.*' => ['required'],
        'Extra_Path.*' => ['required'],
        'Extra_Price.*' => ['required'],
        'Extra_Optional.*' => [],
        'Extra_AmountAvailable.*' => ['required'],
        'Extra_PerPerson.*' => ['required'],
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

      return $this->rules;


    }
}
