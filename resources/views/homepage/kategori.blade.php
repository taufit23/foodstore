@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach ($kategori as $kate)
        <div class="col-md-3">
            <div class="card text-bg-dark">
                <img src="{{ asset($kate->cover_categori) }}" class="card-img img-thumbnail">
                <div class="card-img-overlay">
                    <h5 class="card-title text-white">{{ $kate->nama_kategori }}</h5>
                    <a href="{{ route('databycategori', $kate->slug_kategori) }}" class="btn btn-sm btn-primary">Lihat produk</a>
                    <p class="card-text text-white">{{ $kate->created_at }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection