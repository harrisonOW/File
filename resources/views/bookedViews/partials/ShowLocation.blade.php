@push('style')
    <style>
        .hideInput {
            display:none;
        }


    </style>

@endpush

<div class="form-group" >
    <label>Event Address <p id="Location">{{$booking->EventBooked->event_address}}</p></label>

    <div id='map' style='width: 400px; height: 300px;'></div>
    <pre id='info'></pre>
</div>

@push('script')

    <script>
        $(function() {


            mapboxgl.accessToken = 'pk.eyJ1IjoiaGFycmlzb24xMSIsImEiOiJjam83YWFueG4wcGJ0M3FvYWg5ZHEyNzVmIn0.bIXXZqofyRpzlG0ULOJNbA';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v9',
                center: [ {{$booking->EventBooked->long}},{{$booking->EventBooked->lat}}  ],
                zoom: 16
            });



            map.addControl(geocoder);

            map.addSource('point', {
                "type": "geojson",
                "data": pointOnCircle(0)
            });

            map.on('load', function() {

                map.addLayer({
                    "id": "Point",
                    "type": "circle",
                    "source": {
                        "type": "geojson",
                        "data": {
                            "type": "Point",
                            "geometry": {
                                    "type": "Point",
                                    "coordinates": [1,1 ]
                            }
                        }
                    },
                    "paint": {
                        "circle-radius": 10,
                        "circle-color": "#007cbf"
                    }
                });


            });


        });



    </script>

@endpush
