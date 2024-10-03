<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>Laundry</title>
</head>
<body>
    <h1 style="text-align: center">Laporan Laundry</h1>
    <h3 style="text-align: center">Ini adalah laporan Data laundry</h3>
    <div>
        <table class="table" style="margin-left: 15px;">
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
                <td>{{ $laundry->harga }}</td>
                <td>{{ $laundry->berat }} {{ $laundry->massa }}</td>
                <td> Rp. {{ $laundry->harga * $laundry->berat }}</td>
            </tr>
            @endforeach
           </tbody>
        </table>
    </div>
    <div>
        <h2 style="text-align: center">Laporan Data Laundry Hari Ini : 
            @php
            echo date('l, d-m-Y'); 
            @endphp
        </h2>
    </div>
    @php
        $owner = "Aril"
    @endphp
    <div>
        <h3>Hormat Kami</h3>
        <h3>{{ $owner}}</h3>
        <h3>Yang Bersangkutan</h3>
    </div>
</body>
</html>