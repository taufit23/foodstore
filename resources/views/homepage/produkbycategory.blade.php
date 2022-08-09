@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h3>Produk dengan Kategori <code>{{ $produk->nama_kategori }}</code></h3>
    <div class="row">
        @foreach ($produk->produk as $prod)
        <div class="col-md-3">
            <div class="card text-white bg-dark">
                <img src="{{ asset($prod->cover_produk) }}" class="card-img img-thumbnail" style="height: 250px">
                <div class="card-footer">
                    <h5 class="card-title text-white">{{ $prod->nama_produk }}</h5>
                    <p>{{ $prod->deskripsi_produk }}</p>
                    <span>Stoct : {{ $prod->qty }}</span>
                    <a href="{{ route('detail.produk', $prod->slug_produk) }}" class="btn btn-sm btn-primary">Lihat detail</a>
                    <p class="card-text text-white">{{ $prod->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <hr>
    <h3>toko yang menjual produk dengan Kategori <code>{{ $produk->nama_kategori }}</code></h3>
    {{-- <div class="row">
        @foreach ($tokos->toko as $toke)
        <div class="col-md-3">
            <div class="card text-white bg-dark">
                <img src="{{ asset($toke->cover_produk) }}" class="card-img img-thumbnail" style="height: 250px">
                <div class="card-footer">
                    <h5 class="card-title text-white">{{ $toke->nama_produk }}</h5>
                    <p>{{ $toke->deskripsi_produk }}</p>
                    <span>Stoct : {{ $toke->qty }}</span>
                    <a href="{{ route('detail.produk', $toke->slug_produk) }}" class="btn btn-sm btn-primary">Lihat detail</a>
                    <p class="card-text text-white">{{ $toke->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div> --}}
</div>

@endsection
