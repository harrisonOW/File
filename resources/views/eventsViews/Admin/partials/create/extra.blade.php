@push('script')
<script>



</script>
@endpush
<div class="tab-pane fade " id="pills-Extra1" role="tabpanel" aria-labelledby="pills-Extra1-tab">
    <div class="card">
    <hr>
    <h1>Event Extra </h1>
    <hr>
    <div class="form-group">
         <a href="#delete_Extra" class="btn btn-danger deleteExtra"  id="delete_Extra">
             Delete
         </a>
    </div>
    <div class="form-group">
    <label for="InputExtraName">Event Extra Name:</label>
    <input type="text" class="form-control" id="InputExtraName" maxlength="35" aria-describedby="EventHelp" placeholder="Enter Extra Name"  name="Extra_Name[]" required="false">
    </div>

    <div class="form-group">
    <label for="InputExtraDescription">Event Extra Description:</label>
    <input type="text" class="form-control" id="InputExtraDescription" aria-describedby="EventHelp" placeholder="Enter a short description of the extra"  name="Extra_Description[]" required="false">
    </div>

    <div class="form-group">
    <label for="InputExtraPrice">Event Extra Price:</label>
    <div class="input-icon input-icon-left">
        <i>£</i>
    <input type="number" class="form-control" id="InputExtraPrice"  onkeydown="javascript: return event.keyCode == 69 ? false : true"  min="0.00" max="10000.00" step="0.01" aria-describedby="EventHelp" name="Extra_Price[]" placeholder="Enter the extras cost" required="false"/>

    </div>
    </div>

    <div class="form-group">
    <label for="InputExtraLink">Event Extra Link:</label>
    <input type="text" class="form-control" id="InputExtraLink" aria-describedby="EventHelp" placeholder="Hotel or Hire car, show your guests who its through"  name="Extra_Path[]" required="false">
    </div>

    <div class="form-group">
    <label for="InputExtra_AmountAvailable">Event Extra Availability:</label>
    <input type="number" min='1' class="form-control" id="InputExtra_AmountAvailable" aria-describedby="EventHelp" placeholder="How many are extras are available"  name="Extra_AmountAvailable[]" required="false">
    </div>


    <div class="form-group">
    <label for="InputExtra_PerPerson">Event Extra Per Person :</label>
    <input type="number" min='1' class="form-control" id="InputExtra_PerPerson" aria-describedby="EventHelp" placeholder="How many can one person book"  name="Extra_PerPerson[]" required="false">
    </div>



    <div class="form-group">
    <label for="InputEventOptional">Event Extra Optional:</label>
    Make me an optional extra<input type="checkbox" class="form-control" id="InputEventOptional"  name="Extra_Optional[]" value="No" checked>
    </div>

    </div>
</div>
