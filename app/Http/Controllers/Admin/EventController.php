<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Event;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //This will be used to return all the Events
        $events = Event::all();
        return view('eventsViews.index', ['events' => $events]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('eventsViews.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $format = 'Y/m/d h:m:s';
        if ($request->EventStartDate) {
            $request->EventStartDate = Carbon::parse($request->EventStartDate)->format('Y/m/d h:m:s');
        }
        if ($request->EventEndDate) {
            $request->EventEndDate = Carbon::parse($request->EventEndDate)->format('Y/m/d h:m:s');
        }

        $validatedData = $request->validate([
            'EventName' => ['required','min:5','max:255'],
            'EventDescription' => ['required','min:5','max:500'],
            'EventImg_path' => ['required'],
            'EventStartDate' => ['required','date'],
            'EventEndDate' => ['required','date'],
        ]);
//        dd($request->EventEndDate, $request->EventStartDate  );
        $event = Event::create([
            'name' => $request->EventName,
            'description' => $request->EventDescription,
            'img_path' => $request->EventImg_path,
            'start_date' => $request->EventStartDate ,
            'end_date'  => $request->EventEndDate,

        ]);

    return redirect($event->path());





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
        return view('eventsViews.partials.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
