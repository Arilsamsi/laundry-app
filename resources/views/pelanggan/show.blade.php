@extends('layout')
@section('content')
<div class="row">
  <div class="col-xl-4">
    <div class="card">
      <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
       <img src="{{ asset('storage/images/pelanggan/'.$pelanggan->foto) }}" alt="Profile" class="rounded-circle" width="150px">
       <h2>{{ $pelanggan->nama_pelanggan }}</h2>
       <h3>{{ $pelanggan->email }}</h3>
      </div>
    </div>
  </div>
  <div class="col-xl-8">
    <div class="card">
      <div class="card-body pt-3">
        <ul class="nav nav-tabs nav-tabs-bordered">
          <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
          </li>
        </ul>
        <div class="tab-content pt-2">
          </div>
          <form action="{{ route('pelanggan.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
              @method('put')
              <input type="hidden" name="id" value="{{ $pelanggan->id }}" />
            <div class="row mb-3">
              <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
              <div class="col-md-8 col-lg-9">
                @if ($pelanggan->foto != null)
                  <img src="{{ asset('storage/images/pelanggan/'.$pelanggan->foto) }}" alt="Profile" width="100px">
                @else
                  <img src="{{ asset('https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png') }}" alt="" width="100px">    
                @endif
                <div class="pt-2">
                  <input type="file" class="form-control" name="foto" accept="image/*">
                  <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
              <div class="col-md-8 col-lg-9">
                <input name="email" type="email" class="form-control" id="Email" value="{{ $pelanggan->email }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama</label>
              <div class="col-md-8 col-lg-9">
                <input name="nama_pelanggan" type="text" class="form-control" id="fullName" value="{{ $pelanggan->nama_pelanggan }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
              <div class="col-md-8 col-lg-9">
                <input name="no_tlp" type="number" class="form-control" id="Phone" value="{{ $pelanggan->no_tlp }}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="company" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
              <div class="col-md-8 col-lg-9">
                <input name="alamat" type="text" class="form-control" id="company" value="{{ $pelanggan->alamat }}">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
@endsection