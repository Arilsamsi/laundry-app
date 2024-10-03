@extends('layout')
@section('content')
<h2>Form Tambah data Pelanggan</h2>
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Tambah Data Pelanggan</h2>
            <form action="{{ route('pelanggan.post') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukan Email">
              </div>
              <div class="form-group">
                <label>Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" placeholder="Masukan Nama" class="form-control">
              </div>
              <div class="form-group">
                <label>No Telepon</label>
                <input type="number" name="no_tlp" placeholder="Masukan Nomor Telp" class="form-control">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" placeholder="Masukan Alamat" class="form-control">
              </div>
              <div class="form-group">
                <label>Foto</label>
                <input type="file" accept="image/*" class="form-control" name="foto">
              </div>
              <button type="submit" class="btn btn-sm btn-success mt-2">Simpan</button>
              <button type="reset" class="btn btn-sm btn-danger mt-2">Reset</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection