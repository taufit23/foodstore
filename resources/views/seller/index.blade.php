@extends('dashboard.dashboardadmin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            Data Seller
          </h3>
        </div>
        <div class="card-body">
          <form action="#">
            <div class="row">
              <div class="col">
                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="ketik keyword disini">
              </div>
              <div class="col-auto">
                <button class="btn btn-primary">
                  Cari
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Nama Usaha</th>
                  <th>No Tlp</th>
                  <th>Alamat</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Amin</td>
                  <td>kuliner aku</td>
                  <td>085852527575</td>
                  <td>
                    Jln. Jend Sudirman no.1, Kudus
                  </td>
                  <td>
                    Aktif
                  </td>
                  <td>
                    <a href="{{ route('dfseller.edit', 1) }}" class="btn btn-sm btn-primary">Edit</a>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Budi</td>
                  <td>pondok kuliner</td>
                  <td>085852527576</td>
                  <td>
                    Jln. Jend Sudirman no.2, Kudus
                  </td>
                  <td>
                    Aktif
                  </td>
                  <td>
                    <a href="{{ route('dfseller.edit', 2) }}" class="btn btn-sm btn-primary">Edit</a>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Iwan</td>
                  <td>kuliner kuok</td>
                  <td>085852527577</td>
                  <td>
                    Jln. Jend Sudirman no.3, Kudus
                  </td>
                  <td>
                    Aktif
                  </td>
                  <td>
                    <a href="{{ route('dfseller.edit', 3) }}" class="btn btn-sm btn-primary">Edit</a>
                  </td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Lala</td>
                  <td>pondok ikan</td>
                  <td>085852527578</td>
                  <td>
                    Jln. Jend Sudirman no.4, Kudus
                  </td>
                  <td>
                    Aktif
                  </td>
                  <td>
                    <a href="{{ route('dfseller.edit', 4) }}" class="btn btn-sm btn-primary">Edit</a>
                  </td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Didi</td>
                  <td>sate kuok</td>
                  <td>085852527579</td>
                  <td>
                    Jln. Jend Sudirman no.5, Kudus
                  </td>
                  <td>
                    Aktif
                  </td>
                  <td>
                    <a href="{{ route('dfseller.edit', 5) }}" class="btn btn-sm btn-primary">Edit</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
