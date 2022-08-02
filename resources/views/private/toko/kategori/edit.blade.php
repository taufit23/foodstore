@extends('private.layouts.master')
@section('title')
Product Toko
@endsection
@section('content')
<div class="content-wrapper">
    <form method="POST" action="{{ route('update.kategori', $kategori->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Nama kategori</label>
                <input type="text" class="form-control" placeholder="Ext : Snack Pedas" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
                @error('nama_kategori')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Cover kategori</label>
                <div class="input-group">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset($kategori->cover_categori) }}" class="img img-fluid img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <input type="file" class="form-control" name="cover_kategori">
                        </div>
                    </div>
                    @error('cover_kategori')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-outline-light">Save changes</button>
            <a  href="{{ route('kategori.index') }}" class="btn btn-outline-light">Back</a>
        </div>
    </form>
</div>
@endsection
