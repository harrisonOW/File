<?php

namespace App\Http\Controllers;

use App\Event_Extra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Event;
use App\Booking;
use App\Http\Requests\StoreBooking;

class BookingController extends Controller
{

    public function index()
    {
        //We want this to show all users bookings
        $user = Auth()->user();

        return view ('bookedViews.index', ['events' => $user->UserBookings]);

    }

    public function create()
    {
        //This shouldnt be used
    }

    public function store(StoreBooking $request, Booking $booking)
    {

        try {
            $user = Auth()->user();
            $event = Event::find($request->EventBooking_id);

            $booking = $user->UserBookings()->create([
                    "event_id" => $request->EventBooking_id,
                    "booking_quantity"=>$request->Event_Qty,
                    "individual_price"=>$event->price,
                    "total_event_cost"=> ($event->price * $request->Event_Qty),
                    "total_cost" => ($event->price * $request->Event_Qty)
            ]);

            foreach($request->EventExtraId as $index => $extra) {
                $extra = Event_Extra::find($extra);


                $extraBooked = $booking->ExtrasBooked()->create([
                    "extra_id" => $extra->id,
                    "event_id" => $event->id,
                    "name" => $extra->name,
                    "total_extra_cost" => ($extra->price * $request->Extra_Qty_[$index]),
                    "individual_price" => $extra->price,
                    "quantity" =>  $request->Extra_Qty_[$index] ? $request->Extra_Qty_[$index] : $extra->extras_per_person,
                ]);
                $booking->total_cost += $extraBooked->total_extra_cost;
                $booking->save();
            }


            return redirect("/Bookings/$booking->id");

        } catch (Exception $exception) {
            return $this->errorResponse('Unexpected error occurred while trying to process your request!');
        }
    }




    public function show(Booking $Booking)
    {
        $user = Auth()->user();
        return view ('bookedViews.show', ['user' => $user, 'booking'=>$Booking]);

    }


    public function edit($id)
    {
        $user = Auth()->user();

    }


    public function update(Request $request, $id)
    {
        $user = Auth()->user();

    }


    public function destroy($id)
    {
        $user = Auth()->user();

    }
}
