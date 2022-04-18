<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use app\Models\User;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengadaan = Pengadaan::paginate(5);
        return view('visitor.dashboard', ['pengadaan'=>$pengadaan]);
    }

    public function indexPengadaan()
    {
        $pengadaan = Pengadaan::paginate(10);
        $user = User::paginate(10);
        return view('admin.manajemen_aset.pengadaan', compact('pengadaan','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visitor.permohonan_aset.pengadaan');
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
            'alasan'  => 'required'
        ]);

        Pengadaan::create([
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
            'alasan'  => $request-> alasan,
            'user_id'  => $request-> user_id,
        ]);

        return redirect('/visitor/dashboard')->with('success', 'Pengadaan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengadaan $pengadaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengadaan = Pengadaan::find($id);
        return view('visitor.permohonan_aset.ubahPengadaan',['pengadaan'=>$pengadaan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenisBarang1'  => 'required',
            'tipeBarang1'  => 'required',
            'jumlahBarang1'  => 'required',
            'alasan'  => 'required'
        ]);

        $pengadaan = Pengadaan::find($id);
        $pengadaan->id = $request-> id;
        $pengadaan->jenisBarang1 = $request-> jenisBarang1;
        $pengadaan->tipeBarang1 = $request-> tipeBarang1;
        $pengadaan->jumlahBarang1  = $request-> jumlahBarang1;
        $pengadaan->jenisBarang2 = $request-> jenisBarang2;
        $pengadaan->tipeBarang2 = $request-> tipeBarang2;
        $pengadaan->jumlahBarang2  = $request-> jumlahBarang2;
        $pengadaan->jenisBarang3 = $request-> jenisBarang3;
        $pengadaan->tipeBarang3 = $request-> tipeBarang3;
        $pengadaan->jumlahBarang3  = $request-> jumlahBarang3;
        $pengadaan->jenisBarang4 = $request-> jenisBarang4;
        $pengadaan->tipeBarang4 = $request-> tipeBarang4;
        $pengadaan->jumlahBarang4  = $request-> jumlahBarang4;
        $pengadaan->jenisBarang5 = $request-> jenisBarang5;
        $pengadaan->tipeBarang5 = $request-> tipeBarang5;
        $pengadaan->jumlahBarang5  = $request-> jumlahBarang5;
        $pengadaan->alasan  = $request-> alasan;

        $pengadaan->save();
        
        
        return redirect('/visitor/dashboard')->with('success', 'Data Pengadaan Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Pengadaan = Pengadaan::find($id);
        $Pengadaan->delete();
        return redirect('/visitor/dashboard');
    }

    public function statusSetuju($id) 
    {
        $pengadaan = Pengadaan::find($id);
        $pengadaan->status = "setuju";
        $pengadaan->save();
        return redirect('/ManajemenAset/PengadaanAset')->with('success', 'Pengadaan Berhasil Disetujui');
    }

    public function statusTolak($id) 
    {
        $pengadaan = Pengadaan::find($id);
        $pengadaan->status = "tolak";
        $pengadaan->save();
        return redirect('/ManajemenAset/PengadaanAset')->with('success', 'Pengadaan Telah Ditolak');
    }
}
