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

    public function indexApprover()
    {
        $pembelian = Pembelian::paginate(10);
        $pengadaan = Pengadaan::paginate(10);
        return view('approver.persetujuan.pengadaanAset', compact('pembelian', 'pengadaan'));
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

        $pembelian = Pembelian::find($id);

        $foto = $request->file('gambar');
        $NamaFoto = time().'.'.$foto->extension();
        $foto->move(public_path('foto/pembelian-aset'), $NamaFoto);


        $pembelian->status = $request->statusSetuju;
        $pembelian->gambar = $NamaFoto;
        $pembelian->save();

        $pengadaan = Pengadaan::where('id',$request->idPengadaan)->first();
        $pengadaan->status = $request->statusSetuju;
        $pengadaan->pembelian_id = $request->idPembelian;
        $pengadaan->save();

        Notifikasi::create([
            'deskripsi' => $request-> deskripsiSetuju,
            'status' => $request->statusSetuju,
            'kodePengadaan'  => $request-> kodePengadaan,
            'role' => $request->roleApprover,
            'user_id' => $request->idUser,
        ]);

        Notifikasi::create([
            'deskripsi' => $request-> deskripsiSetuju,
            'status' => $request->statusSetuju,
            'kodePengadaan'  => $request-> kodePengadaan,
            'role' => $request->roleAdmin
        ]);

        return redirect(route('index-internal'))->with('success', 'Pembelian berhasil diproses');
    }


    public function prosesPersetujuanInternalPR(Request $request, $id)
    {


        $pembelian = Pembelian::find($id);

        if($request->get('btnSubmit') == 'tolak') {
            $pembelian-> status = $request->statusTolak;
        } else if($request->get('btnSubmit') == 'setuju') {
            $pembelian-> status = $request->statusSetujuPR;
        }
        $pembelian->alasan = $request->alasan;
        $pembelian->save();

        if($request->get('btnSubmit') == 'setuju') {
        $pengadaan = Pengadaan::where('id',$request->idPengadaan)->first();
        $pengadaan->status = $request->statusSetujuPR;
        $pengadaan->pembelian_id = $request->idPembelian;
        $pengadaan->save();
        } else if($request->get('btnSubmit') == 'tolak') {
            $pengadaan = Pengadaan::where('id',$request->idPengadaan)->first();
            $pengadaan->status = $request->statusTolak;
            $pengadaan->pembelian_id = $request->idPembelian;
            $pengadaan->save();
        }


        if($request->get('btnSubmit') == 'tolak') {
            Notifikasi::create([
                'deskripsi' => $request-> deskripsiNotifTolakPR,
                'status' => $request->statusTolak,
                'kodePengadaan'  => $request-> kodePengadaan,
                'role' => $request->roleAdmin,
                'user_id' => $request->idUser
            ]);
        } else if($request->get('btnSubmit') == 'setuju') {
            Notifikasi::create([
                'deskripsi' => $request-> deskripsiNotifSetujuPR,
                'status' => $request->statusSetujuPR,
                'kodePengadaan'  => $request-> kodePengadaan,
                'role' => $request->roleAdmin,
                'user_id' => $request->idUser
            ]);
        }

        return redirect(route('index-beli-approver'))->with('success', 'Product Request berhasil diproses');
    }

    public function prosesPersetujuanInternalPO(Request $request, $id)
    {


        $pembelian = Pembelian::find($id);

        if($request->get('btnSubmit') == 'tolak') {
            $pembelian-> status = $request->statusTolak;
        } else if($request->get('btnSubmit') == 'setuju') {
            $pembelian-> status = $request->statusSetujuPO;
        }
        $pembelian->alasan = $request->alasan;
        $pembelian->save();

        if($request->get('btnSubmit') == 'setuju') {
        $pengadaan = Pengadaan::where('id',$request->idPengadaan)->first();
        $pengadaan->status = $request->statusSetujuPO;
        $pengadaan->save();
        } else if($request->get('btnSubmit') == 'tolak') {
            $pengadaan = Pengadaan::where('id',$request->idPengadaan)->first();
            $pengadaan->status = $request->statusTolak;
            $pengadaan->save();
        }


        if($request->get('btnSubmit') == 'tolak') {
            Notifikasi::create([
                'deskripsi' => $request-> deskripsiNotifTolakPO,
                'status' => $request->statusTolak,
                'kodePengadaan'  => $request-> kodePengadaan,
                'role' => $request->roleAdmin,
                'user_id' => $request->idUser
            ]);
        } else if($request->get('btnSubmit') == 'setuju') {
            Notifikasi::create([
                'deskripsi' => $request-> deskripsiNotifSetujuPO,
                'status' => $request->statusSetujuPO,
                'kodePengadaan'  => $request-> kodePengadaan,
                'role' => $request->roleAdmin,
                'user_id' => $request->idUser
            ]);

            Notifikasi::create([
                'deskripsi' => $request-> deskripsiNotifSetujuPOBeli,
                'status' => $request->statusSetujuPO,
                'kodePengadaan'  => $request-> kodePengadaan,
                'role' => $request->role
            ]);
        }

        return redirect(route('index-beli-approver'))->with('success', 'Product Order berhasil diproses');
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
