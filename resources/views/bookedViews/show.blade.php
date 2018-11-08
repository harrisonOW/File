@extends('layouts.app')

@section('header')
    @push('style')
        <style>
            .Event-image-container{
                text-align:center;
                position: relative;
                background:black;
            }
            .Event-image-container img {
                min-height: 500px;
                width: 100%;
            }

            .date {
                height:150px;
                width:150px;
                border: 2px solid white;
                left:3em;
                text-align:center;
                background: transparent;
                position:absolute;
                -webkit-box-shadow: 18px 18px 11px 12px rgba(0,0,0,0.75);
                -moz-box-shadow: 18px 18px 11px 12px rgba(0,0,0,0.75);
                box-shadow: 18px 18px 11px 12px rgba(0,0,0,0.75);
            }
            .date .day{
                color:white;
                font-size:2.5em;
            }

            .date .month{
                color:white;
                font-size:2.5em;
                font-weight:bolder;
            }

            .booking-table .row:nth-of-type(even){
                background-color: #ffffff;
            }
            .booking-table .row:nth-of-type(odd){
                background-color: #efefef;
            }
            .booking-table .row {

                height:3.5em;
                padding:.5em;
            }

            .dot {
                height: 15px;
                top: 2px;
                width: 15px;
                background-color: #bbb;
                border-radius: 50%;
                display: inline-block;
                position: relative;
            }

            .Available {
                background-color: #6cbb21;
            }

            .Event_Data_Options {
                background: #000000d4;
                position: absolute;
                bottom: 0px;
                width: 100%;
            }

            .nav-tabs .nav-item{

                color: white;
                margin: 10px;
            }
            .nav-tabs .nav-item a{
                color: white;
            }
            .nav-tabs .nav-link.active, .nav-pills .show>.nav-link {
                color: #fff;
                background-color: #66788c;
            }


        </style>
    @endpush
@endsection


@section('content')
<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card Event-card ">
                    <div class="card-img-top Event-image-container">
                        <div class="date">
                            <div class="day">{{$booking->EventBooked->start_date->toFormattedDateString()}}</div>

                        </div>
                        <div class="Event_Data_Options">
                            <ul class="nav nav-tabs nav-justified" id="pills-tab" role="tablist">
                                <li class="nav-item">

                                    <a class="nav-link active" id="pills-Booking-Overview-tab" data-toggle="pill" href="#pills-Booking-Overview" role="tab" aria-controls="pills-Booking-Overview" aria-expanded="true" aria-selected="true"><i class="fas fa-info-circle"></i><br>Booking Overview</a>
                                </li>
                                <li class="nav-item">

                                    <a class="nav-link " id="pills-BookedExtras-tab" data-toggle="pill" href="#pills-BookedExtras" role="tab" aria-controls="pills-BookedExtras" aria-expanded="true" aria-selected="false"><i class="fas fa-tags"></i></br>Booked Extras</a>
                                </li>
                                <li class="nav-item">

                                    <a class="nav-link " id="pills-Location-tab" data-toggle="pill" href="#pills-Location" role="tab" aria-controls="pills-Location" aria-expanded="true" aria-selected="false"><i class="fas fa-map-marked-alt"></i></br>Location</a>
                                </li>
                                <li class="nav-item">

                                    <a class="nav-link " id="pills-Overview-tab" data-toggle="pill" href="#pills-Overview" role="tab" aria-controls="pills-Overview" aria-expanded="true" aria-selected="false"><i class="fas fa-calendar-alt"></i><br>Event Overview</a>
                                </li>
                                <li class="nav-item">

                                    <a class="nav-link " id="pills-Book-tab" data-toggle="pill" href="#pills-Book" role="tab" aria-controls="pills-Book" aria-expanded="true" aria-selected="false"> <i class="fas fa-edit"></i></br>Edit</a>
                                </li>
                                <li class="nav-item">

                                    <a class="nav-link " id="pills-Cancel-tab" data-toggle="pill" href="#pills-Cancel" role="tab" aria-controls="pills-Cancel" aria-expanded="true" aria-selected="false"> <i class="fas fa-calendar-times"></i></br>Cancel</a>
                                </li>
                            </ul>
                        </div>
                        @if($booking->EventBooked->img_path != "")
                            <img class="Event-image img-responsive" src="{{$booking->EventBooked->img_path}}"/>

                        @else
                            <img class="Event-image img-responsive" src="/images/event.jpg"/>
                        @endif
                    </div>
                    <div class="card-header">
                        <h3>{{$booking->EventBooked->name}}</h3>
                    </div>
                    <div class="card-body Event-content">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-Booking-Overview" role="tabpanel" aria-labelledby="pills-Booking-Overview-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <p>Details</p>
                                    </div>
                                    <div class="card-body">
                                        <p>Start Date: {{$booking->EventBooked->start_date->toFormattedDateString()}}</p>
                                        <p>Finish Date: {{$booking->EventBooked->finish_date->toFormattedDateString()}}</p>
                                        <p>Event Bookie : {{$booking->Owner->name}} </p>
                                        <p>Spaces Booked : {{$booking->booking_quantity}} </p>
                                        <p>Event Cost: {{$booking->total_event_cost}} </p>
                                        <p>Extras Cost: {{$booking->ExtrasCost()}} </p>
                                        <p>Total Cost: {{$booking->total_cost}} </p>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="pills-Overview" role="tabpanel" aria-labelledby="pills-Overview-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <p>Details</p>
                                    </div>
                                    <div class="card-body">
                                        <p>Start Date: {{$booking->EventBooked->start_date->toFormattedDateString()}}</p>
                                        <p>Finish Date: {{$booking->EventBooked->finish_date->toFormattedDateString()}}</p>
                                        <p>Location : {{$booking->EventBooked->event_address}} </p>
                                        <p>Capacity : {{$booking->EventBooked->capacity}} </p>
                                        <p>Bookings Per Person : {{$booking->EventBooked->booking_per_person}} </p>
                                        <p>Description:</p>
                                        <p> {{$booking->EventBooked->description}} </p>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="pills-Location" role="tabpanel" aria-labelledby="pills-Location-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <p>Details</p>
                                    </div>
                                    <div class="card-body">
                                        @include('bookedViews.partials.ShowLocation')
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show " id="pills-BookedExtras" role="tabpanel" aria-labelledby="pills-BookedExtras-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <p>Total Extras Cost: £ {{$booking->ExtrasCost()}}</p>
                                    </div>


                                    @isset($booking->ExtrasBooked)

                                        <div class="card-body">

                                            <ul>
                                                @foreach($booking->ExtrasBooked as $extra)
                                                    <li>Extra: {{$extra->name}},</li>
                                                    <ul>
                                                        <li>Description: {{$extra->ExtraIsOf->description}}</li>
                                                        <li>Individual Price: {{$extra->ExtraIsOf->price}}</li>
                                                        <li>Extra Booked: {{$extra->quantity}}</li>
                                                        <li>Total Cost: {{$extra->total_extra_cost}}</li>
                                                    </ul>
                                                @endforeach
                                            </ul>

                                        </div>
                                    @endisset
                                    <div class="card-footer">

                                        <p>Total Cost of Extras: £ </p>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show " id="pills-Description" role="tabpanel" aria-labelledby="pills-Description-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <p>What's going on: </p>
                                    </div>
                                    <div class="card-body">
                                        <p>{{$booking->EventBooked->description}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show " id="pills-Cancel" role="tabpanel" aria-labelledby="pills-Cancel-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <p>Are you sure you want to cancel?</p>
                                    </div>
                                    <div class="card-body">
                                        <a href="" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                            </div>




                            <div class="tab-pane fade show " id="pills-Book" role="tabpanel" aria-labelledby="pills-Book-tab">

                                @guest
                                    <p>Please sign in or register to book this event</p>
                                @endguest
                                @auth
                                    <form action="/Bookings/{{auth()->id()}}" method="post">
                                        @csrf
                                        <div class="container-fluid booking-table">
                                            <input name="EventBooking_id" hidden value="{{$booking->EventBooked->id}}">
                                            <div class="row">
                                                <div class="col-3">
                                                    <p>Name</p>
                                                </div>
                                                <div class="col-3">
                                                    <p>Status</p>
                                                </div>
                                                <div class="col-3">
                                                    <p>Price</p>
                                                </div>
                                                <div class="col-3">
                                                    <p>Quantity</p>
                                                </div>
                                            </div>
                                            <div class="row Event-book">
                                                <div class="col-3">
                                                    {{$booking->EventBooked->name}}
                                                </div>
                                                <div class="col-3">
                                                    <i {{$booking->EventBooked->EventAvailability()}} ? class="dot Available" : class ="dot"></i>
                                                    @if($booking->EventBooked->EventAvailability() === true) Available @else Not Available @endif
                                                </div>
                                                <div class="col-3">
                                                    {{$booking->EventBooked->price}}
                                                </div>
                                                <div class="col-3">
                                                    @if($booking->EventBooked->EventAvailability() === true)
                                                        <select id="Event_Qty" name="Event_Qty">
                                                            @for($A=0;$A<=$booking->EventBooked->booking_per_person;$A++)
                                                                <option value={{$A}}>{{$A}}</option>
                                                            @endfor
                                                        </select>
                                                    @endif
                                                </div>

                                            </div>


                                        </div>
                                        <div class ="form-group">
                                            <button type="submit" disabled id="submit" class="btn btn-primary">Update</button>
                                        </div>

                            </div>
                            </form>
                            @endauth
                        </div>

                    </div>

                </div>
            </div>
        </div>
        </div>
        </div>




    <div class="container">
        <div class="row">
            @if ($errors->any())
                @include('eventsViews.partials.BookingError')
            @endif
        </div>



    </div>



        @push('script')
            <script>
                $('#Event_Qty').on("change", function(e){

                    if($("#Event_Qty :selected").val() > 0){
                        console.log("disable")
                        $("select[name^='Extra_Qty_[]']").prop('disabled', false);
                        $("#submit").prop('disabled', false);
                    }else{
                        $("select[name^='Extra_Qty_[]']").prop('disabled', true);
                        $("#submit").prop('disabled', true);
                    }
                })
            </script>
    @endpush
@endsection

