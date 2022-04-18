<?php

namespace App\Http\Controllers;

use App\Models\DataAset;
use App\Models\User;
use Illuminate\Http\Request;
use Alert;

class ControllerDataAset extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('cari')) {
            $data = DataAset::where('kodeAset', 'LIKE','%'.$request->cari.'%')
            ->orWhere('kodeAset', 'LIKE','%'.$request->cari.'%')
            ->orWhere('jenisBarang', 'LIKE','%'.$request->cari.'%')
            ->orWhere('tipeBarang', 'LIKE','%'.$request->cari.'%')
            ->orWhere('tglBeli', 'LIKE','%'.$request->cari.'%')
            ->orWhere('penyimpanan', 'LIKE','%'.$request->cari.'%')
            ->orWhere('unit', 'LIKE','%'.$request->cari.'%')
            ->paginate(10);
            $user = User::paginate(10);
        } elseif($request->has('filterUnit') AND $request->has('filterKategori')) {
            $data = DataAset::where('unit', 'LIKE','%'.$request->filterUnit.'%')
            ->where('kategori', 'LIKE','%'.$request->filterKategori.'%')
            ->paginate(10);
            $user = User::paginate(10);
        } elseif($request->has('filterKategori')) {
            $data = DataAset::where('kategori', 'LIKE','%'.$request->filterKategori.'%')
            ->paginate(10);
            $user = User::paginate(10);
        } elseif($request->has('filterUnit')) {
            $data = DataAset::where('unit', 'LIKE','%'.$request->filterUnit.'%')
            ->paginate(10);
            $user = User::paginate(10);
        } else {
            $user = User::paginate(10);
            $data = DataAset::paginate(10);
        }

        return view('admin.manajemen_aset.dataAset', compact('data','user'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = User::all();
        return view('admin.manajemen_aset.tambahDataAset');
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
            'kodeAset' => 'required|unique:data_asets',
            'kategori'  => 'required',
            'jenisBarang'  => 'required',
            'tipeBarang'  => 'required',
            'jumlahBarang'  => 'required',
            'tglBeli'  => 'required',
            'penyimpanan'  => 'required',
            'unit'  => 'required',
            'kategoriPakai' => 'required'
        ]);

        DataAset::create([
            'kodeAset' => $request-> kodeAset,
            'kategori'  => $request->kategori,
            'jenisBarang'  => $request-> jenisBarang,
            'tipeBarang'  => $request-> tipeBarang,
            'jumlahBarang'  => $request-> jumlahBarang,
            'tglBeli'  => $request-> tglBeli,
            'penyimpanan'  => $request-> penyimpanan,
            'unit'  => $request-> unit,
            'kategoriPakai'  => $request-> isInternal
        ]);

        return redirect('/ManajemenAset/DataAset')->with('success', 'Data Berhasil Ditambahkan!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataAset  $dataAset
     * @return \Illuminate\Http\Response
     */
    public function show(DataAset $dataAset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataAset  $dataAset
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aset = DataAset::find($id);
        return view('admin.manajemen_aset.ubahDataAset',['aset'=>$aset]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataAset  $dataAset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'kodeAset' => 'required',
            'kategori'  => 'required',
            'jenisBarang'  => 'required',
            'tipeBarang'  => 'required',
            'jumlahBarang'  => 'required',
            'tglBeli'  => 'required',
            'penyimpanan'  => 'required',
            'unit'  => 'required',
            'kategoriPakai' => 'required'
        ]);

        $aset = DataAset::find($id);
        $aset->id = $request-> id;
        $aset->kodeAset = $request-> kodeAset;
        $aset->kategori = $request-> kategori;
        $aset->jenisBarang  = $request-> jenisBarang;
        $aset->tipeBarang  = $request-> tipeBarang;
        $aset->jumlahBarang  = $request-> jumlahBarang;
        $aset->tglBeli  = $request-> tglBeli;
        $aset->penyimpanan  = $request-> penyimpanan;
        $aset->unit  = $request-> unit;
        $aset->isInternal  = $request-> kategoriPakai;

        $aset->save();
        
        
        return redirect('/ManajemenAset/DataAset')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataAset  $dataAset
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DataAset = DataAset::find($id);
        $DataAset->delete();
        return redirect('/ManajemenAset/DataAset');
    }


}
