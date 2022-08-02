@extends('private.layouts.master')
@section('title')
Komentar
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Komentar</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                        @foreach ($komentars as $komentar)
                                        <tr>
                                            <td class="mailbox-name"><a href="read-mail.html">
                                                    {{ $komentar->nama_costumer }}
                                                </a></td>
                                            <td class="mailbox-subject">{{ $komentar->komentar }}
                                            </td>
                                            <td class="mailbox-attachment"></td>
                                            <td class="mailbox-date">{{ $komentar->created_at->diffForHumans() }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    {{ $komentars->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
