@extends('layout')
@section('content')
<h2>Data Laundry</h2>
<div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Kelola Data Laundry</h2>
          <a href="{{ route('laundry.create') }}" class="btn btn-primary">Tambah Data</a>
          <a href="{{ route('cetak.pdf') }}" class="btn btn-danger">Cetak PDF</a>
          @if (Session::has('success'))
            <p class="alert alert-success mt-1">{{ Session::get('success') }}</p>
          @endif
          <table class="table datatable">
            <thead>
              <tr>
                <th>#</th>
                <th>ID Order</th>
                <th>Pakaian</th>
                <th>
                  <b>Nama </b>Pelanggan
                </th>
                <th data-type="date" date-format="MM/DD/YYYY">Tanggal Order</th>
                <th data-type="date" date-format="MM/DD/YYYY">Tanggal Selesai</th>
                <th>Harga</th>
                <th>Berat</th>
                <th>Total</th>
                {{-- <th>Keterangan</th> --}}
                <th>Action</th>
              </tr>
            </thead>
            @php
                $no = 1
            @endphp
            <tbody>
                @foreach ($laundry as $laundry)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $laundry->order_id }}</td>
                    <td>{{ $laundry->pakaian->nama_pakaian }}</td>
                    <td>{{ $laundry->pelanggan->nama_pelanggan }}, {{ $laundry->pelanggan->alamat }}</td>
                    <td>{{ $laundry->tgl_order }}</td>
                    <td>{{ $laundry->tgl_selesai }}</td>
                    <td>Rp.{{ $laundry->harga }}</td>
                    <td>{{ $laundry->berat }} {{ $laundry->massa }}</td>
                    <td>Rp.{{ $laundry->harga * $laundry->berat }}</td>
                    {{-- <td>
                      <button class="btn btn-success btn-sm">Selesai</button>
                    </td> --}}
                    <td>
                      <a onclick="hapus({{ $laundry->id }})" class="btn btn-outline-danger"><i class='bx bxs-trash-alt'></i></a>
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
<script type="text/javascript">
    function hapus(id){
      let conf = confirm('Apakah anda yakin menghapus?');
      if(conf){
        window.location.href=`laundry/delete/${id}`
      }
    }
    </script>
@endsection