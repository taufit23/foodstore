@extends('private.layouts.master')
@section('title')
Sellers
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card my-2">
                        @if (session('errors'))
                        <div class="alert alert-danger"
                            style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; "
                            role="alert">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </div>
                        @elseif(session('success'))
                        <div class="alert alert-success"
                            style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; "
                            role="alert">
                            <li>{{ session('success') }}</li>
                        </div>
                        @endif
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
                                        <div id="lokasisellres"
                                            style="height: 200px; width: 200px; position: relative; overflow: hidden;">
                                        </div>
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
