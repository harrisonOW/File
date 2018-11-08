@extends('layouts.app')


@section('content')
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

    <div class="container">
        <div class="row">
            @if ($errors->any())
                @include('eventsViews.partials.BookingError')
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card Event-card ">
                    <div class="card-img-top Event-image-container">
                        <div class="date">
                            <div class="day">{{$event->start_date->toFormattedDateString()}}</div>

                        </div>
                        <div class="Event_Data_Options">
                            <ul class="nav nav-tabs nav-justified" id="pills-tab" role="tablist">
                                <li class="nav-item">

                                    <a class="nav-link active" id="pills-Overview-tab" data-toggle="pill" href="#pills-Overview" role="tab" aria-controls="pills-Overview" aria-expanded="true" aria-selected="true"><i class="fas fa-info-circle"></i><br>Overview</a>
                                </li>
                                <li class="nav-item">

                                    <a class="nav-link " id="pills-Price-tab" data-toggle="pill" href="#pills-Price" role="tab" aria-controls="pills-Price" aria-expanded="true" aria-selected="false">   <i class="fas fa-pound-sign"></i><br>Price</a>
                                </li>
                                <li class="nav-item">

                                    <a class="nav-link " id="pills-Description-tab" data-toggle="pill" href="#pills-Description" role="tab" aria-controls="pills-Description" aria-expanded="true" aria-selected="false"><i class="fas fa-align-justify"></i><br>Description</a>
                                </li>
                                <li class="nav-item">

                                    <a class="nav-link " id="pills-Extras-tab" data-toggle="pill" href="#pills-Extras" role="tab" aria-controls="pills-Extras" aria-expanded="true" aria-selected="false"><i class="fas fa-tags"></i></br>Extras</a>
                                </li>
                                <li class="nav-item">

                                    <a class="nav-link " id="pills-Book-tab" data-toggle="pill" href="#pills-Book" role="tab" aria-controls="pills-Book" aria-expanded="true" aria-selected="false"> <i class="fas fa-shopping-cart"></i></br>Book</a>
                                </li>
                            </ul>
                        </div>
                        @if($event->img_path == "")
                            <img class="Event-image img-responsive" src="/images/event.jpg"/>
                        @else
                            <img class="Event-image img-responsive" src="{{$event->img_path}}"/>
                        @endif
                    </div>
                    <div class="card-header">
                        <h3>{{$event->name}}</h3>
                    </div>
                    <div class="card-body Event-content">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-Overview" role="tabpanel" aria-labelledby="pills-Overview-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <p>Details</p>
                                    </div>
                                    <div class="card-body">
                                        <p>Start Date: {{$event->start_date->toFormattedDateString()}}</p>
                                        <p>Finish Date: {{$event->finish_date->toFormattedDateString()}}</p>
                                        <p>Location : {{$event->event_address}} </p>
                                        <p>Capacity : {{$event->capacity}} </p>
                                        <p>Bookings Per Person : {{$event->booking_per_person}} </p>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show " id="pills-Price" role="tabpanel" aria-labelledby="pills-Price-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <p>Event Price: £ {{$event->price}}</p>
                                    </div>

                                    <?php $value = $event->price;  $extras=0; ?>
                                    @isset($event->BookableExtras)
                                        <div class="card-body">
                                            <small>This event could have extras, added to it. This will affect the cost below is extra and the sum cost</small>
                                            <ul>
                                                @foreach($event->BookableExtras as $extra)
                                                    <li> <p>Name: {{$extra->name}},<small><i> with a cost of £ {{$extra->price}}</i></small></p></li>
                                                    <?php $value += $extra->price; $extras += $extra->price; ?>
                                                @endforeach
                                            </ul>
                                            <p>Extras Cost: £ {{$extras}}</p>
                                        </div>
                                    @endisset
                                    <div class="card-footer">
                                        <small>with one 'extra' per person, the sum would look like so. Use the book tool to get an individual qoute</small>
                                        <p>Total Cost: £ {{$value}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show " id="pills-Description" role="tabpanel" aria-labelledby="pills-Description-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <p>What's going on: </p>
                                    </div>
                                    <div class="card-body">
                                        <p>{{$event->description}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show " id="pills-Extras" role="tabpanel" aria-labelledby="pills-Extras-tab">
                                @include('eventsViews.partials.ShowExtras')
                            </div>

                            <div class="tab-pane fade show " id="pills-Book" role="tabpanel" aria-labelledby="pills-Book-tab">

                                @guest
                                    <p>Please sign in or register to book this event</p>
                                @endguest
                                @auth
                                    <form action="/Bookings" method="post">
                                        @csrf
                                        <div class="container-fluid booking-table">
                                            <input name="EventBooking_id" hidden value="{{$event->id}}">
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
                                                    {{$event->name}}
                                                </div>
                                                <div class="col-3">
                                                    <i {{$event->EventAvailability()}} ? class="dot Available" : class ="dot"></i>
                                                    @if($event->EventAvailability() === true) Available @else Not Available @endif
                                                </div>
                                                <div class="col-3">
                                                    {{$event->price}}
                                                </div>
                                                <div class="col-3">
                                                    @if($event->EventAvailability() === true)
                                                        <select id="Event_Qty" name="Event_Qty">
                                                            @for($A=0;$A<=$event->AvailableSpaces();$A++)
                                                                <option value={{$A}}>{{$A}}</option>
                                                            @endfor
                                                        </select>
                                                    @endif
                                                </div>

                                            </div>
                                            @include('eventsViews.partials.BookExtras')


                                        </div>
                                        <div class ="form-group">
                                            <button type="submit" disabled id="submit" class="btn btn-primary">Book</button>
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
