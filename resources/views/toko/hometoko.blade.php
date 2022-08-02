@extends('layouts.main')
@section('content')
<div class="content-wrapper" style="min-height: 1605.3px;">
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2">
                        <h3 class="d-inline-block d-sm-none">{{ $toko->nama_usaha }}</h3>
                        <div class="col-12">
                            <img src="{{ asset($toko->cover) }}" class="product-image w-100">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <h5 class="my-3">{{ $toko->nama_usaha }}</h5>
                        <p>{{ $toko->Keterangan }}
                        </p>
                        <hr>
                        <h5>Kategori tersedia</h5>
                        <div class="btn-group btn-group-toggle " data-toggle="buttons">
                            @foreach ($toko->kategori as $kategori)
                            <label class="btn btn-default text-center row">
                                <div class="col-md-12">
                                    <img src="{{ asset($kategori->cover_categori) }}" style="width: 80px; height: 80px;"
                                        class="">
                                </div>
                                <div class="col-md-12">
                                    <code>{{ $kategori->nama_kategori }}</code>
                                </div>
                            </label>
                            @endforeach
                        </div>
                        <hr>
                        <h5>Produk tersedia</h5>
                        @foreach ($toko->produk as $produk)
                        <a href="{{ route('detail.produk', $produk->slug_produk) }}" class="btn-group btn-group-toggle " data-toggle="buttons">
                            <label class="btn btn-default text-center row">
                                <div class="col-md-12">
                                    <img src="{{ asset($produk->cover_produk) }}" style="width: 80px; height: 80px;"
                                        class="">
                                </div>
                                <div class="col-md-12">
                                    <code>{{ $produk->nama_produk }}</code>
                                </div>
                            </label>
                        </a>
                        @endforeach
                    </div>
                    <div class="col-sm-5">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                    href="#product-desc" role="tab" aria-controls="product-desc"
                                    aria-selected="true">Komentar terbaru</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                                aria-labelledby="product-desc-tab">
                                @foreach ($komentars as $komen)
                                <div class="align-items-center">
                                    <div>
                                        <h6 class="fw-bold text-primary">{{ $komen->nama_costumer }}</h6>
                                        <p class="text-muted small">
                                            <code>
                                                {{ $komen->komentar }}
                                            </code>
                                            Comment on : {{ $komen->created_at->diffForHumans() }}
                                        </p>
                                    </div>

                                </div>
                                @endforeach
                                <form action="/toko/{{ $toko->id }}/postkoment" method="POST">
                                    @csrf
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
                                        <button type="submit" class="btn btn-primary btn-sm">Kirim
                                            komentar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content -->
<div></div>
</div>
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
                            @foreach ($komentars as $komen)
                            <div class="card-body">
                                <div class="align-items-center">
                                    <div>
                                        <h6 class="fw-bold text-primary">{{ $komen->nama_costumer }}</h6>
                                        <p class="text-muted small">
                                            Post date : {{ $komen->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                                <code>
                                    {{ $komen->komentar }}
                                </code>
                            </div>
                            @endforeach
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
                            <img src="{{ asset($item->cover_produk) }}" class="card-img img-fluid img-thumbnail"
                                alt="...">
                            <div class="card-img-overlay" style="width: 500px">
                                <h5 class="card-title">Nama Produk : {{ $item->nama_produk }}</h5>
                                <p class="card-text">Keterangan : {{ $item->deskripsi_produk }}</p>
                                <p class="card-text">Stok : {{ $item->qty }}</p>
                                <p class="card-text">Harga : {{ $item->harga }}</p>
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
