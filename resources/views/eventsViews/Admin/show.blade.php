@extends('layouts.app')

@section('header')
    <h1>
        View Event
        <small>View an Event.</small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box">
                <div class="box-header with-border">
                    View Event
                </div>

                <div class="box-body">
                    <table class="table">
                        <thead>
                            <a href='/admin/Event/edit/{{$event->id}}' class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="#" class="btn btn-xs btn-danger deletebutton" data-url='/admin/Event/destroy/{{$event->id}}'><i class="fa fa-trash"></i> Delete</a>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Event</th>
                                <td>{{ $event->name }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $event->description }}</td>
                            </tr>
                            <tr>
                                <th>Cost</th>
                                <td>{{ $event->price }}</td>
                            </tr>
                            <tr>
                                <th>Event Bookings Per Person</th>
                                <td>{{ $event->booking_per_person }}</td>
                            </tr>
                            <tr>
                                <th>Event Capacity</th>
                                <td>{{ $event->capacity }}</td>
                            </tr>
                            <tr>
                                <th>Event Start Date</th>
                                <td>{{ $event->start_date->toDayDateTimeString() }}</td>
                            </tr>
                            <tr>
                                <th>Event Finish Date</th>
                                <td>{{ $event->end_date->toDayDateTimeString() }}</td>
                            </tr>
                            @isset($event->external_link)
                                <tr>
                                    <th>External Link</th>
                                    <td>{{ $event->external_link}}</td>
                                </tr>
                            @endisset

                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>

                    <table class="table">
                        <thead>
                        <th>Event Extras</th>

                        </thead>
                        <tbody>
                            @forelse ($event->BookableExtras as $extra)
                                <tr>
                                    <th>{{$extra->name}}</th>
                                    <td>Brief: {{$extra->description}}</td>
                                    <td>Cost: {{$extra->price}}</td>
                                    <td>Booked From: {{$extra->external_path}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <th>None Set</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
