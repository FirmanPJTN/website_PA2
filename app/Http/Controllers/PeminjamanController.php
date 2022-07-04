<?php

namespace App\Http\Controllers;

use App\Models\DataAset;
use App\Models\Monitoring;
use App\Models\Peminjaman;
use App\Models\Pengadaan;
use App\Models\Notifikasi;
use app\Models\User;
use app\Models\Unit;
use Illuminate\Http\Request;


class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cari')) {

            $peminjaman = Peminjaman::where('kodePeminjaman', 'LIKE', '%' . $request->cari . '%')->paginate(10);
            $pengadaan = Pengadaan::where('kodePengadaan', 'LIKE', '%' . $request->cari . '%')->paginate(10);
            $monitoring = Monitoring::where('kodeMonitoring', 'LIKE', '%' . $request->cari . '%')->paginate(10);
            $aset = DataAset::all();
        } else {
            $peminjaman = Peminjaman::paginate(10);
            $pengadaan = Pengadaan::paginate(10);
            $monitoring = Monitoring::paginate(10);
            $aset = DataAset::all();
        }

        return view('visitor.dashboard', compact('peminjaman', 'pengadaan', 'monitoring','aset'));
    }

    public function indexVisitor()
    {
        $peminjaman = Peminjaman::paginate(10);
        $pengadaan = Pengadaan::paginate(10);
        $aset = DataAset::all();

        return view('visitor.permohonan_aset.peminjaman', compact('peminjaman', 'pengadaan', 'aset'));
    }

    public function indexPeminjaman()
    {
        $peminjaman = Peminjaman::where('status', '!=', 'tolak')->paginate(10);
        $user = User::paginate(10);
        return view('admin.manajemen_aset.peminjaman', compact('peminjaman', 'user'));
    }

    public function indexApprover()
    {
        $peminjaman = Peminjaman::paginate(10);
        $user = User::paginate(10);
        return view('approver.persetujuan.peminjamanAset', compact('peminjaman', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $pinjam = Peminjaman::all();
        $aset = DataAset::all();
        $unit = Unit::all();
        return view('visitor.permohonan_aset.peminjaman', compact('user', 'pinjam', 'aset', 'unit'));
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
            'nama'  => 'required',
            'jumlah'  => 'required',
            'tglKembali'  => 'required',
            'tujuan'  => 'required'
        ]);

        $aset = DataAset::find($request->nama);

        if ((int)$request->jumlah > (int)$aset->jumlahBarang) {
            return redirect('/visitor/PermohonanAset/PeminjamanAset')->with('warning', 'Peminjaman Melebihi Jumlah Aset!');
        } else {
            // $aset->jumlahBarang = (int)$aset->jumlahBarang - (int)$request->jumlah;

            // if($aset->jumlahBarang==0) {
            //     $aset->status = 'kosong';
            // }

            // $aset->save();

            Peminjaman::create([
                'kodePeminjaman' => $request->kodePeminjaman,
                'aset_id'  => $request->nama,
                'jumlahPinjam'  => $request->jumlah,
                'tglKembali'  => $request->tglKembali,
                'tujuan'  => $request->tujuan,
                'status'  => $request->status,
                'user_id' => $request->user_id,
                'unit_id' => $request->unit_id
            ]);

            Notifikasi::create([
                'deskripsi' => $request->deskripsiNotif,
                'role' => $request->role,
                'id_peminjaman'  => $request->kodePeminjaman,
                'status'  => $request->status,
            ]);

            return redirect('/visitor/PermohonanAset/PeminjamanAset')->with('success', 'Peminjaman Berhasil Ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjaman = Peminjaman::find($id);
        return view('visitor.permohonan_aset.ubahPeminjaman', ['peminjaman' => $peminjaman]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required',
            'jumlah'  => 'required',
            'tglKembali'  => 'required',
            'tujuan'  => 'required'
        ]);

        $aset = DataAset::find($request->nama);

        if ((int)$request->jumlah > (int)$aset->jumlahBarang) {
            return redirect('/visitor/PermohonanAset/PeminjamanAset')->with('warning', 'Peminjaman Melebihi Jumlah Aset!');
        } else {

            $peminjaman = Peminjaman::find($id);
            $peminjaman->aset_id = $request->nama;
            $peminjaman->jumlahPinjam = $request->jumlah;
            $peminjaman->tglKembali  = $request->tglKembali;
            $peminjaman->tujuan  = $request->tujuan;

            $peminjaman->save();


            return redirect('/visitor/PermohonanAset/PeminjamanAset')->with('success', 'Data Peminjaman Berhasil Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Peminjaman = Peminjaman::find($id);
        $Peminjaman->delete();
        return redirect('/visitor/PermohonanAset/PeminjamanAset');
    }

    public function destroyAdmin($id)
    {
        $Peminjaman = Peminjaman::find($id);
        $Peminjaman->delete();
        return redirect('/ManajemenAset/PeminjamanAset');
    }

    public function statusSetuju($id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->status = "setuju";
        $peminjaman->save();
        return redirect(route('pinjam-aset-approver'))->with('success', 'Peminjaman Berhasil Disetujui');
    }

    public function statusTolak($id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->status = "tolak";
        $peminjaman->save();
        return redirect(route('pinjam-aset-approver'))->with('success', 'Peminjaman Telah Ditolak');
    }

    public function prosesPengembalianPeminjaman(Request $request, $id)
    {
        $request->validate([
            'waktuPengembalian'  => 'required',
        ]);

        $peminjaman = Peminjaman::find($id);
        
        $peminjaman->status = $request->statusKembali;
        $peminjaman->waktuPengembalian = $request->waktuPengembalian;
        $peminjaman->catatan = $request->catatan;
        $peminjaman->save();

        Notifikasi::create([
            'deskripsi' => $request->deskripsiNotifKembali,
            'status' => $request->statusNotifKembali,
            'id_peminjaman'  => $request->kodePeminjaman,
            'unit_id' => $request->unit_id
        ]);

        return redirect(route('pinjam-aset-admin'))->with('success', 'Peminjaman berhasil dikembalikan');
    }



    public function prosesPeminjamanAset(Request $request, $id)
    {
        //
        $admins = User::where('role', $request->role)->get();

        $visitors = User::where('id', $request->idVisitor)->get();

        $peminjaman = Peminjaman::find($id);

        if ($request->get('btnSubmit') == 'tolak') {
            $peminjaman->status = $request->statusTolak;


        } else if ($request->get('btnSubmit') == 'setuju') {
            $peminjaman->status = $request->statusSetuju;
        }

        $peminjaman->alasan = $request->alasan;
        $peminjaman->save();

        if ($request->get('btnSubmit') == 'tolak') {
            foreach ($admins->take(1) as $admin) {
                foreach ($visitors->take(1) as $visitor)
                    Notifikasi::create([
                        'deskripsi' => $request->deskripsiNotifTolak,
                        'role' => $admin->role,
                        'status' => $admin->statusNotifTolak,
                        'kodePeminjaman'  => $request->kodePeminjaman,
                        'unit_id' => $request->unit_id
                    ]);
            }
        } else if ($request->get('btnSubmit') == 'setuju') {
            $aset = DataAset::find($request->kodeAset);

            $total = $aset->jumlahBarang - $peminjaman->jumlahPinjam;

            $aset->jumlahBarang = $total;

            if($aset->jumlahBarang==0) {
                $aset->status = 'kosong';
            }

            $aset->save();


            foreach ($admins->take(1) as $admin) {
                foreach ($visitors->take(1) as $visitor)
                    Notifikasi::create([
                        'deskripsi' => $request->deskripsiNotifSetuju,
                        'role' => $admin->role,
                        'status' => $admin->statusNotifSetuju,
                        'id_peminjaman'  => $request->kodePeminjaman,
                        'unit_id' => $request->unit_id

                    ]);
            }
        }


        return redirect(route('pinjam-aset-approver'))->with('success', 'Peminjaman Berhasil Diproses!');
    }
}
