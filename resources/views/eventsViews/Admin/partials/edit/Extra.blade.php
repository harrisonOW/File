@push('script')
    <script>



    </script>
@endpush
<div class="tab-pane fade " id="pills-{{$extra->id}}" role="tabpanel" aria-labelledby="pills-{{$extra->id}}-tab">
    <input class="card">
        <hr>
        <h1>Event Extra </h1>
        <hr>

        <div class="form-group">
            <a href="#delete_Existing_Extra" class="btn btn-danger deleteExtra"  id="delete_Extra">
                Delete
            </a>
        </div>

        <input style="display:none;" name="Extra_id_for[]" value="{{$extra->id}}"/>

        <div class="form-group">
            <label for="InputExtraName">Event Extra Name:</label>
            <input type="text" class="form-control" id="ExistingExtra_Name{{$extra->id}}" maxlength="35" aria-describedby="EventHelp" placeholder="Enter Extra Name"  name="ExistingExtra_Name[]" required="false" value="{{$extra->name}}">


        </div>

        <div class="form-group">
            <label for="InputExtraDescription">Event Extra Description:</label>
            <input type="text" class="form-control" id="ExistingExtra_Description{{$extra->id}}" aria-describedby="EventHelp" placeholder="Enter a short description of the extra"  name="ExistingExtra_Description[]" required="false" value="{{$extra->description}}">
        </div>

        <div class="form-group">
            <label for="InputExtraPrice">Event Extra Price:</label>
            <div class="input-icon input-icon-left">
                <i>£</i>
                <input type="number" class="form-control" id="ExistingExtra_Price{{$extra->id}}"  onkeydown="javascript: return event.keyCode == 69 ? false : true"  min="0.00" max="10000.00" step="0.01" aria-describedby="EventHelp" name="ExistingExtra_Price[]" placeholder="Enter the extras cost" required="false" value="{{$extra->price}}"/>

            </div>
        </div>


        <div class="form-group">
            <label for="InputExtraLink">Event Extra Link:</label>
            <input type="text" class="form-control" id="ExistingExtra_Link{{$extra->id}}" aria-describedby="EventHelp" placeholder="Hotel or Hire car, show your guests who its through"  name="ExistingExtra_Path[]" value="{{$extra->external_path}}" required="false">
        </div>

        <div class="form-group">
            <label for="InputExtra_AmountAvailable">Event Extra Availability:</label>
            <input type="number" min='1' class="form-control" id="ExistingExtra_AmountAvailable{{$extra->id}}" aria-describedby="EventHelp" placeholder="How many are extras are available"  name="ExistingExtra_AmountAvailable[]" value="{{$extra->amount_available}}" required="false">
        </div>


        <div class="form-group">
            <label for="InputExtra_PerPerson">Event Extra Per Person :</label>
            <input type="number" min='1' class="form-control" id="ExistingExtra_PerPerson{{$extra->id}}" aria-describedby="EventHelp" placeholder="How many can one person book"  name="ExistingExtra_PerPerson[]" value="{{$extra->extras_per_person}}" required="false">
        </div>



        {{--<div class="form-group">--}}
            {{--<label for="InputEventOptional">Event Extra Optional:</label>--}}
            {{--Currently optional:  {{$extra->optional}}--}}
            {{--<input type="radio" class="form-control" id="ExistingExtra_Optional{{$extra->id}}"  name="ExistingExtra_Optional[]"  value="{{$extra->optional}}"  >--}}
            {{--<input type="radio" class="form-control" id="ExistingExtra_Optional{{$extra->id}}"  name="ExistingExtra_Optional[]"  value="{{$extra->optional}}"  >--}}
        {{--</div>--}}

    </div>


@push('script')
    <script>
        // var search = $("input[name^='Extra_id_for']");
        // var ExistingExtras = [];
        // var foundExtras = $.map(search, function(x, y) {
        //     return {
        //         Key: x.name,
        //         Value: $(x).val()
        //     };
        // });
        //
        // foundExtras.forEach(function(ExtraObj) {
        //     var find = ExtraObj["Value"];
        //     var check = $("input[id*='ExistingExtra'][name$="+find+"]");
        //     var obj = $.map(check, function(x, y) {
        //         return {
        //             Key: x.name,
        //             Value: $(x).val()
        //         };
        //     });
        //
        //     ExistingExtras.push(obj);
        // });




    </script>

@endpush
