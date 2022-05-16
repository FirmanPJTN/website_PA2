<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Models\Pembelian;
use App\Models\Peminjaman;
use App\Models\Pemusnahan;
use app\Models\User;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengadaan = Pengadaan::paginate(5);
        return view('visitor.dashboard', ['pengadaan'=>$pengadaan]);
    }

    public function indexPengadaan()
    {
        $pengadaan = Pengadaan::paginate(10);
        $pembelian = Pembelian::paginate(10);
        return view('admin.manajemen_aset.pengadaan', compact('pengadaan','pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visitor.permohonan_aset.pengadaan');
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
            'alasan'  => 'required',
            'kategori' => 'required'
        ]);

        Pengadaan::create([
            'kodePengadaan'  => $request-> kodePengadaan,
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
            'alasan'  => $request-> alasan,
            'status'  => $request-> status,
            'kategori'  => $request-> kategori,
            'user_id'  => $request-> user_id,
        ]);

        Notifikasi::create([
            'kodePengadaan'  => $request-> kodePengadaan,
            'deskripsi' => $request-> deskripsiNotif,
            'status' => $request->status,
            'role' => $request->role
        ]);


        return redirect('/visitor/dashboard')->with('success', 'Pengadaan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengadaan $pengadaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengadaan = Pengadaan::find($id);
        return view('visitor.permohonan_aset.ubahPengadaan',['pengadaan'=>$pengadaan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenisBarang1'  => 'required',
            'tipeBarang1'  => 'required',
            'jumlahBarang1'  => 'required',
            'alasan'  => 'required'
        ]);

        $pengadaan = Pengadaan::find($id);
        $pengadaan->id = $request-> id;
        $pengadaan->jenisBarang1 = $request-> jenisBarang1;
        $pengadaan->tipeBarang1 = $request-> tipeBarang1;
        $pengadaan->jumlahBarang1  = $request-> jumlahBarang1;
        $pengadaan->jenisBarang2 = $request-> jenisBarang2;
        $pengadaan->tipeBarang2 = $request-> tipeBarang2;
        $pengadaan->jumlahBarang2  = $request-> jumlahBarang2;
        $pengadaan->jenisBarang3 = $request-> jenisBarang3;
        $pengadaan->tipeBarang3 = $request-> tipeBarang3;
        $pengadaan->jumlahBarang3  = $request-> jumlahBarang3;
        $pengadaan->jenisBarang4 = $request-> jenisBarang4;
        $pengadaan->tipeBarang4 = $request-> tipeBarang4;
        $pengadaan->jumlahBarang4  = $request-> jumlahBarang4;
        $pengadaan->jenisBarang5 = $request-> jenisBarang5;
        $pengadaan->tipeBarang5 = $request-> tipeBarang5;
        $pengadaan->jumlahBarang5  = $request-> jumlahBarang5;
        $pengadaan->alasan  = $request-> alasan;

        $pengadaan->save();
        
        
        return redirect('/visitor/dashboard')->with('success', 'Data Pengadaan Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Pengadaan = Pengadaan::find($id);
        $Pengadaan->delete();
        return redirect('/visitor/dashboard');
    }

    public function destroyAdmin($id)
    {
        $Pengadaan = Pengadaan::find($id);
        $Pengadaan->delete();
        return redirect('/ManajemenAset/PengadaanAset');
    }

    public function statusSetuju($id) 
    {
        $pengadaan = Pengadaan::find($id);
        $pengadaan->status = "setuju";
        $pengadaan->save();
        return redirect('/ManajemenAset/PengadaanAset')->with('success', 'Pengadaan Berhasil Disetujui');
    }

    public function statusTolak($id) 
    {
        $pengadaan = Pengadaan::find($id);
        $pengadaan->status = "tolak";
        $pengadaan->save();
        return redirect('/ManajemenAset/PengadaanAset')->with('success', 'Pengadaan Telah Ditolak');
    }


    public function prosesPengadaanPembelian(Request $request, $id)
    {
        $request->validate([
            'jenisBarang1'  => 'required',
            'tipeBarang1'  => 'required',
            'jumlahBarang1'  => 'required',
            'dokumenPR' => 'required|mimes:doc,docx,pdf,xls,xlsx,pdf',
        ]);

        $pengadaan = Pengadaan::find($id);
        $pengadaan->status = $request-> statusProsesSetuju;
        $pengadaan->save();


        $dokumen = $request->file('dokumenPR');
        $nama_dokumen = 'PR'.date('Ymdhis').'.'.$request->file('dokumenPR')->getClientOriginalExtension();
        $dokumen->move('dokumen/PR/',$nama_dokumen);

        Pembelian::create([
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
            'role' => $request->role,
            'pengadaan_id' => $request->pengadaan_id,
            'status' => $request->statusProsesPR,
            'deskripsi' => $request->deskripsi,
            'dokumenPR' => $nama_dokumen
    ]);
        
        Notifikasi::create([
            'kodePengadaan'  => $request-> kodePengadaan,
            'deskripsi' => $request-> deskripsiProsesSetuju,
            'status' => $request->statusProsesPR,
            'role' => $request->role
        ]);

        
        return redirect('/ManajemenAset/PengadaanAset')->with('success', 'Pengadaan Berhasil Diproses!');
    }


    public function prosesPR(Request $request, $id) {
        $request->validate([
            'jenisBarang1'  => 'required',
            'tipeBarang1'  => 'required',
            'jumlahBarang1'  => 'required',
            'dokumenPR' => 'required|mimes:doc,docx,pdf,xls,xlsx,pdf',
        ]);

        $pengadaan = Pengadaan::find($id);
        $pengadaan->status = $request-> statusProsesPR;
        $pengadaan->save();


        $dokumen = $request->file('dokumenPR');
        $nama_dokumen = 'PR'.date('Ymdhis').'.'.$request->file('dokumenPR')->getClientOriginalExtension();
        $dokumen->move('dokumen/PR/',$nama_dokumen);

        Pembelian::create([
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
            'role' => $request->role,
            'pengadaan_id' => $request->pengadaan_id,
            'status' => $request->statusProsesPR,
            'deskripsi' => $request->deskripsi,
            'dokumenPR' => $nama_dokumen
        ]);
        
        Notifikasi::create([
            'kodePengadaan'  => $request-> kodePengadaan,
            'deskripsi' => $request-> deskripsiProsesPR,
            'status' => $request->statusProsesPR,
            'role' => $request->role
        ]);

        
        return redirect('/ManajemenAset/PengadaanAset')->with('success', 'Product Request Berhasil Diproses!');
    }

    public function prosesPO(Request $request, $id) {
        $request->validate([
            'dokumenPO' => 'required|mimes:doc,docx,pdf,xls,xlsx,pdf',
        ]);

        $pengadaan = Pengadaan::find($id);
        $pengadaan->status = $request-> statusProsesPO;
        $pengadaan->save();


        $dokumen = $request->file('dokumenPO');
        $nama_dokumen = 'PO'.date('Ymdhis').'.'.$request->file('dokumenPO')->getClientOriginalExtension();
        $dokumen->move('dokumen/PO/',$nama_dokumen);

        $pembelian = Pembelian::where('pengadaan_id',$request->pengadaan_id)->first();
        $pembelian->status = $request->statusProsesPO;
        $pembelian->deskripsi2 = $request->deskripsi2;
        $pembelian->dokumenPO = $nama_dokumen;
        $pembelian->save();
        
        Notifikasi::create([
            'kodePengadaan'  => $request-> kodePengadaan,
            'deskripsi' => $request-> deskripsiProsesPO,
            'status' => $request->statusProsesPO,
            'role' => $request->role
        ]);

        
        return redirect('/ManajemenAset/PengadaanAset')->with('success', 'Product Order Berhasil Diproses!');
    }

    public function dashboardApprover()
    {
        $peminjaman = Peminjaman::paginate(5);
        $pengadaan = Pengadaan::paginate(5);
        $pemusnahan = Pemusnahan::paginate(5);
        $pembelian = Pembelian::paginate(5);

        return view('approver.dashboard', compact('peminjaman', 'pengadaan','pemusnahan','pembelian'));
    }

    public function dashboardTransactor()
    {
        $pengadaan = Pengadaan::paginate(5);
        $pembelian = Pembelian::paginate(5);

        return view('transactor.dashboard', compact('pengadaan','pembelian'));
    }

    public function dashboardAdmin()
    {
        $peminjaman = Peminjaman::paginate(5);
        $pengadaan = Pengadaan::paginate(5);
        $monitoring = Monitoring::paginate(5);
        $pemusnahan = Pemusnahan::paginate(5);

        return view('admin.dashboard', compact('peminjaman', 'pengadaan','monitoring', 'pemusnahan'));
    }
}
