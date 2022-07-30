@extends('private.layouts.master')
@section('title')
{{ $product->nama_produk }}
@endsection
@section('css')
<!-- Ekko Lightbox -->
<link rel="stylesheet" href="{{ asset('private/plugins/ekko-lightbox/ekko-lightbox.css') }}">
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Nama Produk : {{ $product->nama_produk }}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12">
                                <h4>Detail Produk</h4>
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img img-bordered-sm" src="{{ asset($product->cover_produk) }}"
                                            style="width: 200px; height: 200px" alt="user image">
                                        <span class="username">
                                            <a href="#">Deskripsi : </a>
                                        </span>
                                        <span class="description">{{ $product->deskripsi_produk }}</span>
                                        <span class="description">
                                            {{ $product->created_at->format('l jS \\of F Y h:i:s A') }} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Images {{ $product->nama_produk }}
                        </h3>
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($product->image as $image)
                                    <div class="col-sm-2">
                                        <a href="{{ asset($image->url) }}" data-toggle="lightbox"
                                            data-title="sample 1 - white" data-gallery="gallery">
                                            <img src="{{ asset($image->url) }}" class="img-fluid mb-2"
                                            alt="white sample" />
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="text-right mt-5 mb-3">
                            <a href="#" class="btn btn-sm btn-primary">Add files</a>
                            <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Ekko Lightbox -->
<script src="{{ asset('private/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
<script>
    $(function () {
        $(document).on('click', '[data-toggle="lightbox"]', function (event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        $('.filter-container').filterizr({
            gutterPixels: 3
        });
        $('.btn[data-filter]').on('click', function () {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    })
</script>
@stop
