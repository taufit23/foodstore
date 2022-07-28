<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <title>Kuliner Kampar</title>
        <script
            src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCwRIkER8J_i6M97yuDJVQAr5I54ios1uY&callback=initMap">
        </script>
        <script>
            //qjuery
            function initialize() {
                var map;
                // menambahkan properti peta
                var properti_peta = {
                    center: new google.maps.LatLng([0.346230, 101.118919], [0.245990, 101.259142]),
                    zoom: 12,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                // membuat object peta
                var peta = new google.maps.Map(document.getElementById("map"), properti_peta);
            }

            // menampilkan peta
            google.maps.event.addDomListener(window, 'load', initialize);


            // fungsi untuk menampilkan data marker
            function findLokasi() {
                $ajax({
                    type: "GET",
                    url: "{{ route('tampildata')  }}",
                    dataType: "json",
                    success: function (data) {
                        var d = new google.maps.InfoWindow();
                        var e;

                        $.each(data, function (i, b) {
                            // membuat marker
                            e = new google.maps.Marker({
                                position: new google.maps.LatLng(b.latitude, b.longitude),
                                map: peta
                            });
                            // event saat marker diklik
                            google.maps.event.addListener(e, 'click', (function (a, i) {
                                retrun
                                function () {
                                    //tampilkan info window di atas marker
                                    d.setContent('<div> + b.nama_usaha+</div>');
                                    d.open(peta, a)
                                }
                            })(e, i))
                        });
                    }
                });
            }

            //panggil function findLokasi
            $(function () {
                findLokasi();
            });
        </script>
    </head>

    <body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">

        @include('partials.navbar')

        @yield('content')

        @include('partials.footer')
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>

        <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
    </body>

</html>
