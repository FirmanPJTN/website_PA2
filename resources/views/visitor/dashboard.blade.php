<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Quicksand -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Bootstrap Table -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css">



    <link rel="stylesheet" href="../css/styleNavbar.css">


    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>
    @include('sweetalert::alert')
    <div class="wrapper">
        <!-- Sidebar Admin Layout -->
        @include('layouts.visitorNavbar')

        <!-- Page Content  -->
        <div id="content">

            <!-- Page Content  -->
            <div id="content">

                @include('layouts.visitorTopNavbar')

                <nav aria-label="breadcrumb" class="bg-light  mb-5">
                    <ol class="breadcrumb mx-3 mt-2" style="color: RGBA(107,107,107,0.75)">
                        <li class="breadcrumb-item active fw-bold text-color"><a href="#"><span class="iconify" data-icon="ant-design:home-filled" data-height="20"></span>&nbsp;&nbsp;&nbsp;&nbsp;Beranda</a></li>
                    </ol>
                </nav>


                <?php $hari_ini = date('Y-m-d');  ?>
                <div class="d-flex justify-content-start mb-5 ml-4">
                    <h2 class="text-secondary"><?= hari_ini() . dateIndonesia($hari_ini) . ',' ?></h2> &nbsp; &nbsp;
                    <h2 class="text-secondary">
                        <div id="clock"> &nbsp;</div>
                    </h2>
                </div>

                <div class="mb-5">
                    <div class="d-flex justify-content-start">
                        <?php $jumlahpengadaan = DB::table('pengadaan')->where('unit_id',Auth::user()->unit_id)->count(); ?>
                        @if($jumlahpengadaan != 0)
                        <div class="box mx-4" style="background-color: #00D1B8; padding: 30px; padding-left: 35px; padding-right: 35px; border-radius: 10px; font-size: 2em; color: white; font-weight: bold; text-align: center">
                            {{$jumlahpengadaan}} <br>
                            <span style="font-size: 0.7em;">Jumlah Pengadaan</span>
                        </div>
                        @endif

                        <?php $jumlahpeminjaman = DB::table('peminjaman')->where('unit_id',Auth::user()->unit_id)->count(); ?>
                        @if($jumlahpeminjaman != 0)
                        <div class="box mx-4" style="background-color: #32A9FF; padding: 30px; padding-left: 35px; padding-right: 35px; border-radius: 10px; font-size: 2em; color: white; font-weight: bold; text-align: center">
                            {{$jumlahpeminjaman}} <br>
                            <span style="font-size: 0.7em;">Jumlah Peminjaman</span>
                        </div>
                        @endif

                        <?php $jumlahmonitoring = DB::table('monitoring')->where('unit_id',Auth::user()->unit->id)->count(); ?>
                        @if($jumlahmonitoring != 0)
                        <div class="box mx-4" style="background-color: #947AFF; padding: 30px; padding-left: 35px; padding-right: 35px; border-radius: 10px; font-size: 2em; color: white; font-weight: bold; text-align: center">
                            {{$jumlahmonitoring}} <br>
                            <span style="font-size: 0.7em;">Jumlah Monitoring</span>
                        </div>
                        @endif

                    </div>
                </div>

                <h3 class="mb-3 mt-4 fw-bold mx-4 mb-5 mt-5">PENGADAAN ASET</h3>

                <div class="table-container mx-5 mr-5">
                    <table class="table table-striped table-bordered mb-5 ">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Kode Pengadaan</th>
                                <th scope="col" class="text-center">Jumlah Barang</th>
                                <th scope="col" class="text-center">Tanggal Pengadaan</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0 ?>
                            @foreach ($pengadaan as $ada)
                            @if($ada->user_id == Auth::user()->id && $ada->status == 'proses')

                            <?php
                            $jumlah = ($ada->jumlahBarang1) + ($ada->jumlahBarang2) + ($ada->jumlahBarang3) + ($ada->jumlahBarang4) + ($ada->jumlahBarang5)
                            ?>
                            <tr>
                                <td class="text-center">{{$pengadaan->firstItem() + $i}}</td>
                                <td class="text-center">{{$ada -> kodePengadaan}}</td>
                                <td class="text-center">{{$jumlah}}</td>
                                <td class="text-center">{{$ada -> created_at -> format('Y-m-d')}}</td>
                                <td class="text-center">
                                    <button class="btn btn-warning" disabled><span class="iconify" data-icon="mdi:progress-alert" data-height="20"></span> Diproses</button>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-around">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#def<?= $ada->id ?>">Detail</button>
                                        &nbsp;
                                        <a href="#" class="btn btn-warning mx-2" data-bs-toggle="modal" data-bs-target="#ubah-pengadaan<?= $ada->id ?>">Ubah</a>
                                        &nbsp;
                                        <a data-id="{{ $ada->id }}" class="btn btn-danger deleteAda" href="#">Hapus</a>
                                    </div>
                                </td>
                            </tr>



                            <!-- MODAL DETAIL PENGADAAN -->
                            @include('layouts.modalDetailPengadaan')

                            <!-- MODAL UBAH PENGADAAN -->
                            @include('layouts.modalUbahPengadaanVisitor')

                            <?php $i++; ?>
                            @endif
                            @endforeach

                        </tbody>
                    </table>

                    
                    <a href="{{route('visitor-pengadaan')}}" class="btn btn-info mb-3">Lihat Semua Data</a>

                    @if(!empty($pengadaan))
                    <div class="pagination">
                        {{ $pengadaan->links() }}
                    </div>
                    @endif

                </div>

                <h3 class="mb-3 mt-4 fw-bold mx-4 mb- mt-5">PEMINJAMAN ASET</h3>

                <div class="table-container mx-5 mr-5">
                    <table class="table table-striped table-bordered mb-5 ">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Kode Peminjaman</th>
                                <th scope="col" class="text-center">Jumlah Barang</th>
                                <th scope="col" class="text-center">Tanggal Peminjaman</th>
                                <th scope="col" class="text-center">Rencana Pengembalian</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0 ?>
                            @foreach ($peminjaman as $pinjam)
                            @if($pinjam->user_id == Auth::user()->id && $pinjam->status == 'proses')

                            <?php
                            $jumlah = ($pinjam->jumlahBarang1) + ($pinjam->jumlahBarang2) + ($pinjam->jumlahBarang3) + ($pinjam->jumlahBarang4) + ($pinjam->jumlahBarang5)
                            ?>
                            <tr>
                                <td class="text-center">{{$peminjaman->firstItem() + $i}}</td>
                                <td class="text-center">{{$pinjam -> kodePeminjaman}}</td>
                                <td class="text-center">{{$jumlah}}</td>
                                <td class="text-center">{{$pinjam -> created_at -> format('Y-m-d')}}</td>
                                <td class="text-center">{{$pinjam -> tglKembali}}</td>
                                <td class="text-center">
                                    <button class="btn btn-warning" disabled><span class="iconify" data-icon="mdi:progress-alert" data-height="20"></span> Diproses</button>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-around">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#abc<?= $pinjam->id ?>">Detail</button>
                                        &nbsp;
                                        <a href="#" class="btn btn-warning mx-2" data-bs-toggle="modal" data-bs-target="#ubah-peminjaman<?= $pinjam->id ?>">Ubah</a> &nbsp;
                                        <a data-id="{{ $pinjam->id }}" class="btn btn-danger deletePinjam" href="#">Hapus</a>
                                    </div>
                                </td>
                            </tr>



                            <!-- MODAL DETAIL PEMINJAMAN -->
                            @include('layouts.modalDetailPeminjaman')

                            <!-- MODAL UBAH PEMINJAMAN -->
                            @include('layouts.modalUbahPeminjamanVisitor')

                            <?php $i++; ?>
                            @endif
                            @endforeach

                        </tbody>
                    </table>

                    
                    <a href="{{route('visitor-peminjaman')}}" class="btn btn-info mb-3">Lihat Semua Data</a>

                    @if(!empty($peminjaman))
                    <div class="pagination">
                        {{ $peminjaman->links() }}
                    </div>
                    @endif


                </div>

                <h3 class="mb-3 mt-4 fw-bold mx-4 mb-5 mt-5">MONITORING ASET</h3>

                <div class="table-container mx-5 mr-5">
                    <table class="table table-striped table-bordered mb-5">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Kode Monitoring</th>
                                <th scope="col" class="text-center">Jumlah Barang</th>
                                <th scope="col" class="text-center">Unit</th>
                                <th scope="col" class="text-center">Tanggal Monitoring</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0 ?>
                            @foreach ($monitoring as $monitor)
                            @if(($monitor->unit == Auth::user()->unit)&&($monitor->status == 'proses'))

                            <?php
                            $jumlah = ($monitor->jumlahBarang1) + ($monitor->jumlahBarang2) + ($monitor->jumlahBarang3) + ($monitor->jumlahBarang4) + ($monitor->jumlahBarang5)
                            ?>
                            <tr>
                                <td class="text-center">{{$monitoring->firstItem() + $i}}</td>
                                <td class="text-center">{{$monitor->kodeMonitoring}}</td>
                                <td class="text-center">{{$monitor ->unit}}</td>
                                <td class="text-center">{{$jumlah}}</td>
                                <td class="text-center">{{$monitor -> waktuMonitoring}}</td>
                                <td class="text-center">
                                    @if($monitor->status == 'proses')
                                    <button class="btn btn-warning" disabled><span class="iconify" data-icon="mdi:progress-alert" data-height="20"></span> Diproses</button>
                                    @endif
                                    @if($monitor->status == 'tolak')
                                    <button class="btn btn-danger" disabled><span class="iconify" data-icon="mdi:progress-close" data-height="20"></span> Ditolak</button>
                                    @endif
                                    @if($monitor->status == 'setuju')
                                    <button class="btn btn-success" disabled><span class="iconify" data-icon="mdi:progress-check" data-height="20"></span> Disetujui</button>
                                    @endif
                                </td>
                                <!-- <td>{{Str::limit($monitor->alasan, 50, $end=' .....')}}</td> -->
                                <td class="text-center">
                                    <div class="d-flex justify-content-around">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#xyz<?= $monitor->id ?>">Detail</button> &nbsp;
                                        <a href="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#opq<?= $monitor->id ?>">Proses</a>
                                    </div>
                                </td>
                            </tr>



                            <!-- MODAL DETAIL PEMINJAMAN -->
                            @include('layouts.modalDetailMonitoringAdmin')

                            <!-- MODAL PERSETUJUAN MONITORING -->
                            @include('layouts.modalPersetujuanMonitoring')

                            <?php $i++; ?>
                            @endif
                            @endforeach

                        </tbody>
                    </table>

                    
                    <a href="{{route('monitoring-aset')}}" class="btn btn-info mb-3">Lihat Semua Data</a>

                    @if(!empty($monitoring))
                    <div class="pagination">
                        {{ $monitoring->links() }}
                    </div>
                    @endif

                </div>


                <br><br><br>
                @include('layouts.footer')

            </div>
        </div>


        <!-- GET CURRENT DATE AND TIME INDONESIA -->

        <?php function dateIndonesia($date)
        {
            if ($date != '0000-00-00') {
                $date = explode('-', $date);

                $data = $date[2] . ' ' . bulan($date[1]) . ' ' . $date[0];
            } else {
                $data = 'Format tanggal salah';
            }

            return $data;
        }

        function bulan($bln)
        {
            $bulan = $bln;

            switch ($bulan) {
                case 1:
                    $bulan = "Januari";
                    break;
                case 2:
                    $bulan = "Februari";
                    break;
                case 3:
                    $bulan = "Maret";
                    break;
                case 4:
                    $bulan = "April";
                    break;
                case 5:
                    $bulan = "Mei";
                    break;
                case 6:
                    $bulan = "Juni";
                    break;
                case 7:
                    $bulan = "Juli";
                    break;
                case 8:
                    $bulan = "Agustus";
                    break;
                case 9:
                    $bulan = "September";
                    break;
                case 10:
                    $bulan = "Oktober";
                    break;
                case 11:
                    $bulan = "November";
                    break;
                case 12:
                    $bulan = "Desember";
                    break;
            }
            return $bulan;
        }

        function hari_ini()
        {
            $hari = date("D");

            switch ($hari) {
                case 'Sun':
                    $hari_ini = "Minggu";
                    break;

                case 'Mon':
                    $hari_ini = "Senin";
                    break;

                case 'Tue':
                    $hari_ini = "Selasa";
                    break;

                case 'Wed':
                    $hari_ini = "Rabu";
                    break;

                case 'Thu':
                    $hari_ini = "Kamis";
                    break;

                case 'Fri':
                    $hari_ini = "Jumat";
                    break;

                case 'Sat':
                    $hari_ini = "Sabtu";
                    break;

                default:
                    $hari_ini = "Tidak di ketahui";
                    break;
            }

            return $hari_ini . ', ';
        }
        ?>


        <script>
            // Comment out the PHP line you will actually use for demostration purposes
            var d = new Date(<?php echo time() * 1000 ?>);
            // var d = new Date(1389971032 * 1000);

            function updateClock() {
                // Increment the date
                d.setTime(d.getTime() + 1000);

                // Translate time to pieces
                var currentHours = d.getHours();
                var currentMinutes = d.getMinutes();
                var currentSeconds = d.getSeconds();

                // Add the beginning zero to minutes and seconds if needed
                currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
                currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

                // Add either "AM" or "PM"
                var timeOfDay = (currentHours < 12) ? "am" : "pm";

                // Convert the hours our of 24-hour time
                currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;
                currentHours = (currentHours == 0) ? 12 : currentHours;

                // Generate the display string
                var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

                // Update the time
                document.getElementById("clock").firstChild.nodeValue = currentTimeString;
            }

            window.onload = function() {
                updateClock();
                setInterval('updateClock()', 1000);
            }
        </script>

        <!-- SWEET ALERT  -->

        <script type="text/javascript" src="../../js/scriptDeleteConfirmPeminjamanVisitor.js"></script>

        <script type="text/javascript" src="../../js/scriptDeleteConfirmPengadaanVisitor.js"></script>


        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

        <script type="text/javascript" src="../js/scriptNavbar.js"></script>



        <!-- Iconify  -->
        <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>