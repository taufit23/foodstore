@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h3>Kategori {{ $produk->nama_kategori }}</h3>
    <div class="row">
        @foreach ($produk->produk as $prod)
        <div class="col-md-3">
            <div class="card text-bg-dark">
                <img src="{{ asset($prod->cover_produk) }}" class="card-img img-thumbnail">
                <div class="card-img-overlay">
                    <h5 class="card-title text-white">{{ $prod->nama_produk }}</h5>
                    <p>{{ $prod->deskripsi_produk }}</p>
                    <span>Stoct : {{ $prod->qty }}</span>
                    <a href="{{ route('detail.produk', $prod->slug_produk) }}" class="btn btn-sm btn-primary">Lihat detail</a>
                    <p class="card-text text-white">{{ $prod->created_at }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection