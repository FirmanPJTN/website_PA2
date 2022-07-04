<?php

namespace App\Http\Controllers;

use App\Models\Pemusnahan;
use App\Models\DataAset;
use App\Models\Unit;
use App\Models\User;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

class PemusnahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexBerkas()
    {
        //
        $pemusnahan = Pemusnahan::where('kodePemusnahan', 'LIKE', "PMNB-%")->paginate(10);
        $units = Unit::all();
        $aset = DataAset::all();

        return view('admin.monitoring_aset.pemusnahanBerkas', compact('pemusnahan', 'units', 'aset'));
    }

    public function indexAset()
    {
        //
        $pemusnahan = Pemusnahan::where('kodePemusnahan', 'LIKE', "PMNA-%")->paginate(10);
        $units = Unit::all();
        $aset = DataAset::all();

        return view('admin.monitoring_aset.pemusnahanAset', compact('pemusnahan', 'units', 'aset'));
    }

    public function indexBerkasApprover()
    {
        //
        $pemusnahan = Pemusnahan::where('kodePemusnahan', 'LIKE', "PMNB-%")->paginate(10);
        $units = Unit::all();
        $data = DataAset::all();

        return view('approver.persetujuan.pemusnahanBerkas', compact('data', 'pemusnahan', 'units'));
    }

    public function indexAsetApprover()
    {
        //
        $pemusnahan = Pemusnahan::where('kodePemusnahan', 'LIKE', "PMNA-%")->paginate(10);
        $units = Unit::all();
        $aset = DataAset::all();

        return view('approver.persetujuan.pemusnahanAset', compact('aset', 'pemusnahan', 'units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBerkas()
    {
        //
        $pemusnahan = Pemusnahan::all();
        $aset = DataAset::all();
        return view('admin.monitoring_aset.tambahPemusnahanBerkas', compact('pemusnahan', 'aset'));
    }

    public function createAset()
    {
        //
        $pemusnahan = Pemusnahan::all();
        $aset = DataAset::all();
        return view('admin.monitoring_aset.tambahPemusnahanAset', compact('pemusnahan', 'aset'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBerkas(Request $request)
    {
        //
        $request->validate([
            'waktuPemusnahan'  => 'required',
            'deskripsi'  => 'required'
        ]);

        Pemusnahan::create([
            'kodePemusnahan'  => $request->kodePemusnahan,
            'waktuPemusnahan'  => $request->waktuPemusnahan,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi
        ]);


        Notifikasi::create([
            'deskripsi' => $request->deskripsiNotif,
            'role' => $request->role,
            'kodePemusnahan'  => $request->kodePemusnahan
        ]);


        return redirect('/MonitoringAset/PemusnahanBerkas')->with('success', 'Pemusnahan Berhasil Ditambahkan!');
    }

    public function storeAset(Request $request)
    {
        //
        $request->validate([
            'barang'  => 'required',
            'waktuPemusnahan'  => 'required',
            'deskripsi'  => 'required'
        ]);


        Pemusnahan::create([
            'kodePemusnahan'  => $request->kodePemusnahan,
            'waktuPemusnahan'  => $request->waktuPemusnahan,
            'aset_id' => $request->barang,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi
        ]);


        Notifikasi::create([
            'deskripsi' => $request->deskripsiNotif,
            'role' => $request->role,
            'id_pemusnahan'  => $request->kodePemusnahan
        ]);


        return redirect('/MonitoringAset/PemusnahanAset')->with('success', 'Pemusnahan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemusnahan  $pemusnahan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemusnahan $pemusnahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemusnahan  $pemusnahan
     * @return \Illuminate\Http\Response
     */
    public function editAset($id)
    {
        //
        $pemusnahan = Pemusnahan::find($id);
        $aset = DataAset::all();
        return view('admin.monitoring_aset.ubahPemusnahanAset', ['pemusnahan' => $pemusnahan, 'aset' => $aset]);
    }

    public function editBerkas($id)
    {
        //
        $pemusnahan = Pemusnahan::find($id);
        return view('admin.monitoring_aset.ubahPemusnahanBerkas', ['pemusnahan' => $pemusnahan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemusnahan  $pemusnahan
     * @return \Illuminate\Http\Response
     */
    public function updateBerkas(Request $request, $id)
    {
        //
        $request->validate([
            'waktuPemusnahan'  => 'required',
            'deskripsi'  => 'required'
        ]);

        $pemusnahan = Pemusnahan::find($id);
        $pemusnahan->waktuPemusnahan = $request->waktuPemusnahan;
        $pemusnahan->deskripsi = $request->deskripsi;
        $pemusnahan->save();

        return redirect('/MonitoringAset/PemusnahanBerkas')->with('success', 'Pemusnahan Berhasil Diubah!');
    }

    public function updateAset(Request $request, $id)
    {
        //

        $request->validate([
            'barang'  => 'required',
            'waktuPemusnahan'  => 'required',
            'deskripsi'  => 'required'
        ]);

        $pemusnahan = Pemusnahan::find($id);
        $pemusnahan->aset_id = $request->barang;
        $pemusnahan->waktuPemusnahan = $request->waktuPemusnahan;
        $pemusnahan->deskripsi = $request->deskripsi;
        $pemusnahan->save();

        return redirect('/MonitoringAset/PemusnahanAset')->with('success', 'Pemusnahan Berhasil Diubah!');
    }




    public function tambahBuktiBerkas(Request $request, $id)
    {
        //

        $pemusnahan = Pemusnahan::find($id);

        $request->validate([
            'bukti' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $foto = $request->file('bukti');
        $NamaFoto = time() . '.' . $foto->extension();
        $foto->move(public_path('foto/pemusnahan-berkas'), $NamaFoto);

        $pemusnahan->bukti = $NamaFoto;
        $pemusnahan->save();

        return redirect('/MonitoringAset/PemusnahanBerkas')->with('success', 'Bukti Berhasil Ditambahkan!');
    }

    public function tambahBuktiAset(Request $request, $id)
    {
        //

        $pemusnahan = Pemusnahan::find($id);

        $request->validate([
            'bukti' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $fotoBarang = $request->file('bukti');
        $NamaFotoBarang = time() . '.' . $fotoBarang->extension();
        $fotoBarang->move(public_path('foto/pemusnahan-aset'), $NamaFotoBarang);
        $pemusnahan->bukti = $NamaFotoBarang;
        $pemusnahan->save();

        return redirect('/MonitoringAset/PemusnahanAset')->with('success', 'Bukti Berhasil Ditambahkan!');
    }

    public function prosesPemusnahanBerkas(Request $request, $id)
    {
        $pemusnahan = Pemusnahan::find($id);

        if ($request->get('btnSubmit') == 'tolak') {
            $pemusnahan->status = $request->statusTolak;
        } else if ($request->get('btnSubmit') == 'setuju') {
            $pemusnahan->status = $request->statusSetuju;
        }

        $pemusnahan->alasan = $request->alasan;
        $pemusnahan->save();

        if ($request->get('btnSubmit') == 'tolak') {
            Notifikasi::create([
                'deskripsi' => $request->deskripsiNotifTolak,
                'role' => $request->role,
                'status' => $request->statusNotifTolak,
                'id_pemusnahan'  => $request->kodePemusnahan
            ]);
        } else if ($request->get('btnSubmit') == 'setuju') {
            Notifikasi::create([
                'deskripsi' => $request->deskripsiNotifSetuju,
                'role' => $request->role,
                'status' => $request->statusNotifSetuju,
                'id_pemusnahan'  => $request->kodePemusnahan
            ]);
        }


        return redirect(route('musnah-berkas-approver'))->with('success', 'Pemusnahan Berhasil Diproses!');
    }

    public function prosesPemusnahanAset(Request $request, $id)
    {

        $pemusnahan = Pemusnahan::find($id);

        if ($request->get('btnSubmit') == 'tolak') {
            $pemusnahan->status = $request->statusTolak;
        } else if ($request->get('btnSubmit') == 'setuju') {
            $pemusnahan->status = $request->statusSetuju;
        }
        $pemusnahan->alasan = $request->alasan;
        $pemusnahan->save();

        if ($request->get('btnSubmit') == 'tolak') {
            Notifikasi::create([
                'deskripsi' => $request->deskripsiNotifTolak,
                'role' => $request->role,
                'status' => $request->statusNotifTolak,
                'id_pemusnahan'  => $request->kodePemusnahan
            ]);
        } else if ($request->get('btnSubmit') == 'setuju') {

            Notifikasi::create([
                'deskripsi' => $request->deskripsiNotifSetuju,
                'role' => $request->role,
                'status' => $request->statusNotifSetuju,
                'id_pemusnahan'  => $request->kodePemusnahan
            ]);
        }


        return redirect(route('musnah-aset-approver'))->with('success', 'Pemusnahan Berhasil Diproses!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemusnahan  $pemusnahan
     * @return \Illuminate\Http\Response
     */
    public function destroyAset($id)
    {
        //
        $pemusnahan = Pemusnahan::find($id);
        $pemusnahan->delete();
        return redirect('/MonitoringAset/PemusnahanAset');
    }

    public function destroyBerkas($id)
    {
        //
        $pemusnahan = Pemusnahan::find($id);
        $pemusnahan->delete();
        return redirect('/MonitoringAset/PemusnahanBerkas');
    }
}
