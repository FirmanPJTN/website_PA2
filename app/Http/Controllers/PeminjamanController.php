<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::paginate(10);
        return view('visitor.dashboard', ['peminjaman'=>$peminjaman]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visitor.permohonan_aset.peminjaman');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenisBarang1'  => 'required',
            'tipeBarang1'  => 'required',
            'jumlahBarang1'  => 'required',
            'tglKembali'  => 'required',
            'tujuan'  => 'required'
        ]);

        Peminjaman::create([
            'jenisBarang1'  => $request-> jenisBarang1,
            'tipeBarang1'  => $request-> tipeBarang1,
            'jumlahBarang1'  => $request-> jumlahBarang1,
            'jenisBarang2'  => $request-> jenisBarang2,
            'tipeBarang2'  => $request-> tipeBarang2,
            'jumlahBarang2'  => $request-> jumlahBarang2,
            'jenisBarang3'  => $request-> jenisBarang3,
            'tipeBarang3'  => $request-> tipeBarang3,
            'jumlahBarang3'  => $request-> jumlahBarang3,
            'jenisBarang4'  => $request-> jenisBarang4,
            'tipeBarang4'  => $request-> tipeBarang4,
            'jumlahBarang4'  => $request-> jumlahBarang4,
            'jenisBarang5'  => $request-> jenisBarang5,
            'tipeBarang5'  => $request-> tipeBarang5,
            'jumlahBarang5'  => $request-> jumlahBarang5,
            'tglKembali'  => $request-> tglKembali,
            'tujuan'  => $request-> tujuan,
        ]);

        return redirect('/visitor/dashboard')->with('success', 'Peminjaman Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjaman = Peminjaman::find($id);
        return view('visitor.permohonan_aset.ubahPeminjaman',['peminjaman'=>$peminjaman]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenisBarang1'  => 'required',
            'tipeBarang1'  => 'required',
            'jumlahBarang1'  => 'required',
            'tglKembali'  => 'required',
            'tujuan'  => 'required'
        ]);

        $peminjaman = Peminjaman::find($id);
        $peminjaman->id = $request-> id;
        $peminjaman->jenisBarang1 = $request-> jenisBarang1;
        $peminjaman->tipeBarang1 = $request-> tipeBarang1;
        $peminjaman->jumlahBarang1  = $request-> jumlahBarang1;
        $peminjaman->jenisBarang2 = $request-> jenisBarang2;
        $peminjaman->tipeBarang2 = $request-> tipeBarang2;
        $peminjaman->jumlahBarang2  = $request-> jumlahBarang2;
        $peminjaman->jenisBarang3 = $request-> jenisBarang3;
        $peminjaman->tipeBarang3 = $request-> tipeBarang3;
        $peminjaman->jumlahBarang3  = $request-> jumlahBarang3;
        $peminjaman->jenisBarang4 = $request-> jenisBarang4;
        $peminjaman->tipeBarang4 = $request-> tipeBarang4;
        $peminjaman->jumlahBarang4  = $request-> jumlahBarang4;
        $peminjaman->jenisBarang5 = $request-> jenisBarang5;
        $peminjaman->tipeBarang5 = $request-> tipeBarang5;
        $peminjaman->jumlahBarang5  = $request-> jumlahBarang5;
        $peminjaman->tglKembali  = $request-> tglKembali;
        $peminjaman->tujuan  = $request-> tujuan;

        $peminjaman->save();
        
        
        return redirect('/visitor/dashboard')->with('success', 'Data Peminjaman Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Peminjaman = Peminjaman::find($id);
        $Peminjaman->delete();
        return redirect('/visitor/dashboard');
    }
}
