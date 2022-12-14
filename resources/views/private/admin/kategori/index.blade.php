@extends('private.layouts.master')
@section('title')
Product Toko
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Products By Category</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                            data-target="#addcategory-modal">
                                            <i class="fas fa-plus"></i> Add Category
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0 table-bordered" style="height: 100%;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Kategory</th>
                                        <th>Kategory Cover</th>
                                        <th>Total produk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategory as $kate => $kategori)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td>{{ $kategori->nama_kategori }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset($kategori->cover_categori) }}"
                                                class="img img-size-64 img-thumbnail" alt="">
                                        </td>
                                        <td>{{ $kategori->produk->count() }}</td>
                                        <td class="text-center">
                                            <a href="/admin/kategori/{{ $kategori->slug_kategori }}/edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('hapus.kategori', $kategori->id) }}" method="POST"
                                                id="from-delete"
                                                onclick="confirm('Menghapus kategori, juga akan mengkapus produk')">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="">
                                                    <i class="text-danger fas fa-trash-alt"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop

@section('modal')
@include('private.layouts._includes._Modals')
@endsection
