<div class="form-group">
    <label for="InputEventName">Event Name:</label>
    <input type="text" class="form-control" id="InputEventName" aria-describedby="EventHelp" placeholder="Enter Event" required name="EventName" value="{{old('EventName')}}">
</div>

<div class="form-group">
    <label for="InputEventExternalLink">External Link:</label>
    <input type="text" class="form-control" id="InputEventExternalLink" aria-describedby="EventHelp" placeholder="Enter where to book"  name="EventExternalLink">
    <small id="EventHelp" class="form-text text-muted">If you are using a third party booking application, use me to link the actual booking .</small>
</div>

<div class="form-group">
    <label for="InputEventDescription">Enter the events description:</label>
    <textarea class="form-control" id="InputEventDescription" name="EventDescription" rows="5" cols="100" ></textarea>
</div>

<div class="form-group">
    <label for="InputEventCapacity">Event Capacity:</label>
    <input type="number" min="1" class="form-control" id="InputEventCapacity" aria-describedby="EventHelp" placeholder="Enter Capacity" required name="EventCapacity" value="{{old('EventCapacity')}}">

</div>

<div class="form-group">
    <label for="InputEventBookingPerPerson">Event Bookings Per Person:</label>
    <input type="number" min="1" class="form-control" id="InputEventBookingPerPerson" aria-describedby="EventHelp" placeholder="Enter Bookings per person" required name="EventPerPerson" value="{{old('EventPerPerson')}}">

</div>

<div class="form-group">
    <label for="InputEventDescription">Enter the events price:</label>
    <div class="input-icon input-icon-left">
        <i>£</i>
        <input type="number" class="form-control" id="InputExtraPrice"  onkeydown="javascript: return event.keyCode == 69 ? false : true"  min="0.00" max="10000.00" step="0.01" aria-describedby="EventHelp" name="EventPrice" placeholder="Enter the event cost"/>

    </div>
    <small id="EventHelp" class="form-text text-muted">This will be excluding extras.</small>
</div>

<div class="form-group">
    <label for="InputEventImgPath">Event Image Path:</label>
    <input type="text" class="form-control" id="InputEventImgPath" aria-describedby="EventHelp" placeholder="Enter Img Path" required name="EventImg_path">
</div>


@include('eventsViews.Admin.partials.create.addressSearch')

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

<div class ="form-group">
    <label>Add An Event</label>
    <small id="EventHelp" class="form-text text-muted">If you have added a hotel or Transport to the price, use me to declare it.</small>
    <br>
    <div class="btn btn-primary" id="Add_Extra" >Add <i class="fas fa-plus"></i></div>
</div>
</div>
