<?php

namespace App\Http\Controllers;

use App\Models\Pakaian;
use Illuminate\Http\Request;

class PakaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pakaian = Pakaian::all();

        return view('pakaian.index', compact('pakaian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pakaian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pakaian::create([
            'nama_pakaian' => $request->nama_pakaian,
            'jenis_pakaian' => $request->jenis_pakaian,
        ]);

        \Session::flash('success', 'Data Pakaian Berhasil ditambahkan');
        return redirect()->route('pakaian');
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
        $pakaian = Pakaian::where('id', $id)->first();

        return view('pakaian.edit', compact('pakaian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $pakaian = Pakaian::where('id', $request->id)->first();

        $pakaian->nama_pakaian = $request->nama_pakaian;
        $pakaian->jenis_pakaian = $request->jenis_pakaian;
        $pakaian->save();

        \Session::flash('success', 'Data Pakaian Berhasil diperbarui');
        return redirect()->route('pakaian');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        
        $pakaian = Pakaian::where('id', $id)->first();
        $pakaian->delete();

        \Session::flash('success', 'Data Pakaian Berhasil dihapus');
        return redirect()->route('pakaian');
    }
}
