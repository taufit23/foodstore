{{-- tambah kategori --}}
<div class="modal fade" id="addcategory-modal">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.addcategory') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama kategori</label>
                            <input type="text" class="form-control" placeholder="Ext : Snack Pedas"
                                name="nama_kategori">
                            @error('nama_kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Cover kategori</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"
                                        name="cover_kategori">
                                    <label class="custom-file-label" for="inputcoverkategori">Choose file</label>
                                </div>
                                @error('cover_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-outline-light">Save changes</button>
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- tambah product --}}
<div class="modal fade" id="addproduct-modal">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Tambah produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama produk</label>
                            <input type="text" class="form-control" placeholder="Ext : Potatto rasa jagung"
                                name="nama_produk">
                            @error('nama_produk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="custom-select form-control-border" name="kategori_id">
                                @if (Request::is('tokos/product*'))
                                @foreach ($kategory as $kate)
                                <option value="{{ $kate->id }}">{{ $kate->nama_kategori }}</option>
                                @endforeach
                                @endif
                            </select>
                            @error('kategori_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Deskripsi produk</label>
                            <textarea class="form-control" rows="3"
                                placeholder="Ext : Terbuat dari kentang di'iris tipis dan digoreng dengan minyak yang mahal di indonesia"
                                name="deskripsi_produk"></textarea>
                            @error('deskripsi_produk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Stock produk & Harga product</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" placeholder="Ext : 1000" name="qty">
                                    @error('qty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" placeholder="ext : 25000" name="harga">
                                    @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Cover product</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"
                                        name="cover_produk">
                                    <label class="custom-file-label" for="inputcoverproduk">Choose file</label>
                                </div>
                                @error('cover_produk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-outline-light">Save changes</button>
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

