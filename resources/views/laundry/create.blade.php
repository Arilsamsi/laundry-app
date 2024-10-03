@extends('layout')
@section('content')
<h2>Form Tambah data Penyewaan</h2>
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title">Tambah Data Penyewaan</h2>
            <form action="{{ route('laundry.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Pakaian</label>
                    <select name="pakaian_id" class="form-control">
                        <option disabled selected>--Nama Pakaian</option>
                        @foreach ($pakaian as $pakaian)
                            <option value="{{ $pakaian->id }}">{{ $pakaian->nama_pakaian }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <select name="pelanggan_id" class="form-control">
                        <option disabled selected>--Nama Pelanggan</option>
                        @foreach ($pelanggan as $pelanggan)
                            <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama_pelanggan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Order</label>
                    <input type="date" name="tgl_order" class="form-control">
                </div>
                <div class="form-group">
                    <label>Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" class="form-control">
                </div>
                <div class="form-group">
                    <label>Price List</label>
                    <select name="harga" class="form-control">
                        <option disabled selected>--Price List--</option>
                        <option value="5000">Cuci Biasa -5000</option>
                        <option value="10000">Cuci + Setrika -10000</option>
                        <option value="15000">Cuci Kering + Setrika -15000</option>
                        <option value="25000">Cuci Kering + Setrika + Packing -25000</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Berat</label>
                    <input type="number" name="berat" class="form-control" id="form-berat">
                    <select name="massa" class="form-control mt-2" id="form-massa">
                        <option disabled selected>--Massa--</option>
                        <option value="Kg">Kilogram</option>
                    </select>
                </div>
                <div class="form-group">
                    {{-- <input name="total" value="" class="form-control mt-2" style="width: 200px" placeholder="1000" readonly id="total-harga"/> --}}
                    <p class="harga-total">Total: </p>
                </div>
                <button type="submit" class="btn btn-outline-primary mt-2">Simpan</button>
                <button type="reset" class="btn btn-outline-danger mt-2">Reset</button>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection
<style>
    .harga-total{
        top: 390px;
        left: 25px;
    }
    #total-harga{
        left: 50px;
        bottom: 7px;
        text-align: center;
    }
    #form-berat{
        width: 900px;
    }
    #form-massa{
        width: 98px;
        left: 923px;
        top: 391px;
        position: absolute;
    }
</style>