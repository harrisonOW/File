<?php

namespace App\Http\Controllers;

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

    public function show(Event $event)
    {
        //This will be used to return all the Events

        return view('eventsViews.show', compact('event'));

    }



}
