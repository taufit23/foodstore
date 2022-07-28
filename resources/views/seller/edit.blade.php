@extends('dashboard.dashboardadmin')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-4 col-md-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            Form Edit Customer
          </h3>
          <div class="card-tools">
            <a href="{{ route('dfseller.index') }}" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
        </div>
        <div class="card-body">
          <table class="table">
            <tbody>
              <tr>
                <td>
                  Nama
                </td>
                <td>
                  Amin
                </td>
              </tr>
              <tr>
                <td>
                  Nama usaha
                </td>
                <td>
                  Kuliner Aku
                </td>
              </tr>
              <tr>
                <td>
                  No Tlp
                </td>
                <td>
                  082287553138
                </td>
              </tr>
              <tr>
                <td>
                  Alamat
                </td>
                <td>
                  Pasar Kuok
                </td>
              </tr>
              <tr>
                <td>
                  Status
                </td>
                <td>
                  <form action="#" class="form-inline">
                    <div class="form-group mr-2">
                      <select name="status" id="status" class="form-control">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Non Aktif</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
