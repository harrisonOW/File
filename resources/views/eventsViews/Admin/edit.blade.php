
@extends('layouts.app')


@section('header')
    <h1>
        Edit Event
        <small>Edit {{$event->name}}</small>
    </h1>
    @if($event->BookingsMade()->count() > 0)
        <div class ="alert-danger">
            <p>This event has people booked on already, are you sure you want to make changes? if so, please ensure that they are contacted regarding changes</p>
        </div>
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">



                <div class="box">
                    <div class="box-header with-border">
                        Edit Event

                    </div>

                    <div class="box-body">
                        @include('eventsViews.Admin.partials.edit.form')

                    </div>
                </div>
        </div>
    </div>
@endsection
