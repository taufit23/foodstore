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
                        @elseif(session('success'))
                        <div class="alert alert-success"
                            style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; "
                            role="alert">
                            <li>{{ session('success') }}</li>
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
                        <div class="card-header">
                            <h3 class="card-title">All Products</h3>
                            <code>. Click baris untuk lihat detail</code>
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
                                        <th>Nama produk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $prod => $produ)
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $produ->kategori->nama_kategori }}</td>
                                        <td>
                                            {{ $produ->nama_produk }}
                                        </td>
                                        <td class="text-center">
                                            <a href="" class="btn sm btm-primary">
                                                <i class="fas fa-file"></i>Edit
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="expandable-body">
                                        <td colspan="4">
                                            <div class="container-fluid">


                                                <dl class="row">
                                                    <div class="col-sm-2">
                                                        <div class="row">
                                                            <img src="{{ asset($produ->cover_produk) }}"
                                                                class="img img-thumbnail" style="width: 180px">
                                                        </div>
                                                        <div class="row">
                                                            <code> Cover produk</code>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <dt class="col-sm-4 font-weight-bold text-info">Deskripsi
                                                                Produk
                                                            </dt>
                                                            <dd class="col-sm-8">{{ $produ->deskripsi_produk }}</dd>
                                                            <dt class="col-sm-4 font-weight-bold text-info">Stoct Produk
                                                            </dt>
                                                            <dd class="col-sm-8">{{ $produ->qty }}</dd>
                                                            <dt class="col-sm-4 font-weight-bold text-info">Harga Produk
                                                            </dt>
                                                            <dd class="col-sm-8">Rp.
                                                                {{ number_format($produ->harga,0,',','.') }}</dd>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        @if ($produ->image->count() < 1 ) <form
                                                            action="{{ route('addimageslide') }}" method="POST"
                                                            enctype="multipart/form-data" id="form-imagesss">
                                                            @csrf
                                                            <label>Min 3 file</label>
                                                            <input type="hidden" name="produk_id" class="hidden"
                                                                value="{{ $produ->id }}">
                                                            <input type="file" name="url[]" class="form-control"
                                                                multiple id="imagesinput">
                                                            <code>Upload Multiple</code>
                                                            </form>
                                                            @else
                                                            <div class="row">
                                                                <div id="gambarcosresl"
                                                                    class="carousel slide carousel-fade"
                                                                    data-ride="carousel">
                                                                    <div class="carousel-inner">
                                                                        @foreach ($produ->image as $key => $gambr)
                                                                        <div
                                                                            class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                                            <img src="{{ asset($gambr->url) }}"
                                                                                class="img img-thumbnail"style="width: 180px">
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <a class="carousel-control-prev"
                                                                        href="#gambarcosresl" role="button"
                                                                        data-slide="prev">
                                                                        <span class="carousel-control-prev-icon"
                                                                            aria-hidden="true"></span>
                                                                        <span class="sr-only">Previous</span>
                                                                    </a>
                                                                    <a class="carousel-control-next"
                                                                        href="#gambarcosresl" role="button"
                                                                        data-slide="next">
                                                                        <span class="carousel-control-next-icon"
                                                                            aria-hidden="true"></span>
                                                                        <span class="sr-only">Next</span>
                                                                    </a>
                                                                </div>
                                                                {{-- <img src="{{ asset($produ->cover_produk) }}"
                                                                    class="img img-thumbnail" style="width: 180px"> --}}
                                                            </div>
                                                            <div class="row">
                                                                <code>Image slide</code>
                                                            </div>
                                                            @endif

                                                    </div>

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
<script type="text/javascript">
    document.getElementById("imagesinput").onchange = function () {
        document.getElementById("form-imagesss").submit();
    };
</script>
@stop

@section('modal')
@include('private.layouts._includes._Modals')
@endsection
