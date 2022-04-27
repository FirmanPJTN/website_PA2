<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use app\Models\User;
use App\Models\Unit;
use App\Models\DataAset;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monitoring = Monitoring::paginate(5);
        $user = User::paginate(5);
        return view('admin.monitoring_aset.monitoring', compact('monitoring', 'user'));
    }

    public function indexVisitor()
    {
        $monitoring = Monitoring::paginate(5);
        $user = User::paginate(5);
        return view('visitor.monitoring_aset.monitoring', compact('monitoring', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $aset = DataAset::all();
        $monitoring = Monitoring::all();
        $units = Unit::all();
        return view('admin.monitoring_aset.tambahMonitoring', compact('monitoring', 'aset', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'jenisBarang1'  => 'required',
            'tipeBarang1'  => 'required',
            'jumlahBarang1'  => 'required',
            'waktuMonitoring'  => 'required',
            'unit'  => 'required'
        ]);

        Monitoring::create([
            'kodeMonitoring'  => $request-> kodeMonitoring,
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
            'waktuMonitoring'  => $request-> waktuMonitoring,
            'unit'  => $request-> unit
        ]);

        return redirect('/MonitoringAset/PerencanaanMonitoring')->with('success', 'Peminjaman Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function show(Monitoring $monitoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $monitoring = Monitoring::find($id);
        $units = Unit::all();
        return view('admin.monitoring_aset.ubahMonitoring',compact('monitoring','units'));
    }

    public function persetujuan($id)
    {
        $monitoring = Monitoring::find($id);
        return view('visitor.monitoring_aset.persetujuanMonitoring',['monitoring'=>$monitoring]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'jenisBarang1'  => 'required',
            'tipeBarang1'  => 'required',
            'jumlahBarang1'  => 'required',
            'waktuMonitoring'  => 'required',
            'unit'  => 'required'
        ]);

        $monitoring =  Monitoring::find($id);
        $monitoring-> kodeMonitoring  = $request-> kodeMonitoring;
        $monitoring-> jenisBarang1  = $request-> jenisBarang1;
        $monitoring-> tipeBarang1  = $request-> tipeBarang1;
        $monitoring-> jumlahBarang1  = $request-> jumlahBarang1;
        $monitoring-> jenisBarang2  = $request-> jenisBarang2;
        $monitoring-> tipeBarang2  = $request-> tipeBarang2;
        $monitoring-> jumlahBarang2  = $request-> jumlahBarang2;
        $monitoring-> jenisBarang3  = $request-> jenisBarang3;
        $monitoring-> tipeBarang3  = $request-> tipeBarang3;
        $monitoring-> jumlahBarang3  = $request-> jumlahBarang3;
        $monitoring-> jenisBarang4  = $request-> jenisBarang4;
        $monitoring-> tipeBarang4  = $request-> tipeBarang4;
        $monitoring-> jumlahBarang4  = $request-> jumlahBarang4;
        $monitoring-> jenisBarang5  = $request-> jenisBarang5;
        $monitoring-> tipeBarang5  = $request-> tipeBarang5;
        $monitoring-> jumlahBarang5  = $request-> jumlahBarang5;
        $monitoring->  waktuMonitoring  = $request-> waktuMonitoring;
        $monitoring-> unit  = $request-> unit;

        $monitoring->save();

        return redirect('/MonitoringAset/PerencanaanMonitoring')->with('success', 'Peminjaman Berhasil Diubah!');
    }

    public function updatePersetujuan(Request $request, $id)
    {
        //

        $monitoring =  Monitoring::find($id);
        $monitoring-> deskripsi  = $request-> deskripsi;
        $monitoring-> status  = $request-> status;

        $monitoring->save();

        return redirect('/visitor/MonitoringAset/')->with('success', 'Persetujuan Berhasil Dikirim!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $monitoring = Monitoring::find($id);
        $monitoring->delete();
        return redirect('/MonitoringAset/PerencanaanMonitoring');
    }
}
