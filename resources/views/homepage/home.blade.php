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
        var assetssdss = '{{URL::asset('')}}';
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        for (i = 0; i < places.length; i++) {
            var image = new google.maps.MarkerImage(assetssdss + places[0 + i].cover, null, null, null, new google.maps
                .Size(20, 20));
            const slugggt = places[0 + i].slug_usaha;
            const contentString = `
                <div class="card" style="width: 18rem;">
                <img src="` + places[0 + i].cover + `" class="rounded mx-auto d-block card-img-top" style="height: 18em;">
                <div class="card-body">
                    <p class="card-text">` + places[0 + i].nama_usaha + `</p>
                    <a href="toko/` + slugggt + `" target="_blank" class="card-link">Lihat toko</a>
                </div>
                </div>
            `;
            // places[0+1] . slug_usaha
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(places[0 + i].lokasi.latitude, places[0 + i].lokasi.longitude),
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

<div class="row justify-content-center" onload="initialize()">
    <header class="masthead mb-3">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <h1 class="mb-1 text-dark">About</h1>
                        <code>Kuliner kampar</code>
                        <blockquote class="blockquote-footer bg-light">
                            <p>Website ini menyediakan informasi mengenai lokasi dan toko kuliner khas Kampar. Toko-toko
                                yang ada di website ini menjual kuliner khas Kampar seperti ikan kopiek, kue jalo,
                                kerupuk lomang, serundeng, kuabu, dll. Di website ini para penjual kuliner khas Kampar
                                dapat mendaftarkan tokonya dan juga mengelolanya. Untuk pengunjung selain melihat lokasi
                                penjualan kuliner khas Kampar, pengunjung dapat memesan langsung ke penjual dengan
                                mengklik logo WhatsApp yang akan diteruskan ke WhatsApp penjual. Jika ada kendala atau
                                ingin menanyakan sesuatu, bisa telpon admin ke no 082287553138</p>
                        </blockquote>
                        <form action="{{ route('index.search') }}" method="get">
                            @csrf
                            <div class="input-group">
                                <input type="search" class="form-control rounded" placeholder="Pencarian produk"
                                    aria-label="Search" aria-describedby="search-addon" name="q" />
                                <button type="submit" class="btn btn-outline-primary">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <h1 class="mb-1 text-dark">Data toko berdasarkan lokasi</h1>
    <div id="map-canvas" style="height: 500px; width: 100%; position: relative; overflow: hidden;">

    </div>
</div>

    @endsection
