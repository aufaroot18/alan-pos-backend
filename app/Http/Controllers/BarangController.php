<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact("barangs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "kode_barang" => 'required',
            "nama_barang" => 'required',
            "harga" => 'required|numeric',
            "stok" => 'required|numeric',
        ]);

        $barang = Barang::create([
            "kode_barang" => $request->kode_barang,
            "nama_barang" => $request->nama_barang,
            "harga" => $request->harga,
            "stok" => $request->stok,
            "gambar" => "placeholder.jpg",
        ]);

        return redirect()->route('barang.create')->with('status', 'Data telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        // return view('barang.show', compact("barang"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact("barang"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $id = $barang->id;

        $validateData = $request->validate([
            "kode_barang" => 'required',
            "nama_barang" => 'required',
            "harga" => 'required|numeric',
            "stok" => 'required|numeric',
        ]);

        $barang = Barang::where('id', $barang->id)->update([
            "kode_barang" => $request->kode_barang,
            "nama_barang" => $request->nama_barang,
            "harga" => $request->harga,
            "stok" => $request->stok,
        ]);

        return redirect()->route('barang.edit', ['barang' => $id])->with('status', 'Data telah diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
