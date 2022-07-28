@extends('layouts.main')
@section('content')
<section style="background-color: #eee;">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light">
                    <h6 class="text-center">{{ $toko->nama_usaha }}</h6>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{ asset($toko->cover) }}" alt="avatar" class="rounded-circle img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Deskripsi toko</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $toko->Keterangan }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Kontak toko</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <p class="text-muted mb-0">{{ $user_toko->no_hp }}</p>
                                    <a href="https://wa.me/{{ $user_toko->no_hp }}" class="btn btn-sm">
                                        <i class="fa-brands fa-whatsapp fa-3x text-success"></i><span class="h3"> Chat Toko</span></a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Alamat toko</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $toko->alamat }}</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <nav aria-label="breadcrumb" class="bg-light">
                    <h6 class="text-center">Produk</h6>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="row">
                    @foreach ($toko->produk as $item)
                    <div class="col-md-4">
                        <div class="card bg-dark px-1 py-1">
                            <img src="{{ $item->cover_produk }}" class="card-img img-fluid img-thumbnail" alt="...">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Nama Produk : {{ $item->nama_produk }}</h5>
                                <p class="card-text">Keterangan : {{ $item->deskripsi_produk }}</p>
                                <p class="card-text">Stok : {{ $item->qty }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
@endsection