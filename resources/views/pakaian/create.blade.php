@extends('layout')
@section('content')
<h2>Form Tambah data Pakaian</h2>
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Tambah Data Pakaian</h2>
            <form action="{{ route('pakaian.post') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Nama Pakaian</label>
                    <input type="text" name="nama_pakaian" class="form-control" placeholder="Nama Pakaian">
                </div>
                <div class="form-group">
                    <label>Jenis Pakaian</label>
                    <select name="jenis_pakaian" class="form-control">
                        <option disabled selected>--Jenis Baju--</option>
                        <option value="Baju">Baju</option>
                        <option value="Celana">Celana</option>
                        <option value="Kemeja">Kemeja</option>
                        <option value="Mantel">Mantel</option>
                    </select>
                  </div>
                <button type="submit" class="btn btn-primary mt-2">Simpan</button>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection