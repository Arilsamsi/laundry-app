<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();

        return view('pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('foto');
        $file->storeAs('/public/images/pelanggan', $file->hashName());


        Pelanggan::create([
            'foto' => $file->hashName(),
            'email' => $request->email,
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
        ]);

        \Session::flash('success', 'Data Pelanggan Berhasil ditambahkan');
        return redirect()->route('pelanggan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::where('id', $id)->first();

        return view('pelanggan.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $pelanggan = Pelanggan::where('id', $id)->first();

        return view("pelanggan.edit", compact('pelanggan'));
    }
    public function update(Request $request){
        $pelanggan = Pelanggan::where('id', $request->id)->first();

        if($request->hasFile('foto')){
            // dd($request);
            $file = $request->file('foto');
            $file->storeAs('public/images/pelanggan', $file->hashName());

            Storage::delete('public/images/pelanggan/'.$pelanggan->foto);

            $pelanggan->email = $request->email;
            $pelanggan->nama_pelanggan = $request->nama_pelanggan;
            $pelanggan->no_tlp = $request->no_tlp;
            $pelanggan->alamat = $request->alamat;
            $pelanggan->foto = $request->foto->hashName();
            $pelanggan->save();
        }else{
            $pelanggan->email = $request->email;
            $pelanggan->nama_pelanggan = $request->nama_pelanggan;
            $pelanggan->no_tlp = $request->no_tlp;
            $pelanggan->alamat = $request->alamat;
            $pelanggan->save();
        }

        \Session::flash('success', 'Data Pelanggan Berhasil diperbarui');
        return redirect()->route('pelanggan');
    }
    public function delete(string $id)
    {
        $pelanggan = Pelanggan::where('id', $id)->first();
        File::delete(public_path('/public/images/pelanggan/'.$pelanggan['foto']));
        $pelanggan->delete();
        
        \Session::flash('success', 'Data Pelanggan Berhasil dihapus');
        return redirect()->route('pelanggan');
    }
}
