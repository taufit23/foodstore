@extends('private.layouts.master')
@section('title')
Dashboard Admin
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sellers Data</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama</th>
                                <th>Nama toko</th>
                                <th>Total produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sellers as $no => $seller)

                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $seller->name }}</td>
                                <td>{{ $seller->toko->nama_usaha }}</td>
                                <td class="text-center"><span class="badge {{ ($seller->produk->count() < 10 ? 'bg-danger' : 'bg-success') }}">{{ $seller->produk->count() }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
