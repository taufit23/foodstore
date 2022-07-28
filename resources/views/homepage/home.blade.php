@extends('layouts.main')
@section('script')
<script
    src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB0x0DupHJiff3DNSOCvj5V8OhskOl091M&map_ids=cb0c7a54e27c02fc&callback=initMap">
</script>
<script defer>
    function initialize() {
        var avglat = @json($avaragelatitude);
        var avglog = @json($avaragelongitude);
        var mapOptions = {
            zoom: 12,
            minZoom: 6,
            maxZoom: 17,
            zoomControl: true,
            disableDefaultUI: true,
            center: new google.maps.LatLng(avglat, avglog),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scrollwheel: false,
            panControl: false,
            mapTypeControl: false,
            scaleControl: false,
            overviewMapControl: false,
            rotateControl: false
        }
        var infowindow = new google.maps.InfoWindow();
        
        var places = @json($data_lokasi);
        var assetssdss = '{{ URL::asset('') }}';
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        // marker = new google.maps.Marker({
        //         position: new google.maps.LatLng(places[0].lokasi.latitude, places[0].lokasi.longitude),
        //         // position: new google.maps.LatLng(0.33248575404354663, 101.0307303848581),
        //         icon: image,
        //         map: map,
        //     });
        for (i = 0; i < places.length; i++) {
            var image = new google.maps.MarkerImage( assetssdss + places[0+i].cover, null, null, null, new google.maps
            .Size(20, 20));
            const contentString = `

            <div class="card" style="width: 18rem;">
                <img src="` + places[0+i].cover + `" class="rounded mx-auto d-block card-img-top" style="height: 18em;">
                <div class="card-body">
                    <p class="card-text">`+places[0+i].nama_usaha+`</p>
                    <a href="toko/`+places[0+1].slug_usaha+`" class="card-link">Lihat detail</a>
                </div>
                </div>
            `;
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(places[0+i].lokasi.latitude, places[0+i].lokasi.longitude),
                icon: image,
                map: map,
            });
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(contentString);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }
    google.maps.event.addDomListener(window, 'load', initialize)
</script>
<script src="{{ mix('js/app.js') }}"></script>
@endsection
@section('content')
<!--menampilkan div untuk menampilkan peta-->

<div class="card">

</div>
<div class="row justify-content-center" onload="initialize()">
    <div id="map-canvas" style="height: 500px; width: 100%; position: relative; overflow: hidden;"></div>
</div>



@endsection
