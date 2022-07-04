<?php

namespace App\Http\Controllers;

use App\Models\DataAset;
use App\Models\Unit;
use App\Models\Kategori;
use App\Models\Gedung;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Exports\AsetExport;
use Alert;

class ControllerDataAset extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAPI() {
        $unit = Unit::all();
        $kategori = Kategori::all();
        $aset = DataAset::all();
        return response()->json(
            [   'unit' => $unit->values()->toArray(),
                'kategori' => $kategori->values()->toArray(),
                'aset' => $aset->values()->toArray()
            ],200
        );
    }

    public function index(Request $request)
    {
        if($request->has('cari')) {
            $data = DataAset::where('kodeAset', 'LIKE','%'.$request->cari.'%')
            ->orWhere('kodeAset', 'LIKE','%'.$request->cari.'%')
            ->orWhere('jenisBarang', 'LIKE','%'.$request->cari.'%')
            ->orWhere('tipeBarang', 'LIKE','%'.$request->cari.'%')
            ->orWhere('tglBeli', 'LIKE','%'.$request->cari.'%')
            ->orWhere('penyimpanan', 'LIKE','%'.$request->cari.'%')
            ->paginate(10);
            $units = Unit::all();
            $kategoris = Kategori::all();
            $user = User::paginate(10);
        } elseif($request->has('filterUnit') AND $request->has('filterKategori')) {
            $data = DataAset::where('unit_id', 'LIKE',$request->filterUnit)
            ->where('kategori_id', 'LIKE',$request->filterKategori)
            ->paginate(10);
            $units = Unit::all();
            $kategoris = Kategori::all();
            $user = User::paginate(10);
        } elseif($request->has('filterKategori')) {
            $data = DataAset::where('kategori_id', 'LIKE',$request->filterKategori)
            ->paginate(10);
            $units = Unit::all();
            $kategoris = Kategori::all();
            $user = User::paginate(10);
        } elseif($request->has('filterUnit')) {
            $data = DataAset::where('unit_id', $request->filterUnit)
            ->paginate(10);
            $units = Unit::all();
            $kategoris = Kategori::all();
            $user = User::paginate(10);
        } else {
            $user = User::paginate(10);
            $units = Unit::all();
            $kategoris = Kategori::all();
            $data = DataAset::paginate(10);
        }

        return view('admin.manajemen_aset.dataAset', compact('data','user', 'units', 'kategoris'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $asets = DataAset::all();
        $units = Unit::all();
        $kategori = Kategori::all();
        $gedung = Gedung::all();
        return view('admin.manajemen_aset.tambahDataAset', compact('asets', 'units','kategori','gedung'));
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
            'kategori'  => 'required',
            'jenisBarang'  => 'required',
            'tipeBarang'  => 'required',
            'jumlahBarang'  => 'required',
            'tglBeli'  => 'required',
            'penyimpanan'  => 'required',
            'unit'  => 'required',
            'gedung'  => 'required',
            'kategoriPakai' => 'required'
        ]);

       

        DataAset::create([
            'kodeAset' => $request-> kodeAset,
            'kategori_id'  => $request->kategori,
            'jenisBarang'  => $request-> jenisBarang,
            'tipeBarang'  => $request-> tipeBarang,
            'jumlahBarang'  => $request-> jumlahBarang,
            'tglBeli'  => $request-> tglBeli,
            'penyimpanan'  => $request-> penyimpanan,
            'unit_id'  => $request-> unit,
            'gedung_id'  => $request-> gedung,
            'isInternal'  => $request-> kategoriPakai
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
        $units = Unit::all();
        $kategori = Kategori::all();
        $gedung = Gedung::all();
        $user = User::all();
        return view('admin.manajemen_aset.ubahDataAset',compact('aset','units', 'user','kategori','gedung'));
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
            'kategori'  => 'required',
            'jenisBarang'  => 'required',
            'tipeBarang'  => 'required',
            'jumlahBarang'  => 'required',
            'tglBeli'  => 'required',
            'penyimpanan'  => 'required',
            'unit'  => 'required',
            'gedung'  => 'required',
            'kategoriPakai' => 'required'
        ]);

        $aset = DataAset::find($id);
        $aset->kategori_id = $request-> kategori;
        $aset->jenisBarang  = $request-> jenisBarang;
        $aset->tipeBarang  = $request-> tipeBarang;
        $aset->jumlahBarang  = $request-> jumlahBarang;
        $aset->tglBeli  = $request-> tglBeli;
        $aset->penyimpanan  = $request-> penyimpanan;
        $aset->unit_id  = $request-> unit;
        $aset->gedung_id  = $request-> gedung;
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

    public function export() 
    {
        return Excel::download(new AsetExport, 'data-aset.'.Carbon::now().'.xlsx');
    }


}
