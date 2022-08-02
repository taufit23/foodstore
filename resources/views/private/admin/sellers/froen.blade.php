@extends('private.layouts.master')
@section('title')
Sellers
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-2">
                        <div class="card-header">
                            <h3 class="card-title">Valid Users</h3>
                            <code>. Click baris untuk lihat detail</code>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0 table-bordered" style="height: 100%">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Nama seller</th>
                                    <th>Nama usaha</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sellers as $key => $seller)
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $seller->name }}</td>
                                    <td>{{ $seller->toko->nama_usaha }}</td>
                                    <td>
                                        <div class="row justify-content-center">
                                            <form class="mx-1" action="{{ route('sellers.makevalid', $seller->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">Make Valid</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="expandable-body">
                                    <td colspan="4">
                                        <div class="container-fluid">
                                            <dl class="row">
                                                <div class="col-sm-2">
                                                    <div class="row">
                                                        <img src="{{ asset($seller->toko->cover) }}"
                                                            class="img img-thumbnail" style="width: 180px">
                                                    </div>
                                                    <div class="row">
                                                        <code> Cover toko</code>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="col-md-12">Email: <code>{{ $seller->email }}</code>
                                                    </div>
                                                    <div class="col-md-12">No Hp : <code>{{ $seller->no_hp }}</code>
                                                    </div>
                                                    @if ($seller->status == 1)
                                                    <div class="col-md-12">Total Produk :
                                                        <code>{{ $seller->produk->count() }}</code></div>
                                                    @endif
                                                </div>
                                                @if ($seller->toko->produk->count() > 0)
                                                <div class="col-sm-5">
                                                    <h4>List Product</h4>
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nama produk</th>
                                                                <th>price</th>
                                                                <th>qty</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($seller->toko->produk as $key => $produk)
                                                            <tr>
                                                                <td>{{ $loop->index + 1 }}</td>
                                                                <td>{{ $produk->nama_produk }}</td>
                                                                <td>
                                                                    {{ $produk->harga }}
                                                                </td>
                                                                <td>
                                                                    {{ $produk->qty }}
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endif
                                        </div>
                                        </dl>
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
@endsection
