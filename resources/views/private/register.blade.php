<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pendaftaran Seller</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('private/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{ asset('private/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('private/dist/css/adminlte.min.css') }}">
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
    </head>

    <body class="hold-transition register-page" onload="initialize()"">
        <div class=" card card-outline card-primary">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('register') }}" class="h1">Daftar seller</a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('index') }}" class="btn btn-sm btn-default">Kembali ke Home</a>
                </div>
            </div>
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input value="{{ old('name') }}" type="text" class="form-control" placeholder="Nama lengkap"
                        name="name">
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
                    <input value="{{ old('email') }}" type="email" class="form-control" placeholder="Email"
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
                    <input value="{{ old('no_hp') }}" type="text" class="form-control" placeholder="Nomor HP, Extample : 622287553138"
                        name="no_hp">
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
                    <input value="{{ old('nama_usaha') }}" type="text" class="form-control" placeholder="Nama usaha"
                        name="nama_usaha">
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
                    <input value="{{ old('alamat') }}" type="text" class="form-control" placeholder="Alamat usaha"
                        name="alamat">
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
                                value="{{ old('latitude') }}" name="latitude" id="maplatitude">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" readonly placeholder="Longtitude"
                                value="{{ old('longtitude') }}" name="longtitude" id="maplongtitude">
                        </div>
                    </div>
                    <div id="mapregister" style="height: 200px; width: 100%; position: relative; overflow: hidden;">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <textarea name="keterangan" cols="10" rows="2" class="form-control"
                        placeholder="Keterangan usaha">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Retype password"
                        name="password_confirmation">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="cover">Cover usaha</label>
                        </div>
                        <div class="col-md-8">
                            <input type="file" id="cover" class="form-control-file" name="cover" title="gagag">

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
                        <button type="submit" class="btn btn-primary btn-block btn-sm">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <div class="row mt-2">
                <div class="col-md-6">
                    <a href="{{ route('index') }}" class="text-center btn btn-sm btn-default">Kembali ke Home</a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('login') }}" class="text-center">Sudah memiliki akun?, Login</a>
                </div>
            </div>
        </div>
        <!-- /.form-box -->
        </div><!-- /.card -->

        <!-- jQuery -->
        <script src="{{ asset('private/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('private/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('private/dist/js/adminlte.min.js') }}"></script>
    </body>

</html>
