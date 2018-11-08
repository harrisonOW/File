
@forelse($event->BookableExtras as $indexKey => $extra)

<div class="row Extra-book">
    <input hidden name="EventExtraId[]" value="{{$extra->id}}">
    <div class="col-3">
        {{$extra->name}}
    </div>
    <div class="col-3">
        @if($extra->ExtraAvailability() === true)  <i class="dot Available" ></i> Available @else  <i class="dot" ></i> Not Available @endif


    </div>
    <div class="col-3">
        {{$extra->price}}
    </div>
    <div class="col-3">
        @if($event->EventAvailability() === true && $extra->ExtraAvailability() === true)
            @if($extra->optional == "Yes")
            <select name="Extra_Qty_[]" disabled>
                @for($b=0;$b<=$extra->AmountBookable();$b++)
                <option value="{{$b}}">{{$b}}</option>
                @endfor
            </select>
            @else
            <select disabled>
                <option value="{{$extra->AmountBookable()}}" >{{$extra->AmountBookable()}}</option>
            </select>
            @endif
        @endif
    </div>
</div>


@empty

@endforelse
