<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Models\Pembelian;
use App\Models\Peminjaman;
use App\Models\Pemusnahan;
use App\Models\Monitoring;
use App\Models\DataAset;
use App\Models\Unit;
use App\Charts\AsetChart;
use app\Models\User;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use PDF;
use App\Exports\AsetExport;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengadaan = Pengadaan::paginate(10);
        $peminjaman = Peminjaman::paginate(10);
        return view('visitor.permohonan_aset.pengadaan', compact('peminjaman', 'pengadaan'));
    }

    public function indexPengadaan()
    {
        $pengadaan = Pengadaan::paginate(10);
        $pembelian = Pembelian::paginate(10);
        return view('admin.manajemen_aset.pengadaan', compact('pengadaan', 'pembelian'));
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

        if ($request->kategori == 'eksternal') {
            Pengadaan::create([
                'kodePengadaan'  => $request->kodePengadaanEks,
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
                'alasan'  => $request->alasan,
                'status'  => $request->status,
                'kategori'  => $request->kategori,
                'user_id'  => $request->user_id,
                'unit_id'  => $request->unit_id
            ]);

            Notifikasi::create([
                'kodePengadaan'  => $request->kodePengadaanEks,
                'deskripsi' => $request->deskripsiNotifEks,
                'status' => $request->status,
                'role' => $request->role
            ]);
        } else {
            Pengadaan::create([
                'kodePengadaan'  => $request->kodePengadaanIn,
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
                'alasan'  => $request->alasan,
                'status'  => $request->status,
                'kategori'  => $request->kategori,
                'user_id'  => $request->user_id,
                'unit_id'  => $request->unit_id
            ]);


            Notifikasi::create([
                'kodePengadaan'  => $request->kodePengadaanIn,
                'deskripsi' => $request->deskripsiNotifIn,
                'status' => $request->status,
                'role' => $request->role
            ]);
        }



        return redirect('/visitor/PermohonanAset/PengadaanAset')->with('success', 'Pengadaan Berhasil Ditambahkan!');
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
        return view('visitor.permohonan_aset.ubahPengadaan', ['pengadaan' => $pengadaan]);
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
        $pengadaan->id = $request->id;
        $pengadaan->jenisBarang1 = $request->jenisBarang1;
        $pengadaan->tipeBarang1 = $request->tipeBarang1;
        $pengadaan->jumlahBarang1  = $request->jumlahBarang1;
        $pengadaan->jenisBarang2 = $request->jenisBarang2;
        $pengadaan->tipeBarang2 = $request->tipeBarang2;
        $pengadaan->jumlahBarang2  = $request->jumlahBarang2;
        $pengadaan->jenisBarang3 = $request->jenisBarang3;
        $pengadaan->tipeBarang3 = $request->tipeBarang3;
        $pengadaan->jumlahBarang3  = $request->jumlahBarang3;
        $pengadaan->jenisBarang4 = $request->jenisBarang4;
        $pengadaan->tipeBarang4 = $request->tipeBarang4;
        $pengadaan->jumlahBarang4  = $request->jumlahBarang4;
        $pengadaan->jenisBarang5 = $request->jenisBarang5;
        $pengadaan->tipeBarang5 = $request->tipeBarang5;
        $pengadaan->jumlahBarang5  = $request->jumlahBarang5;
        $pengadaan->alasan  = $request->alasan;

        $pengadaan->save();


        return redirect('/visitor/PermohonanAset/PengadaanAset')->with('success', 'Data Pengadaan Berhasil Diubah!');
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
        return redirect('/visitor/PermohonanAset/PengadaanAset');
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
        $pengadaan->status = $request->statusProsesSetuju;
        $pengadaan->save();


        $dokumen = $request->file('dokumenPR');
        $nama_dokumen = 'PR' . date('Ymdhis') . '.' . $request->file('dokumenPR')->getClientOriginalExtension();
        $dokumen->move('dokumen/PR/', $nama_dokumen);

        Pembelian::create([
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
            'role' => $request->role,
            'pengadaan_id' => $request->pengadaan_id,
            'status' => $request->statusProsesPR,
            'deskripsi' => $request->deskripsi,
            'dokumenPR' => $nama_dokumen
        ]);

        Notifikasi::create([
            'kodePengadaan'  => $request->kodePengadaan,
            'deskripsi' => $request->deskripsiProsesSetuju,
            'status' => $request->statusProsesPR,
            'role' => $request->role
        ]);


        return redirect('/ManajemenAset/PengadaanAset')->with('success', 'Pengadaan Berhasil Diproses!');
    }


    public function prosesPR(Request $request, $id)
    {
        $request->validate([
            'jenisBarang1'  => 'required',
            'tipeBarang1'  => 'required',
            'jumlahBarang1'  => 'required',
            'dokumenPR' => 'required|mimes:doc,docx,pdf,xls,xlsx,pdf',
        ]);

        $pengadaan = Pengadaan::find($id);
        $pengadaan->status = $request->statusProsesPR;
        $pengadaan->save();


        $dokumen = $request->file('dokumenPR');
        $nama_dokumen = 'PR' . date('Ymdhis') . '.' . $request->file('dokumenPR')->getClientOriginalExtension();
        $dokumen->move('dokumen/PR/', $nama_dokumen);

        Pembelian::create([
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
            'role' => $request->role,
            'pengadaan_id' => $request->pengadaan_id,
            'status' => $request->statusProsesPR,
            'deskripsi' => $request->deskripsi,
            'dokumenPR' => $nama_dokumen
        ]);

        Notifikasi::create([
            'kodePengadaan'  => $request->kodePengadaan,
            'deskripsi' => $request->deskripsiProsesPR,
            'status' => $request->statusProsesPR,
            'role' => $request->role
        ]);


        return redirect('/ManajemenAset/PengadaanAset')->with('success', 'Product Request Berhasil Diproses!');
    }

    public function prosesPO(Request $request, $id)
    {
        $request->validate([
            'dokumenPO' => 'required|mimes:doc,docx,pdf,xls,xlsx,pdf',
        ]);

        $pengadaan = Pengadaan::find($id);
        $pengadaan->status = $request->statusProsesPO;
        $pengadaan->save();


        $dokumen = $request->file('dokumenPO');
        $nama_dokumen = 'PO' . date('Ymdhis') . '.' . $request->file('dokumenPO')->getClientOriginalExtension();
        $dokumen->move('dokumen/PO/', $nama_dokumen);

        $pembelian = Pembelian::where('pengadaan_id', $request->pengadaan_id)->first();
        $pembelian->status = $request->statusProsesPO;
        $pembelian->deskripsi2 = $request->deskripsi2;
        $pembelian->dokumenPO = $nama_dokumen;
        $pembelian->save();

        Notifikasi::create([
            'kodePengadaan'  => $request->kodePengadaan,
            'deskripsi' => $request->deskripsiProsesPO,
            'status' => $request->statusProsesPO,
            'role' => $request->role
        ]);


        return redirect('/ManajemenAset/PengadaanAset')->with('success', 'Product Order Berhasil Diproses!');
    }

    public function dashboardApprover()
    {
        $peminjaman = Peminjaman::paginate(10);
        $pengadaan = Pengadaan::paginate(10);
        $pemusnahan = Pemusnahan::paginate(10);
        $pembelian = Pembelian::paginate(10);

        return view('approver.dashboard', compact('peminjaman', 'pengadaan', 'pemusnahan', 'pembelian'));
    }

    public function dashboardTransactor()
    {
        $pengadaan = Pengadaan::paginate(10);
        $pembelian = Pembelian::paginate(10);

        return view('transactor.dashboard', compact('pengadaan', 'pembelian'));
    }

    public function dashboardAdmin()
    {
        $aset = DataAset::all();
        $peminjaman = Peminjaman::all();
        $pengadaan = Pengadaan::all();
        $monitoring = Monitoring::all();
        $pemusnahan = Pemusnahan::all();

        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)",
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)",
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",

        ];

        $gd1 = DataAset::where('gedung', 'Gedung 1')->count();
        $gd2 = DataAset::where('gedung', 'Gedung 2')->count();
        $gd3 = DataAset::where('gedung', 'Gedung 3')->count();
        $gd4 = DataAset::where('gedung', 'Gedung 4')->count();
        $gd56 = DataAset::where('gedung', 'Gedung 5 dan 6')->count();
        $gd7 = DataAset::where('gedung', 'Gedung 7')->count();
        $gd8 = DataAset::where('gedung', 'Gedung 8')->count();
        $gd9 = DataAset::where('gedung', 'Gedung 9')->count();
        $gdek = DataAset::where('gedung', 'Gedung Ex Koperasi')->count();
        $gdb = DataAset::where('gedung', 'Gedung Besar (Utama)')->count();
        $gdc = DataAset::where('gedung', 'Container Park')->count();
        $gda = DataAset::where('gedung', 'Asrama Perpustakaan')->count();


        $asetChart = new AsetChart;
        $asetChart->labels(['Gedung 1', 'Gedung 2', 'Gedung 3', 'Gedung 4', 'Gedung 5 dan 6', 'Gedung 7', 'Gedung 8', 'Gedung 9', 'Gedung Ex Koperasi', 'Gedung Besar (Utama)', 'Container Park', 'Asrama Perpustakaan']);
        $asetChart->dataset('Statistik', 'bar', [$gd1, $gd2, $gd3, $gd4, $gd56, $gd7, $gd8, $gd9, $gdek, $gdb, $gdc, $gda])
            ->color($borderColors)
            ->backgroundcolor($fillColors);




        $jan = DataAset::whereMonth('created_at', '01')->count();
        $feb = DataAset::whereMonth('created_at', '02')->count();
        $mar = DataAset::whereMonth('created_at', '03')->count();
        $apr = DataAset::whereMonth('created_at', '04')->count();
        $may = DataAset::whereMonth('created_at', '05')->count();
        $jun = DataAset::whereMonth('created_at', '06')->count();
        $jul = DataAset::whereMonth('created_at', '07')->count();
        $aug = DataAset::whereMonth('created_at', '08')->count();
        $sep = DataAset::whereMonth('created_at', '09')->count();
        $oct = DataAset::whereMonth('created_at', '10')->count();
        $nov = DataAset::whereMonth('created_at', '11')->count();
        $des = DataAset::whereMonth('created_at', '12')->count();

        $asetChart2 = new AsetChart;
        $asetChart2->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']);
        $asetChart2->dataset('Statistik', 'line', [$jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $des])
            ->color($borderColors)
            ->backgroundcolor("rgb(255, 99, 132)")
            ->fill(false)
            ->linetension(0.1);



        $admin = User::where('role', 'administrator')->count();
        $visitor = User::where('role', 'visitor')->count();
        $approver = User::where('role', 'approver')->count();
        $transactor = User::where('role', 'transactor')->count();

        $userChart = new AsetChart;
        $userChart->labels(['Administrator', 'Visitor', 'Approver', 'Transactor']);
        $userChart->dataset('', 'doughnut', [$admin, $visitor, $approver, $transactor])
            ->color($borderColors)
            ->backgroundcolor($fillColors);



        return view('admin.dashboard', compact('peminjaman', 'pengadaan', 'monitoring', 'pemusnahan', 'aset', 'asetChart', 'asetChart2', 'userChart'));
    }

    public function exportLaporan(Request $request)
    {
        $request->validate([
            'bulan'  => 'required|in:01,02,03,04,05,06,07,08,09,10,11,12'
        ]);

        $units = Unit::all();
        $data = DataAset::whereMonth('created_at', $request->bulan)->get();
        $peminjaman = Peminjaman::whereMonth('created_at', $request->bulan)->get();
        $pengadaan = Pengadaan::whereMonth('created_at', $request->bulan)->get();
        $monitoring = Monitoring::whereMonth('created_at', $request->bulan)->get();
        $pemusnahan = Pemusnahan::whereMonth('created_at', $request->bulan)->get();
        $pembelian = Pembelian::whereMonth('created_at', $request->bulan)->get();

        $pdf = PDF::loadView('admin.laporan_berkala.laporan', compact('data', 'units', 'peminjaman', 'pengadaan', 'monitoring', 'pemusnahan', 'pembelian'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('laporan-bulanan.pdf');
    }
}
