@push('style')
    <style>
        .hideInput {
            display:none;
        }


    </style>

@endpush

<div class="form-group" >
    <label >Event Address: <p id="Location">{{$event->event_address}}</p></label>
    <div class="Options">
        <label id="Location"></label>

        <input class="hideInput" name="Event_address" value="{{$event->event_address}}">
        <input class="hideInput" name="Event_lat" value="{{$event->long}}">
        <input class="hideInput" name="Event_long" value="{{$event->lat}}">
    </div>
    <div id='map' style='width: 400px; height: 300px;'></div>
    <pre id='info'></pre>
</div>

@push('script')

    <script>
        $(function() {
            console.log();
            mapboxgl.accessToken = 'pk.eyJ1IjoiaGFycmlzb24xMSIsImEiOiJjam83YWFueG4wcGJ0M3FvYWg5ZHEyNzVmIn0.bIXXZqofyRpzlG0ULOJNbA';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v9',
                center: [ {{$event->long}},{{$event->lat}}  ],
                zoom: 14
            });


            var geocoder = new MapboxGeocoder({
                accessToken: mapboxgl.accessToken
            });
            map.addControl(geocoder);
            map.on('load', function() {
                map.addSource('single-point', {
                    "type": "geojson",
                    "data": {
                        "type": "FeatureCollection",
                        "features": []
                    }
                });

                map.addLayer({
                    "id": "point",
                    "source": "single-point",
                    "type": "circle",
                    "paint": {
                        "circle-radius": 10,
                        "circle-color": "#007cbf"
                    }
                });

                geocoder.on('result', function(ev) {
                    map.getSource('single-point').setData(ev.result.geometry);
                    console.log(ev.result)
                    $('#Location').html(ev.result.place_name)
                    console.log(ev.result.geometry.coordinates[0])
                    $("input[name='Event_address']").val(ev.result.place_name);
                    $("input[name='Event_lat']").val(ev.result.geometry.coordinates[1]);
                    $("input[name='Event_long']").val(ev.result.geometry.coordinates[0]);
                });
            });


        });


    </script>

@endpush
