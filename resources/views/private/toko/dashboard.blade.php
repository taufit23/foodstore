@extends('private.layouts.master')
@section('title')
    Dashboard Toko
@endsection
@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>


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

                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#Userdetail"
                                        data-toggle="tab">Toko detail</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="Userdetail">

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
                                            <form action="{{ route('profile.gantipw') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Password lama</label>
                                                        <input class="form-control form-control-sm" type="password"
                                                            placeholder="Password" name="password">
                                                            @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>Password baru</label>
                                                        <input class="form-control form-control-sm" type="password"
                                                            placeholder="New Password" name="new_password">
                                                            @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

</div>
@endsection
