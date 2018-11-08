<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreEditEvent;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEvent;

use App\Event;
use App\Event_Extra;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
class EventController extends Controller
{

    public function index()
    {
        //This will be used to return all the Events
        $events = Event::all();
        return view('eventsViews.Admin.index', ['events' => $events]);

    }


    public function create()
    {
        //
        return view('eventsViews.Admin.create');
    }



    public function store(StoreEvent $request)
    {
        $request = $this->formatDate($request);

        $event = $this->AddEvent($request);
        if ($request->Extra_Name != null ) {
            foreach($request->Extra_Name as $key => $ExtraName){
                $event->BookableExtras()->create(["name" => $request->Extra_Name[$key], "description" => $request->Extra_Description[$key], "external_path" => $request->Extra_Path[$key],
                "price" => $request->Extra_Price[$key], "optional" => $request->Extra_Optional[$key], 'amount_available' => $request->Extra_AmountAvailable[$key], 'extras_per_person' => $request->Extra_PerPerson[$key]]);
            }
        }

    return redirect($event->path());
    }



    public function AddEvent($request){

        $event = Event::create([
            'name' => $request->EventName,
            'description' => $request->EventDescription,
            'price' => $request->EventPrice,
            'external_link' => $request->EventExternalLink,
            'capacity' => $request->EventCapacity,
            'booking_per_person' => $request->EventPerPerson,
            'img_path' => $request->EventImg_path,
            'event_address' => $request->Event_address,
            'long' => $request->Event_long,
            'lat' => $request->Event_lat,
            'start_date' => $request->EventStartDate,
            'end_date' => $request->EventEndDate,

        ]);

        return $event;
    }



    public function show(Event $event)
    {
        return view('eventsViews.Admin.show', ['event' => $event]);
    }


    public function edit(Event $event)
    {

        return view('eventsViews.Admin.edit', ['event' => $event]);
    }


    public function update(StoreEditEvent $request, Event $event)
    {
        dd($request);
        $request = $this->formatDate($request);
        //Check and Add changes made to event, this shouldnt change its id or that
        $event->update(['name' => $request->EventName, 'description' => $request->EventDescription, 'price' => $request->EventPrice, 'external_link' => $request->EventExternalLink,
            'capacity' => $request->EventCapacity, 'booking_per_person' => $request->EventPerPerson, 'img_path' => $request->EventImg_path, 'location' => $request->EventLocation, 'start_date' => $request->EventStartDate, 'end_date' => $request->EventEndDate]);

        if (!$request->ExistingExtra_Name == null) {
            //if the existing have been updated
            foreach ($request->Extra_id_for as $key => $ExtraId)
            {
                //"optional" => $request->ExistingExtra_Optional[$key]

                Event_Extra::find($ExtraId)
                ->update(["name" => $request->ExistingExtra_Name[$key], "description" => $request->ExistingExtra_Description[$key], "external_path" => $request->ExistingExtra_Path[$key],
                    "price" => $request->ExistingExtra_Price[$key],  'amount_available' => $request->ExistingExtra_AmountAvailable[$key], 'extras_per_person' => $request->ExistingExtra_PerPerson[$key]]);
            }
        }
        dd("HI");
        if(!$request->Extra_Name == null){
            //if more have been added
            foreach($request->Extra_Name as $key => $EventName)
                {
                    //"optional" => $request->Extra_Optional[$key],
                    $event->BookableExtras()->create(["name" => $request->Extra_Name[$key], "description" => $request->Extra_Description[$key], "external_path" => $request->Extra_Path[$key],
                        "price" => $request->Extra_Price[$key], 'amount_available' => $request->Extra_AmountAvailable[$key], 'extras_per_person' => $request->Extra_PerPerson[$key]]);
                }
        }

        return redirect($event->path());
    }

    public function destroy(Event $event)
    {
        //
    }

    public function formatDate($request){
        $format = 'Y/m/d h:m:s';
        if ($request->EventStartDate && $request->EventEndDate) {
            $request->EventStartDate = Carbon::parse($request->EventStartDate)->format('Y/m/d h:m:s');
            $request->EventEndDate = Carbon::parse($request->EventEndDate)->format('Y/m/d h:m:s');
            return $request;
        } else {
            return back()->withErrors(['You have mis-entered a date field', 'You have mis-entered a time field']);;
        }
    }




}
