@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="/Event" method="POST">
                @csrf
                <div class="form-group">
                    <label for="InputEventName">Event Name:</label>
                    <input type="text" class="form-control" id="InputEventName" aria-describedby="EventHelp" placeholder="Enter Event" required name="EventName">
                    <small id="EventHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="InputEventDescription">Enter the events description:</label>
                    <textarea class="form-control" id="InputEventDescription" name="EventDescription" rows="3" cols="100" ></textarea>
                </div>
                <div class="form-group">
                    <label for="InputEventImgPath">Event Image Path:</label>
                    <input type="text" class="form-control" id="InputEventImgPath" aria-describedby="EventHelp" placeholder="Enter Img Path" required name="EventImg_path">
                </div>
                <div class="form-group">
                        <label>Start Date</label>
                        <div class="input-group date" id="InputStartDate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#InputStartDate" name="EventStartDate"/>
                            <div class="input-group-append" data-target="#InputStartDate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                </div>
                <div class="form-group">
                        <label>End Date</label>
                        <div class="input-group date" id="InputEndDate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#InputEndDate" name="EventEndDate"/>
                            <div class="input-group-append" data-target="#InputEndDate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="row">
            @if(count($errors))
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li> {{$error}}  </li>
                    @endforeach
                    <ul>
            @endif
    </div>


    @push('script')
    <script>
        $( function() {
            console.log(">>>>");
            $('#InputStartDate').datetimepicker({
                icons: {
                    time: "far fa-clock",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
                inline: true,
                sideBySide: true,

            });
            $('#InputEndDate').datetimepicker({
                useCurrent: false,
                icons: {
                    time: "far fa-clock",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
                inline: true,
                sideBySide: true
            });


            $("#InputStartDate").on("change.datetimepicker", function (e) {
                $('#InputEndDate').datetimepicker('minDate', e.date);
            });
            $("#InputEndDate").on("change.datetimepicker", function (e) {
                $('#InputStartDate').datetimepicker('maxDate', e.date);
            });


        });
    </script>
    @endpush
@endsection
