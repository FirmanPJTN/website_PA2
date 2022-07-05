<?php

namespace App\Http\Controllers;

use App\Models\Gedung;
use App\Models\DataAset;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gedung = Gedung::paginate(10);
        return view('admin.manajemen_aset.kelolaGedung', ['gedung'=>$gedung]);
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
            'gedung'  => 'required'
        ]);

        Gedung::create([
            'nama'  => $request-> gedung
        ]);

        return redirect(route('kelola-gedung'))->with('success', 'Gedung Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function show(Gedung $gedung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function edit(Gedung $gedung)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'gedung'  => 'required'
        ]);

        $gedung = Gedung::find($id);
        $gedung->nama = $request-> gedung;

        $gedung->save();
        
        
        return redirect(route('kelola-gedung'))->with('success', 'Gedung Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gedung  $gedung
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Gedung = Gedung::find($id);

        $DataAset = DataAset::where('gedung_id',$id)->count();

        if($DataAset != 0) {
            return redirect(route('kelola-gedung'))->with('warning', 'Data Gagal Dihapus, Data Gedung Sedang Digunakan!');
        } else {
            $Gedung->delete();
            return redirect(route('kelola-gedung'));
        }
    }
}
