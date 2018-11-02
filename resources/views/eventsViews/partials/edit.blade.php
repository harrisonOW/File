
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="" method="">
                @csrf
                dd($event);
                <div class="form-group">
                    <label for="InputEventName">Event Name:</label>
                    <input type="text" class="form-control" id="InputEventName" aria-describedby="EventHelp" placeholder="Enter Event" required name="EventName" value="">
                    <small id="EventHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="InputEventDescription">Enter the events description:</label>
                    <textarea class="form-control" id="InputEventDescription" name="EventDescription" rows="3" cols="30" required></textarea>
                </div>
                <div class="form-group">
                    <label for="InputStartDate">Start Date: </label>
                    <input type="text" name="EventStart_date" id="startDatePicker" class="datepicker form-control" value="" required>
                </div>
                <div class="form-group">
                    <label for="InputFinishDate">End Date:</label>
                    <input type="text" name="EventFinish_date" id="endDatePicker" class="datepicker form-control" value="" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


    @push('script')
        <script>
            $( function() {
                console.log(">>>>");

                $("#startDatePicker").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    minDate: new Date(),
                    maxDate: '+2y',
                    onSelect: function(date){

                        var selectedDate = new Date(date);
                        var msecsInADay = 86400000;
                        var endDate = new Date(selectedDate.getTime() + msecsInADay);

                        //Set Minimum Date of EndDatePicker After Selected Date of StartDatePicker
                        $("#endDatePicker").datepicker( "option", "minDate", endDate );
                        $("#endDatePicker").datepicker( "option", "maxDate", '+2y' );

                    }
                });

                $("#endDatePicker").datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true
                });

            });
        </script>
    @endpush
@endsection
