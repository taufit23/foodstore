@extends('private.layouts.master')
@section('title')
Profile Toko
@stop
@section('script')
<script
    src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB0x0DupHJiff3DNSOCvj5V8OhskOl091M&map_ids=cb0c7a54e27c02fc&callback=initMap">
</script>
<script defer>
    function initialize() {
        var mapOptions = {
            zoom: 12,
            minZoom: 6,
            maxZoom: 17,
            zoomControl: true,
            disableDefaultUI: true,
            center: new google.maps.LatLng(0.327322, 101.028960),
            scrollwheel: false,
            panControl: false,
            mapTypeControl: false,
            scaleControl: false,
            overviewMapControl: false,
            rotateControl: false
        }
        var infowindow = new google.maps.InfoWindow();
        var map = new google.maps.Map(document.getElementById('mapregister'), mapOptions);
        google.maps.event.addListener(map, 'click', function (event) {
            document.getElementById("maplatitude").value = event.latLng.lat();
            document.getElementById("maplongtitude").value = event.latLng.lng();
            placeMarker(event.latLng);
        });

        function placeMarker(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }
    }
</script>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
            <div class=" card card-outline card-primary">
                <div class="card-body">
                    <div class="mt-5 mb-5">
                        <form action="{{ route('profile.update', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="input-group mb-3">
                                <input value="{{ old('name', auth()->user()->name) }}" type="text" class="form-control"
                                    placeholder="Nama lengkap" name="name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input value="{{ old('email', auth()->user()->email) }}" type="email" class="form-control" placeholder="Email"
                                    name="email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input value="{{ old('no_hp', auth()->user()->no_hp) }}" type="text" class="form-control"
                                    placeholder="Nomor HP" name="no_hp">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('no_hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input value="{{ old('nama_usaha', auth()->user()->toko->nama_usaha) }}" type="text" class="form-control"
                                    placeholder="Nama usaha" name="nama_usaha">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('nama_usaha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input value="{{ old('alamat', auth()->user()->toko->alamat) }}" type="text" class="form-control"
                                    placeholder="Alamat usaha" name="alamat">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <label>Lokasi Map</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" readonly placeholder="Latitude"
                                            value="{{ old('latitude', $lokasi->latitude) }}" name="latitude" id="maplatitude">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" readonly placeholder="Longtitude"
                                            value="{{ old('longtitude', $lokasi->longitude) }}" name="longtitude" id="maplongtitude">
                                    </div>
                                </div>
                                <div id="mapregister"
                                    style="height: 200px; width: 100%; position: relative; overflow: hidden;">
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input value="{{ old('keterangan', auth()->user()->toko->Keterangan) }}" type="text" class="form-control"
                                placeholder="Keterangan" name="keterangan">
                                @error('keterangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="cover">Cover usaha</label>
                                        <img src="{{ asset(auth()->user()->toko->cover) }}" class="img img-bordered img-fluid">
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" id="cover" class="form-control-file" name="cover"
                                            title="gagag">

                                    </div>
                                    @error('cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <!-- /.col -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-sm">Update</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
