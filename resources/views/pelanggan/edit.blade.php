@extends('layout')
@section('content')
<h2>Form Edit data Pelanggan</h2>
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Edit Data Pelanggan</h2>
            <form action="{{ route('pelanggan.update') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('put')
              <input type="hidden" name="id" value="{{ $pelanggan->id }}" />
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $pelanggan->email }}" >
              </div>
              <div class="form-group">
                <label>Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" placeholder="Masukan Nama" class="form-control" value="{{ $pelanggan->nama_pelanggan }}">
              </div>
              <div class="form-group">
                <label>No Telepon</label>
                <input type="number" name="no_tlp" placeholder="Masukan Nomor Telp" class="form-control" value="{{ $pelanggan->no_tlp }}">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" placeholder="Masukan Alamat" class="form-control" value="{{ $pelanggan->alamat }}">
              </div>
              <div class="form-group">
                <label>Foto</label>
                <input type="file" accept="image/*" class="form-control">
              </div>
              <button type="submit" class="btn btn-success mt-2"><i class='bx bxs-edit'></i>Edit</button>
            </form>
        </div>
      </div>

    </div>
  </div>
@endsection