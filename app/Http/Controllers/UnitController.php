<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use App\Models\DataAset;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unit::paginate(10);
        return view('admin.kelola_pengguna.kelolaUnit', ['unit'=>$unit]);
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
            'unit'  => 'required'
        ]);

        Unit::create([
            'nama'  => $request-> unit
        ]);

        return redirect(route('kelola-unit'))->with('success', 'Unit Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'unit'  => 'required'
        ]);

        $unit = Unit::find($id);
        $unit->nama = $request-> unit;

        $unit->save();
        
        
        return redirect(route('kelola-unit'))->with('success', 'Unit Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Unit = Unit::find($id);

        $DataAset = DataAset::where('unit_id',$id)->count();
        $User = User::where('unit_id',$id)->count();

        if($DataAset != 0 || $User != 0) {
            return redirect(route('kelola-unit'))->with('warning', 'Data Gagal Dihapus, Data Unit Sedang Digunakan!');
        } else {
            $Unit->delete();
            return redirect(route('kelola-unit'));
        }

    }
}
