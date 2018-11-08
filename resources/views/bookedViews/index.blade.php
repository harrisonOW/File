
        @extends('layouts.app')
        @section('header')
            @push('style')
                <style>
                    .switch {
                        position: relative;
                        display: inline-block;
                        width: 60px;
                        height: 34px;
                    }

                    .switch input {
                        opacity: 0;
                        width: 0;
                        height: 0;
                    }

                    .slider {
                        position: absolute;
                        cursor: pointer;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        background-color: #ccc;
                        -webkit-transition: .4s;
                        transition: .4s;
                    }

                    .slider:before {
                        position: absolute;
                        content: "";
                        height: 26px;
                        width: 26px;
                        left: 4px;
                        bottom: 4px;
                        background-color: white;
                        -webkit-transition: .4s;
                        transition: .4s;
                    }

                    input:checked + .slider {
                        background-color: #2196F3;
                    }

                    input:focus + .slider {
                        box-shadow: 0 0 1px #2196F3;
                    }

                    input:checked + .slider:before {
                        -webkit-transform: translateX(26px);
                        -ms-transform: translateX(26px);
                        transform: translateX(26px);
                    }

                    /* Rounded sliders */
                    .slider.round {
                        border-radius: 34px;
                    }

                    .slider.round:before {
                        border-radius: 50%;
                    }

                    /*Full Calendar Full */
                    .fc-ltr{
                        width:100%;
                    }

                    /*FUll Calendar List View Changes */
                    .fc-event-dot{
                        margin:8px;
                    }

                    .fc-scroller{

                        height:100% !important;
                    }

                    /* Remove that awful yellow color and border from today in Schedule */
                    .fc-state-highlight {
                        opacity: 0;
                        border: none;
                    }

                    /* Styling for each event from Schedule */
                    .fc-time-grid-event.fc-v-event.fc-event {
                        border-radius: 4px;
                        border: none;
                        padding: 5px;
                        opacity: .65;
                        left: 5% !important;
                        right: 5% !important;
                    }

                    /* Bolds the name of the event and inherits the font size */
                    .fc-event {
                        font-size: inherit !important;
                        font-weight: bold !important;
                    }

                    /* Remove the header border from Schedule */
                    .fc td, .fc th {
                        border-style: none !important;
                        border-width: 1px !important;
                        padding: 0 !important;
                        vertical-align: top !important;
                    }

                    /* Inherits background for each event from Schedule. */
                    .fc-event .fc-bg {
                        z-index: 1 !important;
                        background: inherit !important;
                        opacity: .25 !important;
                    }

                    /* Normal font weight for the time in each event */
                    .fc-time-grid-event .fc-time {
                        font-weight: normal !important;
                    }

                    /* Apply same opacity to all day events */
                    .fc-ltr .fc-h-event.fc-not-end, .fc-rtl .fc-h-event.fc-not-start {
                        opacity: .65 !important;
                        margin-left: 12px !important;
                        padding: 5px !important;
                    }

                    /* Apply same opacity to all day events */
                    .fc-day-grid-event.fc-h-event.fc-event.fc-not-start.fc-end {
                        opacity: .65 !important;
                        margin-left: 12px !important;
                        padding: 5px !important;
                    }

                    /* Material design button */
                    .fc-button {
                        display: inline-block;
                        position: relative;
                        cursor: pointer;
                        min-height: 36px;
                        min-width: 88px;
                        line-height: 36px;
                        vertical-align: middle;
                        -webkit-box-align: center;
                        -webkit-align-items: center;
                        align-items: center;
                        text-align: center;
                        border-radius: 2px;
                        box-sizing: border-box;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        user-select: none;
                        outline: none;
                        border: 0;
                        padding: 0 6px;
                        margin: 6px 8px;
                        letter-spacing: .01em;
                        background: transparent;
                        color: currentColor;
                        white-space: nowrap;
                        text-transform: uppercase;
                        font-weight: 500;
                        font-size: 14px;
                        font-style: inherit;
                        font-variant: inherit;
                        font-family: inherit;
                        text-decoration: none;
                        overflow: hidden;
                        -webkit-transition: box-shadow .4s cubic-bezier(.25,.8,.25,1),background-color .4s cubic-bezier(.25,.8,.25,1);
                        transition: box-shadow .4s cubic-bezier(.25,.8,.25,1),background-color .4s cubic-bezier(.25,.8,.25,1);
                    }

                    .fc-button:hover {
                        background-color: rgba(158,158,158,0.2);
                    }

                    .fc-button:focus, .fc-button:hover {
                        text-decoration: none;
                    }

                    /* The active button box is ugly so the active button will have the same appearance of the hover */
                    .fc-state-active {
                        background-color: rgba(158,158,158,0.2);
                    }

                    /* Not raised button */
                    .fc-state-default {
                        box-shadow: None;
                    }
                </style>
            @endpush
        @endsection

        @section('content')

            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <label>Swap between views..</label>
                        <label class="switch">
                            <input id="toggle-views" type="checkbox" data-toggle="toggle">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="row" id="Table">
                    <div class="table-responsive">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        <br>
                        <table class="table">
                            <thead  class="thead-light">
                            <tr>
                                <th>Find</th>
                                <th>Start</th>
                                <th>End Date</th>
                                <th>Event Name</th>
                                <th>Location</th>
                                <th>Quantity</th>
                                <th>Cost</th>
                            </tr>
                            </thead>
                            <tbody id="Events">
                            @foreach($events as $event)

                                    <tr>
                                        <td> <a href="/Bookings/{{$event->id}}"><i class="fas fa-search"></i></a></td>
                                        <td>{{$event->EventBooked->start_date->toFormattedDateString() }}</td>
                                        <td>{{$event->EventBooked->end_date->toFormattedDateString()}}</td>
                                        <td>{{$event->EventBooked->name}}</td>
                                        <td>{{$event->EventBooked->event_address}}</td>
                                        <td>{{$event->booking_quantity}}</td>
                                        <td>{{$event->total_cost}}</td>


                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="row" id="Calendar">

                        <label class="switch">
                            <input id="toggle-event" type="checkbox" data-toggle="toggle">
                            <span class="slider round"></span>
                        </label>

                        <div class="container Calendar_view hidden">
                            <div class="row">
                                <h3>Calendar</h3><br>
                            </div>
                            <div class="row">
                                <div id='CalendarView'></div>
                            </div>
                        </div>

                        <div class="container Inline_view">
                            <div class="row">
                                <h3>List</h3><br>
                            </div>
                            <div class="row">
                                <div id='ListView'></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>

            @push('script')
                <script>
                    $(function() {

                        $(document).ready(function(){
                            $("#myInput").on("keyup", function() {
                                var value = $(this).val().toLowerCase();
                                $("#Events tr").filter(function() {
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                            });
                        });

                        $('#ListView').fullCalendar({
                            defaultView: 'listWeek',
                            events : [
                                    @foreach($events as $event)
                                {

                                    title : '{{ $event->EventBooked->name }}',
                                    start : '{{ $event->EventBooked->start_date }}',
                                    end   : '{{ $event->EventBooked->end_date }}',
                                    textColor : 'white',
                                    url : ''
                                },
                                @endforeach
                            ]
                        });

                        $('#CalendarView').fullCalendar({
                            // put your options and callbacks here
                            events : [
                                    @foreach($events as $event)
                                {
                                    title : '{{ $event->EventBooked->name }}',
                                    start : '{{ $event->EventBooked->start_date }}',
                                    end   : '{{ $event->EventBooked->end_date }}',
                                    textColor : 'white',
                                    url : ''
                                },
                                @endforeach
                            ]
                        })
                        $('.Calendar_view').hide();
                        $('.Inline_view').show();
                        $('#Table').show();
                        $('#Calendar').hide();

                        $('#toggle-event').change(function() {
                            if($(this).prop('checked')){
                                $('.Calendar_view').show();
                                $('.Inline_view').hide();

                            }else{
                                $('.Inline_view').show();
                                $('.Calendar_view').hide();
                            }
                        })
                        $('#toggle-views').change(function() {
                            if($(this).prop('checked')){
                                $('#Table').show();
                                $('#Calendar').hide();

                            }else{
                                $('#Calendar').show();
                                $('#Table').hide();
                            }
                        })


                    })
                </script>
@endpush
@endsection
