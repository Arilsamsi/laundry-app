<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Laundry;
use App\Models\Pakaian;
use App\Models\Pelanggan;

class LaundryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laundry = Laundry::with('pelanggan', 'pakaian')->get();

        return view('laundry.index', compact('laundry'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pakaian = Pakaian::all();
        $pelanggan = Pelanggan::all();
        return view('laundry.create', compact('pakaian', 'pelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $randomletter = substr(str_shuffle("0123456789"), 0, 4);

        Laundry::create([
            'order_id' => $randomletter,
            'pakaian_id' => $request->pakaian_id,
            'pelanggan_id' => $request->pelanggan_id,
            'tgl_order' => $request->tgl_order,
            'tgl_selesai' => $request->tgl_selesai,
            'harga' => $request->harga,
            'berat' => $request->berat,
            'massa' => $request->massa,
        ]);

        \Session::flash('success', 'Data Laundry Berhasil ditambahkan');
        return redirect()->route('laundry');
    }

    public function cetakPdf(Request $request){

       $laundry = Laundry::with('pelanggan', 'pakaian')->get();
        
        $data = [
            'laundry' => $laundry,
        ];

            
        $pdf = Pdf::loadView('pdf.laundry', $data);
        return $pdf->download('laporanlaundry.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $laundry = Laundry::where('id', $id)->first();
        $laundry->delete();

        \Session::flash('success', 'Data Laundry Berhasil dihapus');
        return redirect()->route('laundry');
    }
}
