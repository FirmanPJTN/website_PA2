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
        $pemusnahan = Pemusnahan::where('kodePemusnahan','LIKE',"PMNB-%")->paginate(10);
        $units = Unit::all();
        $data = DataAset::all();
    
        return view('admin.monitoring_aset.pemusnahanBerkas', compact('data','pemusnahan', 'units'));
    }

    public function indexAset()
    {
        //
        $pemusnahan = Pemusnahan::where('kodePemusnahan','LIKE',"PMNA-%")->paginate(10);
        $units = Unit::all();
        $data = DataAset::all();
    
        return view('admin.monitoring_aset.pemusnahanAset', compact('data','pemusnahan', 'units'));
    }

    public function indexBerkasApprover()
    {
        //
        $pemusnahan = Pemusnahan::where('kodePemusnahan','LIKE',"PMNB-%")->paginate(10);
        $units = Unit::all();
        $data = DataAset::all();
    
        return view('approver.persetujuan.pemusnahanBerkas', compact('data','pemusnahan', 'units'));
    }

    public function indexAsetApprover()
    {
        //
        $pemusnahan = Pemusnahan::where('kodePemusnahan','LIKE',"PMNA-%")->paginate(10);
        $units = Unit::all();
        $data = DataAset::all();
    
        return view('approver.persetujuan.pemusnahanAset', compact('data','pemusnahan', 'units'));
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
        $data = DataAset::all();
        return view('admin.monitoring_aset.tambahPemusnahanBerkas', compact('pemusnahan', 'data'));
    }

    public function createAset()
    {
        //
        $pemusnahan = Pemusnahan::all();
        $data = DataAset::all();
        return view('admin.monitoring_aset.tambahPemusnahanAset', compact('pemusnahan', 'data'));
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

        $users = User::where('role',$request->role)->get();

        foreach($users as $user)
        Pemusnahan::create([
            'kodePemusnahan'  => $request-> kodePemusnahan,
            'waktuPemusnahan'  => $request-> waktuPemusnahan,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
            'role'  => $request-> role
        ]);


        foreach($users as $user)
        Notifikasi::create([
            'deskripsi' => $request-> deskripsiNotif,
            'role' => $request->role,
            'kodePemusnahan'  => $request-> kodePemusnahan
        ]);
        

        return redirect('/MonitoringAset/PemusnahanBerkas')->with('success', 'Pemusnahan Berhasil Ditambahkan!');
    }

    public function storeAset(Request $request)
    {
        //
        $request->validate([
            'jenisBarang1'  => 'required',
            'tipeBarang1'  => 'required',
            'jumlahBarang1'  => 'required',
            'waktuPemusnahan'  => 'required',
            'deskripsi'  => 'required'
        ]);

        $users = User::where('role',$request->role)->get();

        foreach($users as $user)
        Pemusnahan::create([
            'kodePemusnahan'  => $request-> kodePemusnahan,
            'waktuPemusnahan'  => $request-> waktuPemusnahan,
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
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
            'role'  => $request-> role
        ]);


        foreach($users->take(1) as $user)
        Notifikasi::create([
            'deskripsi' => $request-> deskripsiNotif,
            'role' => $request->role,
            'kodePemusnahan'  => $request-> kodePemusnahan
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
        return view('admin.monitoring_aset.ubahPemusnahanAset', ['pemusnahan'=>$pemusnahan]);
    }

    public function editBerkas($id)
    {
        //
        $pemusnahan = Pemusnahan::find($id);
        return view('admin.monitoring_aset.ubahPemusnahanBerkas', ['pemusnahan'=>$pemusnahan]);
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
        $pemusnahan -> waktuPemusnahan = $request->waktuPemusnahan;
        $pemusnahan->deskripsi = $request->deskripsi;
        $pemusnahan->save();

        return redirect('/MonitoringAset/PemusnahanBerkas')->with('success', 'Pemusnahan Berhasil Diubah!');
    }

    public function updateAset(Request $request, $id)
    {
        //
        
        $request->validate([
            'jenisBarang1'  => 'required',
            'tipeBarang1'  => 'required',
            'jumlahBarang1'  => 'required',
            'waktuPemusnahan'  => 'required',
            'deskripsi'  => 'required'
        ]);

        $pemusnahan = Pemusnahan::find($id);
        $pemusnahan -> jenisBarang1  = $request-> jenisBarang1;
        $pemusnahan -> tipeBarang1  = $request-> tipeBarang1;
        $pemusnahan -> jumlahBarang1  = $request-> jumlahBarang1;
        $pemusnahan -> jenisBarang2  = $request-> jenisBarang2;
        $pemusnahan -> tipeBarang2  = $request-> tipeBarang2;
        $pemusnahan -> jumlahBarang2  = $request-> jumlahBarang2;
        $pemusnahan -> jenisBarang3  = $request-> jenisBarang3;
        $pemusnahan -> tipeBarang3  = $request-> tipeBarang3;
        $pemusnahan -> jumlahBarang3  = $request-> jumlahBarang3;
        $pemusnahan -> jenisBarang4  = $request-> jenisBarang4;
        $pemusnahan -> tipeBarang4  = $request-> tipeBarang4;
        $pemusnahan -> jumlahBarang4  = $request-> jumlahBarang4;
        $pemusnahan -> jenisBarang5  = $request-> jenisBarang5;
        $pemusnahan -> tipeBarang5  = $request-> tipeBarang5;
        $pemusnahan -> jumlahBarang5  = $request-> jumlahBarang5;
        $pemusnahan -> waktuPemusnahan = $request->waktuPemusnahan;
        $pemusnahan->deskripsi = $request->deskripsi;
        $pemusnahan->save();

        return redirect('/MonitoringAset/PemusnahanAset')->with('success', 'Pemusnahan Berhasil Diubah!');
    }


   

    public function tambahBuktiBerkas(Request $request, $id)
    {
        //
        
        $pemusnahan = Pemusnahan::find($id);

        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $foto = $request->file('gambar');
        $NamaFoto = time().'.'.$foto->extension();
        $foto->move(public_path('foto/pemusnahan-berkas'), $NamaFoto);

        $pemusnahan->gambar = $NamaFoto;
        $pemusnahan->save();

        return redirect('/MonitoringAset/PemusnahanBerkas')->with('success', 'Bukti Berhasil Ditambahkan!');

    }

    public function tambahBuktiAset(Request $request, $id)
    {
        //
        
        $pemusnahan = Pemusnahan::find($id);

        $validatedData = $request->validate([
            'gambarBarang1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $fotoBarang1 = $request->file('gambarBarang1');
        $NamaFotoBarang1 = time().'1'.'.'.$fotoBarang1->extension();
        $fotoBarang1->move(public_path('foto/pemusnahan-aset'), $NamaFotoBarang1);
        $pemusnahan->gambarBarang1 = $NamaFotoBarang1;

        if($request->gambarBarang2 != NULL) {
            $fotoBarang2 = $request->file('gambarBarang2');
            $NamaFotoBarang2 = time().'2'.'.'.$fotoBarang2->extension();
            $fotoBarang2->move(public_path('foto/pemusnahan-aset'), $NamaFotoBarang2);
            $pemusnahan->gambarBarang2 = $NamaFotoBarang2;
        }

        if($request->gambarBarang3!=NULL) {
            $fotoBarang3 = $request->file('gambarBarang3');
            $NamaFotoBarang3 = time().'3'.'.'.$fotoBarang3->extension();
            $fotoBarang3->move(public_path('foto/pemusnahan-aset'), $NamaFotoBarang3);
            $pemusnahan->gambarBarang3 = $NamaFotoBarang3;
        }

        if($request->gambarBarang4!=NULL) {
            $fotoBarang4 = $request->file('gambarBarang4');
            $NamaFotoBarang4 = time().'4'.'.'.$fotoBarang4->extension();
            $fotoBarang4->move(public_path('foto/pemusnahan-aset'), $NamaFotoBarang4);
            $pemusnahan->gambarBarang4 = $NamaFotoBarang4;
        }

        if($request->gambarBarang5!=NULL) {
            $fotoBarang5 = $request->file('gambarBarang5');
            $NamaFotoBarang5 = time().'5'.'.'.$fotoBarang5->extension();
            $fotoBarang5->move(public_path('foto/pemusnahan-aset'), $NamaFotoBarang5);
            $pemusnahan->gambarBarang5 = $NamaFotoBarang5;
        }

        $pemusnahan->save();

        return redirect('/MonitoringAset/PemusnahanAset')->with('success', 'Bukti Berhasil Ditambahkan!');

    }

    public function prosesPemusnahanBerkas(Request $request, $id)
    {
        //
        $users = User::where('role',$request->role)->get();

        $pemusnahan = Pemusnahan::find($id);

        if($request->get('btnSubmit') == 'tolak') {
            $pemusnahan-> status = $request->statusTolak;
        } else if($request->get('btnSubmit') == 'setuju') {
            $pemusnahan-> status = $request->statusSetuju;
        }

        $pemusnahan->alasan = $request->alasan;
        $pemusnahan->save();

        if($request->get('btnSubmit') == 'tolak') {
            foreach($users as $user) {
                Notifikasi::create([
                    'deskripsi' => $request-> deskripsiNotifTolak,
                    'role' => $user->role,
                    'status' => $user->statusNotifTolak,
                    'kodePemusnahan'  => $request-> kodePemusnahan
                ]);
            }
        } else if($request->get('btnSubmit') == 'setuju') {
            foreach($users as $user) {
                Notifikasi::create([
                    'deskripsi' => $request-> deskripsiNotifSetuju,
                    'role' => $user->role,
                    'status' => $user->statusNotifSetuju,
                    'kodePemusnahan'  => $request-> kodePemusnahan
                ]);
            }
        }
        

        return redirect(route('musnah-berkas-approver'))->with('success', 'Pemusnahan Berhasil Diproses!');
    }

    public function prosesPemusnahanAset(Request $request, $id)
    {
        //
        $users = User::where('role',$request->role)->get();

        $pemusnahan = Pemusnahan::find($id);

        if($request->get('btnSubmit') == 'tolak') {
            $pemusnahan-> status = $request->statusTolak;
        } else if($request->get('btnSubmit') == 'setuju') {
            $pemusnahan-> status = $request->statusSetuju;
        }

        $pemusnahan->alasan = $request->alasan;
        $pemusnahan->save();

        if($request->get('btnSubmit') == 'tolak') {
            foreach($users as $user) {
                Notifikasi::create([
                    'deskripsi' => $request-> deskripsiNotifTolak,
                    'role' => $user->role,
                    'status' => $user->statusNotifTolak,
                    'kodePemusnahan'  => $request-> kodePemusnahan
                ]);
            }
        } else if($request->get('btnSubmit') == 'setuju') {
            foreach($users as $user) {
                Notifikasi::create([
                    'deskripsi' => $request-> deskripsiNotifSetuju,
                    'role' => $user->role,
                    'status' => $user->statusNotifSetuju,
                    'kodePemusnahan'  => $request-> kodePemusnahan
                ]);
            }
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
