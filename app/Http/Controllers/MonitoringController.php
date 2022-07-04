<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use app\Models\User;
use App\Models\Unit;
use App\Models\DataAset;
use App\Models\Notifikasi;
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
        $monitoring = Monitoring::paginate(10);
        $user = User::paginate(10);
        $aset = DataAset::all();
        return view('admin.monitoring_aset.monitoring', compact('monitoring', 'user','aset'));
    }

    public function indexVisitor()
    {
        $monitoring = Monitoring::paginate(10);
        $user = User::paginate(10);
        $aset = DataAset::all();
        return view('visitor.monitoring_aset.monitoring', compact('monitoring', 'user','aset'));
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
            'unit'  => 'required',
            'waktuMonitoring'  => 'required'
        ]);


        Monitoring::create([
            'kodeMonitoring'  => $request-> kodeMonitoring,
            'waktuMonitoring'  => $request-> waktuMonitoring,
            'unit_id'  => $request-> unit,
            'status'  => $request-> status,
        ]);


        Notifikasi::create([
            'deskripsi' => $request-> deskripsi,
            'unit_id' => $request->unit,
            'id_monitoring'  => $request-> kodeMonitoring,
            'status'  => $request-> status
        ]);
        

        return redirect('/MonitoringAset/PerencanaanMonitoring')->with('success', 'Monitoring Berhasil Ditambahkan!');
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
    public function edit( $id)
    {
        $monitoring = Monitoring::find($id);
        $units = Unit::all();
        $notifikasi = Notifikasi::all();
        $aset = DataAset::all();
        return view('admin.monitoring_aset.ubahMonitoring',compact('monitoring','units','notifikasi','aset'));
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
            'unit'  => 'required',
            'waktuMonitoring'  => 'required'
        ]);

        $monitoring =  Monitoring::find($id);
        $monitoring->  waktuMonitoring  = $request-> waktuMonitoring;
        $monitoring-> unit_id  = $request-> unit;
        $monitoring->save();


        $notifikasi = Notifikasi::where('id_monitoring',$monitoring-> kodeMonitoring )->first();
        $notifikasi->unit_id =  $request-> unit;
        $notifikasi->save();

        return redirect('/MonitoringAset/PerencanaanMonitoring')->with('success', 'Monitoring Berhasil Diubah!');
    }

    
    public function prosesPersetujuanMonitoring(Request $request, $id)
    {
        //

        $monitoring = Monitoring::find($id);

        if($request->get('btnSubmit') == 'tolak') {
        $monitoring->status = $request->statusTolak;
        } 
        elseif($request->get('btnSubmit') == 'setuju') {
        $monitoring->status = $request->statusSetuju;
        }
        $monitoring->deskripsi = $request->deskripsi;
        $monitoring->save();

        if($request->get('btnSubmit') == 'tolak') {
            Notifikasi::create([
                'deskripsi' => $request-> deskripsiNotifTolak,
                'status' => $request->statusNotifTolak,
                'id_monitoring'  => $request-> kodeMonitoring,
                'role' => $request->role
            ]);
        } 
        elseif($request->get('btnSubmit') == 'setuju') {
            Notifikasi::create([
                'deskripsi' => $request-> deskripsiNotifSetuju,
                'status' => $request->statusNotifSetuju,
                'id_monitoring'  => $request-> kodeMonitoring,
                'role' => $request->role
            ]);
        }


        return redirect('/visitor/MonitoringAset/')->with('success', 'Monitoring berhasil diproses!');
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
