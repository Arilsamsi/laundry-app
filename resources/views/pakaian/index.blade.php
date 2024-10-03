@extends('layout')
@section('content')
<h2>Data Pakaian</h2>
<div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Kelola Data Pakaian</h2>
          <a href="{{ route('pakaian.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
          @if (Session::has('success'))
          <p class="alert alert-success mt-1">{{ Session::get('success') }}</p>
        @endif
          <table class="table datatable">
            <thead>
              <tr>
                <th>#</th>
                <th>
                  <b>Nama </b>Pakaian
                </th>
                <th>Jenis Pakaian</th>
                <th>Action</th>
              </tr>
            </thead>
            @php
                $no = 1
            @endphp
            <tbody>
                @foreach ($pakaian as $pakaian)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $pakaian->nama_pakaian }}</td>
                    <td>{{ $pakaian->jenis_pakaian }}</td>
                    <td> 
                        <a href="{{ route('pakaian.edit', $pakaian->id) }}" class="btn btn-primary"><i class='bx bxs-edit'></i>Edit</a>
                        <a onclick="hapus({{ $pakaian->id }})" class="btn btn-danger"><i class='bx bxs-trash-alt'></i>Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    function hapus(id){
      let conf = confirm('Apakah anda yakin menghapus?');
      if(conf){
        window.location.href=`pakaian/delete/${id}`
      }
    }
    </script>
    

@endsection