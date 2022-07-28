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
                        @if (session('errors'))
                        <div class="alert alert-danger"
                            style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; "
                            role="alert">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </div>
                        @endif
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
                        <div class="card-body table-responsive p-0 table-bordered" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Kategory</th>
                                        <th>Kategory Cover</th>
                                        <th>Lihat Poduk</th>
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
                                        <td class="text-center">
                                            <a href="/tokos/{{ $kategori->slug_kategori }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="card my-2">
                        @if (session('errors'))
                        <div class="alert alert-danger"
                            style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; "
                            role="alert">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </div>
                        @endif
                        <div class="card-header">
                            <h3 class="card-title">All Products</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                            data-target="#addproduct-modal">
                                            <i class="fas fa-plus"></i> Add Product
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0 table-bordered" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Kategory</th>
                                        <th>Kategory Cover</th>
                                        <th>Lihat Poduk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategory as $kate => $kategori)
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td>{{ $kategori->nama_kategori }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset($kategori->cover_categori) }}"
                                                class="img img-size-64 img-thumbnail" alt="">
                                        </td>
                                        <td class="text-center">
                                            <a href="/tokos/{{ $kategori->slug_kategori }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body">
                                        <td colspan="5">
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has
                                                been the industry's standard dummy text ever since the 1500s, when an
                                                unknown printer took
                                                a galley of type and scrambled it to make a type specimen book. It has
                                                survived not only
                                                five centuries, but also the leap into electronic typesetting, remaining
                                                essentially
                                                unchanged. It was popularised in the 1960s with the release of Letraset
                                                sheets containing
                                                Lorem Ipsum passages, and more recently with desktop publishing software
                                                like Aldus
                                                PageMaker including versions of Lorem Ipsum.
                                            </p>
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
