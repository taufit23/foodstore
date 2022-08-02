@extends('private.layouts.master')
@section('title')
Edit Produk
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('private/plugins/ekko-lightbox/ekko-lightbox.css') }}">
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content">
        <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Nama produk</label>
                    <input type="text" class="form-control" placeholder="Ext : Potatto rasa jagung" name="nama_produk"
                        value="{{ $product->nama_produk }}">
                    @error('nama_produk')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="custom-select form-control-border" name="kategori_id">
                        @if (Request::is('tokos/product*'))
                        @foreach ($kategory as $kate)
                        <option value="{{ $kate->id }}" {{ ($product->kategori_id == $kate->id) ? 'selected' : '' }}>
                            {{ $kate->nama_kategori }}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('kategori_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Deskripsi produk</label>
                    <input type="text" name="deskripsi_produk" class="form-control" value="{{ $product->deskripsi_produk }}">
                    @error('deskripsi_produk')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Stock produk & Harga product</label>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="number" class="form-control" placeholder="Ext : 1000" name="qty"
                                value="{{ $product->qty }}">
                            @error('qty')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="number" class="form-control" placeholder="ext : 25000" name="harga"
                                value="{{ $product->harga }}">
                            @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Cover product</label>
                    <div class="input-group">
                        <div class="col-md-4">
                            <img src="{{ asset($product->cover_produk) }}">
                        </div>
                        <div class="col-md-8">

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="cover_produk">
                                <label class="custom-file-label" for="inputcoverproduk">Choose file</label>
                            </div>
                        </div>
                        @error('cover_produk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-outline-light">Save changes</button>
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            </div>
        </form>
    </section>
</div>
@endsection
