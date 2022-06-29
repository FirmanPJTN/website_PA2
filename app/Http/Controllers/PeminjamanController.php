<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Models\Peminjaman;
use App\Models\Pengadaan;
use Illuminate\Http\Request;
use App\Models\Notifikasi;
use app\Models\User;

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

            $peminjaman = Peminjaman::where('kodePeminjaman','LIKE', '%' . $request->cari . '%')->orWhere('jenisBarang1','LIKE', '%' . $request->cari . '%')->orWhere('tipeBarang1','LIKE', '%' . $request->cari . '%')->orWhere('jumlahBarang1','LIKE', '%' . $request->cari . '%')->paginate(10);
            $pengadaan = Pengadaan::where('kodePengadaan','LIKE', '%' . $request->cari . '%')->orWhere('jenisBarang1','LIKE', '%' . $request->cari . '%')->orWhere('tipeBarang1','LIKE', '%' . $request->cari . '%')->orWhere('jumlahBarang1','LIKE', '%' . $request->cari . '%')->paginate(10);
            $monitoring = Monitoring::where('kodeMonitoring', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        } else {
            $peminjaman = Peminjaman::paginate(10);
            $pengadaan = Pengadaan::paginate(10);
            $monitoring = Monitoring::paginate(10);
        }

        return view('visitor.dashboard', compact('peminjaman', 'pengadaan', 'monitoring'));
    }

    public function indexVisitor()
    {
        $peminjaman = Peminjaman::paginate(10);
        $pengadaan = Pengadaan::paginate(10);

        return view('visitor.permohonan_aset.peminjaman', compact('peminjaman', 'pengadaan'));
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
        return view('visitor.permohonan_aset.peminjaman', compact('user', 'pinjam'));
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
            'jenisBarang1'  => 'required',
            'tipeBarang1'  => 'required',
            'jumlahBarang1'  => 'required',
            'tglKembali'  => 'required',
            'tujuan'  => 'required'
        ]);

        $users = User::where('role', $request->role)->get();

        Peminjaman::create([
            'kodePeminjaman'  => $request->kodePeminjaman,
            'jenisBarang1'  => $request->jenisBarang1,
            'tipeBarang1'  => $request->tipeBarang1,
            'jumlahBarang1'  => $request->jumlahBarang1,
            'jenisBarang2'  => $request->jenisBarang2,
            'tipeBarang2'  => $request->tipeBarang2,
            'jumlahBarang2'  => $request->jumlahBarang2,
            'jenisBarang3'  => $request->jenisBarang3,
            'tipeBarang3'  => $request->tipeBarang3,
            'jumlahBarang3'  => $request->jumlahBarang3,
            'jenisBarang4'  => $request->jenisBarang4,
            'tipeBarang4'  => $request->tipeBarang4,
            'jumlahBarang4'  => $request->jumlahBarang4,
            'jenisBarang5'  => $request->jenisBarang5,
            'tipeBarang5'  => $request->tipeBarang5,
            'jumlahBarang5'  => $request->jumlahBarang5,
            'tglKembali'  => $request->tglKembali,
            'tujuan'  => $request->tujuan,
            'status'  => $request->status,
            'user_id' => $request->user_id,
            'unit_id' => $request->unit_id
        ]);


        foreach ($users->take(1) as $user) {
            Notifikasi::create([
                'deskripsi' => $request->deskripsiNotif,
                'role' => $user->role,
                'kodePeminjaman'  => $request->kodePeminjaman
            ]);
        }

        return redirect('/visitor/PermohonanAset/PeminjamanAset')->with('success', 'Peminjaman Berhasil Ditambahkan!');
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
            'jenisBarang1'  => 'required',
            'tipeBarang1'  => 'required',
            'jumlahBarang1'  => 'required',
            'tglKembali'  => 'required',
            'tujuan'  => 'required'
        ]);

        $peminjaman = Peminjaman::find($id);
        $peminjaman->id = $request->id;
        $peminjaman->jenisBarang1 = $request->jenisBarang1;
        $peminjaman->tipeBarang1 = $request->tipeBarang1;
        $peminjaman->jumlahBarang1  = $request->jumlahBarang1;
        $peminjaman->jenisBarang2 = $request->jenisBarang2;
        $peminjaman->tipeBarang2 = $request->tipeBarang2;
        $peminjaman->jumlahBarang2  = $request->jumlahBarang2;
        $peminjaman->jenisBarang3 = $request->jenisBarang3;
        $peminjaman->tipeBarang3 = $request->tipeBarang3;
        $peminjaman->jumlahBarang3  = $request->jumlahBarang3;
        $peminjaman->jenisBarang4 = $request->jenisBarang4;
        $peminjaman->tipeBarang4 = $request->tipeBarang4;
        $peminjaman->jumlahBarang4  = $request->jumlahBarang4;
        $peminjaman->jenisBarang5 = $request->jenisBarang5;
        $peminjaman->tipeBarang5 = $request->tipeBarang5;
        $peminjaman->jumlahBarang5  = $request->jumlahBarang5;
        $peminjaman->tglKembali  = $request->tglKembali;
        $peminjaman->tujuan  = $request->tujuan;

        $peminjaman->save();


        return redirect('/visitor/PermohonanAset/PeminjamanAset')->with('success', 'Data Peminjaman Berhasil Diubah!');
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

        $visitors = User::where('id', $request->idVisitor)->get();

        $peminjaman->status = $request->statusKembali;
        $peminjaman->waktuPengembalian = $request->waktuPengembalian;
        $peminjaman->catatan = $request->catatan;
        $peminjaman->save();

        Notifikasi::create([
            'deskripsi' => $request->deskripsiNotifKembali,
            'status' => $request->statusNotifKembali,
            'kodePeminjaman'  => $request->kodePeminjaman,
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
            foreach ($admins->take(1) as $admin) {

                foreach ($visitors->take(1) as $visitor)
                    Notifikasi::create([
                        'deskripsi' => $request->deskripsiNotifSetuju,
                        'role' => $admin->role,
                        'status' => $admin->statusNotifSetuju,
                        'kodePeminjaman'  => $request->kodePeminjaman,
                        'unit_id' => $request->unit_id

                    ]);
            }
        }


        return redirect(route('pinjam-aset-approver'))->with('success', 'Peminjaman Berhasil Diproses!');
    }
}
