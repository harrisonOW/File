
@forelse($booking->EventBooked->BookableExtras as $extra)
    <div class="card">
        <div class="card-header">
            <p>Extra : {{$extra->name}}</p>
        </div>
        <div class="card-body">
            <p>Price: £ {{$extra->price}}</p>
            <p>Per Person: {{$extra->extras_per_person}}</p>
            <p>Optional: {{$extra->optional}}</p>
            <p>Description: {{$extra->description}}</p>
        </div>
    </div>
@empty
    <p>No Extras are include within this </p>
@endforelse

