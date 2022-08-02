@extends('private.layouts.master')
@section('title')
Dashboard Admin
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
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Toko</span>
                            <span class="info-box-number">
                                {{ $count_user }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-clock"></i> </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Toko invalid</span>
                            <span class="info-box-number">
                                {{ $count_invalid_user }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-check"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Toko valid</span>
                            <span class="info-box-number">
                                {{ $count_valid_user }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1">
                            <<i class="fas fa-user-alt-slash"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Toko frozen</span>
                            <span class="info-box-number">
                                {{ $count_frozen_user }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-6">

                            <div class="card direct-chat direct-chat-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Komentar terbaru</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="direct-chat-messages">
                                        <ul class="contacts-list">
                                            @foreach ($komentar as $koment)
                                            <li>
                                                <a href="#">
                                                    <div class="contacts-list-info">
                                                        <span class="contacts-list-name">
                                                            {{ $koment->nama_costumer }}
                                                            <small
                                                                class="contacts-list-date float-right">{{ $koment->created_at->diffForHumans() }}</small>
                                                        </span>
                                                        <span class="contacts-list-msg">{{ $koment->komentar }}</span>
                                                        <small
                                                                class="contacts-list-date float-right">Toko : {{ $koment->toko->nama_usaha }}</small>
                                                    </div>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Toko terbaru</h3>

                                    <div class="card-tools">
                                        <span class="badge badge-danger">{{ $tokos->count() }} Toko baru</span>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body p-0">
                                    <ul class="users-list clearfix">
                                        @foreach ($tokos as $toko)
                                        <li>
                                            <img src="{{ asset($toko->cover) }}" class="img img-circle img img-fluid" width="100">
                                            <a class="users-list-name" href="#">{{ $toko->nama_usaha }}</a>
                                            <span class="users-list-date">{{ $toko->created_at->diffForHumans() }}</span>
                                        </li>
                                        @endforeach
                                    </ul>

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
