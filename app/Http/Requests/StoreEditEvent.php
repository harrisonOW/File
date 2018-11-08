<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEditEvent extends FormRequest
{


    protected $rules = [
        'EventName' => ['required', 'min:5', 'max:255'],
        'EventDescription' => ['required', 'min:5', 'max:500'],
        'EventPrice' => ['required'],
        'EventImg_path' => ['required'],
        'EventCapacity' => ['required'],
        'EventPerPerson' => ['required'],
        'EventStartDate' => ['required', 'date'],
        'Event_address' => ['required'],
        'Event_lat' => ['required'],
        'Event_long' => ['required'],
        'EventEndDate' => ['required', 'date'],
        'Extra_Name.*' => ['required'],
        'Extra_Description.*' => ['required'],
        'Extra_Path.*' => ['required'],
        'Extra_Price.*' => ['required'],
        'Extra_Optional.*' => [],
        'Extra_AmountAvailable.*' => ['required'],
        'Extra_PerPerson.*' => ['required'],
        'ExistingExtra_Name.*' => ['required'],
        'ExistingExtra_Description.*' => ['required'],
        'ExistingExtra_Path.*' => ['required'],
        'ExistingExtra_Price.*' => ['required'],
        'ExistingExtra_Optional.*' => [],
        'ExistingExtra_AmountAvailable.*' => ['required'],
        'ExistingExtra_PerPerson.*' => ['required'],
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
        //if the value is passed which matches an existing value, or one enetered return a special error
        return $this->rules;
    }
}
