<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Pengadaan;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function indexInternal()
    {
        $pembelian = Pembelian::paginate(10);
        $pengadaan = Pengadaan::paginate(10);
        return view('transactor.pembelian-aset.pembelianInternal', compact('pembelian', 'pengadaan'));
    }

    public function indexEksternal()
    {
        $pembelian = Pembelian::paginate(10);
        $pengadaan = Pengadaan::paginate(10);
        return view('transactor.pembelian-aset.pembelianEksternal', compact('pembelian', 'pengadaan'));
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function prosesPembelianInternal(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);


        $foto = $request->file('gambar');
        $NamaFoto = time().'.'.$foto->extension();
        $foto->move(public_path('foto/pembelian-aset'), $NamaFoto);

        $pengadaan = Pengadaan::find($id);
        $pengadaan->status = $request->statusSetuju;
        $pengadaan->faktur = $NamaFoto;
        $pengadaan->save();


        Notifikasi::create([
            'deskripsi' => $request-> deskripsiSetuju,
            'status' => $request->statusSetuju,
            'kodePengadaan'  => $request-> kodePengadaan,
            'role' => $request->roleApprover,
            'unit_id' => $request->unit_id
        ]);

        Notifikasi::create([
            'deskripsi' => $request-> deskripsiSetuju,
            'status' => $request->statusSetuju,
            'kodePengadaan'  => $request-> kodePengadaan,
            'role' => $request->roleAdmin
        ]);

        return redirect(route('index-internal'))->with('success', 'Pembelian berhasil diproses');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }
}
