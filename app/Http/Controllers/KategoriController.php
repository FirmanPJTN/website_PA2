<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\DataAset;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::paginate(10);
        return view('admin.manajemen_aset.kelolaKategori', ['kategori'=>$kategori]);
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
    public function store(Request $request)
    {
        $request->validate([
            'kategori'  => 'required'
        ]);

        Kategori::create([
            'nama'  => $request-> kategori
        ]);

        return redirect(route('kelola-kategori'))->with('success', 'Kategori Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'kategori'  => 'required'
        ]);

        $kategori = Kategori::find($id);
        $kategori->nama = $request-> kategori;

        $kategori->save();
        
        
        return redirect(route('kelola-kategori'))->with('success', 'Kategori Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Kategori = Kategori::find($id);

        $DataAset = DataAset::where('kategori_id',$id)->count();

        if($DataAset != 0) {
            return redirect(route('kelola-kategori'))->with('warning', 'Data Gagal Dihapus, Data Kategori Sedang Digunakan!');
        } else {
            $Kategori->delete();
            return redirect(route('kelola-kategori'));
        }
    }
}
