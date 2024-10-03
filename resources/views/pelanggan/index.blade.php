@extends('layout')
@section('content')
<h2>Data Pelanggan</h2>
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Kelola Data Pelanggan</h2>
          <a href="{{ route('pelanggan.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
          @if (Session::has('success'))
          <p class="alert alert-success mt-1">{{ Session::get('success') }}</p>
          @endif
          <table class="table datatable">
            <thead>
              <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Email</th>
                <th>
                  <b>N</b>ame
                </th>
                <th>No Telpon</th>
                <th>Alamat</th>
                <th>Action</th>
              </tr>
            </thead>
            @php
                $no = 1
            @endphp
            <tbody>
                @foreach ($pelanggan as $pelanggan)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                      @if ($pelanggan->foto != null)
                      <img class="rounded-circle" src="{{ asset('storage/images/pelanggan/'.$pelanggan->foto) }}" alt="error" width="50px">
                      @else
                      <img class="rounded-circle" src="{{ asset('https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png') }}" alt="error" width="50px">
                      @endif
                    </td>
                    <td>{{ $pelanggan->email }}</td>
                    <td>{{ $pelanggan->nama_pelanggan }}</td>
                    <td>{{ $pelanggan->no_tlp }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td> 
                        <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-primary"><i class='bx bxs-edit'></i></a>
                        <a onclick="hapus({{ $pelanggan->id }})" class="btn btn-danger"><i class='bx bxs-trash-alt'></i></a>
                        <a href="{{ route('pelanggan.show', $pelanggan->id) }}" class="btn btn-info text-white"><i class='bx bxs-info-circle'></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
    function hapus(id){
      let conf = confirm('Apakah anda yakin menghapus?');
      if(conf){
        window.location.href=`pelanggan/delete/${id}`
      }
    }
    </script>
@endsection