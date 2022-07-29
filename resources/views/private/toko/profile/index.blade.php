@extends('private.layouts.master')
@section('title')
Profile Toko
@stop
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset(auth()->user()->toko->cover) }}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

                            <p class="text-muted text-center">{{ auth()->user()->status }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Total Produk</b> <a class="float-right">{{ auth()->user()->produk->count() }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Komentar toko</b> <a
                                        class="float-right">{{ auth()->user()->toko->komentar->count() }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Total kategori produk</b> <a
                                        class="float-right">{{  auth()->user()->kategori->count() }}</a>
                                </li>
                            </ul>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#Userdetail"
                                        data-toggle="tab">Toko detail</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="Userdetail">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <span class="username">
                                                Name : <code>{{ auth()->user()->name }}</code>
                                            </span>
                                            <span class="username">
                                                Email : <code>{{ auth()->user()->email }}</code>
                                            </span>
                                            <span class="username">
                                                No Hp : <code>{{ auth()->user()->no_hp }}</code>
                                            </span>
                                            <span class="username">
                                                status : <code>
                                                    @if (auth()->user()->status == null)
                                                    Invalid
                                                    @elseif(auth()->user()->status == 1)
                                                    Valid
                                                    @else
                                                    Frozen
                                                    @endif
                                                </code>
                                            </span>
                                            <span class="username">
                                                Alamat
                                                <code>{{ auth()->user()->toko->alamat }}</code>
                                            </span>
                                            <h4>Ganti Password</h4>
                                            @if (session('errors'))
                                            <div class="alert alert-danger"
                                                style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; "
                                                role="alert">
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </div>
                                            @endif
                                            @if (session('gagal'))
                                            <div class="alert alert-danger"
                                                style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; "
                                                role="alert">
                                                <li>{{ session('gagal') }}</li>
                                            </div>
                                            @elseif(session('success'))
                                            <div class="alert alert-success"
                                                style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; "
                                                role="alert">
                                                <li>{{ session('success') }}</li>
                                            </div>
                                            @endif
                                            <form action="{{ route('profile.gantipw') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Password lama</label>
                                                        <input class="form-control form-control-sm" type="password"
                                                            placeholder="Password" name="password">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>Password baru</label>
                                                        <input class="form-control form-control-sm" type="password"
                                                            placeholder="New Password" name="new_password">
                                                    </div>
                                                    <div class="row justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-warning mt-3">Ganti</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>
</div>
@endsection
