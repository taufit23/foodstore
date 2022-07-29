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
                <div class="card mb-2">
                    <div class="card-body text-center">
                        <img src="{{ asset($toko->cover) }}" class="rounded-circle img-fluid">
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
                                        <i class="fa-brands fa-whatsapp fa-3x text-success"></i><span class="h3"> Chat
                                            Toko</span></a>
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
            <div class="col-lg-6">
                <nav aria-label="breadcrumb" class="bg-light">
                    <h6 class="text-center">Komentar</h6>
                </nav>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            @foreach ($toko->komentar as $komen)
                            <div class="card-body">
                                <div class="d-flex flex-start align-items-center">
                                    <div>
                                        <h6 class="fw-bold text-primary">{{ $komen->nama_costumer }}</h6>
                                        <p class="text-muted small">
                                            {{-- Post date : {{ $komen->created_at->isoFormat('dddd D') }} --}}
                                        </p>
                                    </div>
                                </div>

                                <p class="">
                                    {{ $komen->komentar }}
                                </p>
                            </div>
                            @endforeach
                            @if (session('errors'))
                            <div class="alert alert-danger"
                                style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; "
                                role="alert">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </div>
                            @endif
                            <form action="/toko/{{ $toko->id }}/postkoment" method="POST">
                                @csrf
                                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                    <div class="d-flex flex-start w-100">
                                        <div class="from-outline w-100">
                                            <input type="text" name="nama_costumer" class="form-control"
                                                placeholder="Nama anda">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-start w-100">
                                        <div class="form-outline w-100">
                                            <textarea class="form-control" id="textAreaExample" rows="4"
                                                style="background: #fff;" placeholder="Komentar anda"
                                                name="komentar"></textarea>
                                        </div>
                                    </div>
                                    <div class="float-end mt-2 pt-1">
                                        <button type="submit" class="btn btn-primary btn-sm">Kirim komentar</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <nav aria-label="breadcrumb" class="bg-light">
                    <h6 class="text-center">Produk</h6>
                </nav>
                <div class="row">
                    @foreach ($toko->produk as $item)
                    <div class="col-md-4">
                        <div class="card px-1 py-1">
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
