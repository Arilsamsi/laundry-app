@extends('layout')
@section('content')
<h2>Form Edit data Pakaian</h2>
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Edit Data Pakaian</h2>
            <form action="{{ route('pakaian.update') }}" method="POST">
              @csrf
              @method('put')
              <input type="hidden" name="id" value="{{ $pakaian->id }}" />
              <div class="form-group">
                <label>Nama Pakaian</label>
                <input type="text" name="nama_pakaian" class="form-control" value="{{ $pakaian->nama_pakaian }}" >
              </div>
              <div class="form-group">
                <label>Jenis Pakaian</label>
                <select name="jenis_pakaian" class="form-control">
                    <option disabled selected>--Jenis Baju--</option>
                    <option value="Baju" {{ $pakaian->jenis_pakaian == 'Baju' ? 'selected' : '' }}>Baju</option>
                    <option value="Celana" {{ $pakaian->jenis_pakaian == 'Celana' ? 'selected' : '' }}>Celana</option>
                    <option value="Kemeja" {{ $pakaian->jenis_pakaian == 'Kemeja' ? 'selected' : '' }}>Kemeja</option>
                    <option value="Mantel" {{ $pakaian->jenis_pakaian == 'Mantel' ? 'selected' : '' }}>Mantel</option>
                </select>
              </div>
              <button type="submit" class="btn btn-success mt-2"><i class='bx bxs-edit'></i>Edit</button>
            </form>
        </div>
      </div>

    </div>
  </div>
@endsection