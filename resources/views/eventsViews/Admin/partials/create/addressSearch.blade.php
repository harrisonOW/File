@push('style')
<style>
    .hideInput {
        display:none;
    }


</style>

@endpush

<div class="form-group" >
    <label>Event Address</label>
    <div class="Options">
        <label id="Location"></label>

        <input class="hideInput" name="Event_address" value="">
        <input class="hideInput" name="Event_lat" value="">
        <input class="hideInput" name="Event_long" value="">
    </div>
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
            center: [ -0.7091,51.9165  ],
            zoom: 9
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
    // var Set_Values =['_type','house_number','road','city','postcode','country','country','state']
    // function SetifSet(Found,index){
    //     $('#'+index+'').html(Found[index]);
    //
    // }
    // function DirectSearch(Shown_Address){
    //     var url = "https://api.opencagedata.com/geocode/v1/json?q="+Shown_Address["lat"]+"+"+Shown_Address["lng"]+"&key=033c9312b5b3487aa3637cf0b6ca4bcf";
    //     var xhttp = new XMLHttpRequest();
    //     xhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {
    //             var data=this.responseText;
    //             var jsonResponse = JSON.parse(data);
    //             var Found = jsonResponse["results"][0]["components"]
    //             Set_Values.forEach(function(index){
    //                 SetifSet(Found,index)
    //                  L.map('mapid').setView([Shown_Address["lat"], Shown_Address["lng"]], 13);
    //             })
    //
    //
    //         }
    //     };
    //     xhttp.open("GET", url, true);
    //     xhttp.send();
    // }
    //
    //
    //
    //
    // $("input[name='findaddress").change(function(){
    //     sereachtext =  $("input[name='findaddress").val();
    //
    //     var url = "https://api.opencagedata.com/geocode/v1/json?q="+sereachtext+"&key=033c9312b5b3487aa3637cf0b6ca4bcf";
    //     var xhttp = new XMLHttpRequest();
    //     xhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {
    //             var data=this.responseText;
    //             var jsonResponse = JSON.parse(data);
    //             var Shown_Address = jsonResponse["results"][0]["geometry"];
    //             DirectSearch(Shown_Address)
    //         }
    //     };
    //
    //     xhttp.open("GET", url, true);
    //     xhttp.send();
    // })



</script>

@endpush
