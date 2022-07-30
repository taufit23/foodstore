@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset($produk->cover_produk) }}" class="img-fluid" width="1000" alt="...">
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <h5 class="card-title">Nama Produk <code>{{ $produk->nama_produk }}</code></h5>
                            <p class="card-text">{{ $produk->deskripsi_produk }}</p>
                            <p class="card-text"><small class="text-muted">{{ $produk->toko->nama_usaha }}</small></p>
                            <a href="/toko/{{ $produk->toko->slug_usaha }}" class="btn btn-sm btn-primary">Lihat
                                toko</a>
                            <p class="card-text"><small class="text-muted">{{ $produk->created_at }}</small></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Gallery -->
                        <div class="row">
                            @foreach ($produk->image as $imagegal)
                            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                <img src="{{ asset($imagegal->url) }}" class="w-100 shadow-1-strong rounded mb-4"
                                    alt="Boat on Calm Water" />
                            </div>
                            @endforeach
                            <!-- Gallery -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection