<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Aset</title>
    <link rel="icon" type="image/png" href="../../background/title.png">

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
    


    <link rel="stylesheet" href="../../css/styleNavbar.css">

    <script src="../../js/scriptCategoryFilter.js"></script>

    <!-- AJAX -->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


</head>
<body>


<div class="wrapper">

        <!-- Page Content  -->
        <div id="content">

            @foreach ($data->take(1) as $aset)
            <h1 class="mt-1 text-center fw-bold mb-5" style="text-transform: uppercase;">LAPORAN BULAN {{date('F', strtotime($aset->created_at)) }}</h1>
            @endforeach

            <h2 class="mb-3 mt-4 mx-4 mb-5">DAFTAR DATA ASET</h2>
            
            
            <table class="table table-striped table-bordered mb-5">
                <thead>
                    <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Kode Barang</th>
                    <th scope="col" class="text-center">Nama Barang</th>
                    <th scope="col" class="text-center">Tipe Barang</th>
                    <th scope="col" class="text-center">Jumlah Barang</th>
                    <th scope="col" class="text-center">Kategori</th>
                    <th scope="col" class="text-center">Kategori Pakai</th>
                    <th scope="col" class="text-center">Penyimpanan</th>
                    <th scope="col" class="text-center">Gedung</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                        @foreach ($data as $aset)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$aset->kodeAset}}</td>
                        <td>{{$aset -> jenisBarang}}</td>
                        <td>{{$aset -> tipeBarang}}</td>
                        <td>{{$aset -> jumlahBarang}}</td>
                        <td>{{$aset -> kategori}}</td>
                        @if($aset->isInternal==0)
                        <td>Barang Tidak Habis (Eksternal)</td>
                        @endif
                        @if($aset->isInternal==1)
                        <td>Barang Habis (Internal)</td>
                        @endif
                        <td>{{$aset -> penyimpanan}}</td>
                        <td class="text-center">{{$aset->gedung}}</td>
                    </tr>
                    <?php $i++;?>
                    @endforeach
                    
                </tbody>
            </table>

            <h2 class="mb-3 mt-4 mx-4 mb-5">DAFTAR DATA PEMINJAMAN</h2>
            
            
            <table class="table table-striped table-bordered mb-5">
                <thead>
                    <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Kode Peminjaman</th>
                    <th scope="col" class="text-center">Peminjam</th>
                    <th scope="col" class="text-center">Unit</th>
                    <th scope="col" class="text-center">Jumlah Barang</th>
                    <th scope="col" class="text-center">Tanggal Pengembalian</th>
                    <th scope="col" class="text-center">Tujuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                        @foreach ($peminjaman as $pinjam)
                        <?php $users = DB::table('users')->select('nama','unit')->where('id',$pinjam->user_id)->get(); ?>
                        @foreach ($users as $user)
                        <?php 
                            $jumlah = ($pinjam -> jumlahBarang1) + ($pinjam -> jumlahBarang2) + ($pinjam -> jumlahBarang3) + ($pinjam -> jumlahBarang4) + ($pinjam -> jumlahBarang5)
                        ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$pinjam->kodePeminjaman}}</td>
                        <td>{{$user->nama}}</td>
                        <td>{{$user->unit}}</td>
                        <td>{{$jumlah}}</td>
                        <td>{{$pinjam -> tglKembali}}</td>
                        <td>{{$pinjam -> tujuan}}</td>
                    </tr>
                    <?php $i++;?>
                    @endforeach
                    @endforeach
                    
                </tbody>
            </table>

            <h2 class="mb-3 mt-4 mx-4 mb-5">DAFTAR DATA PENGADAAN</h2>
            
            
            <table class="table table-striped table-bordered mb-5">
                <thead>
                    <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Kode Pengadaan</th>
                    <th scope="col" class="text-center">Pengada</th>
                    <th scope="col" class="text-center">Unit</th>
                    <th scope="col" class="text-center">Jumlah Barang</th>
                    <th scope="col" class="text-center">Kategori</th>
                    <th scope="col" class="text-center">Alasan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                        @foreach ($pengadaan as $ada)
                        <?php $users = DB::table('users')->select('nama','unit')->where('id',$ada->user_id)->get(); ?>
                        @foreach ($users as $user)
                        <?php 
                            $jumlah = ($ada -> jumlahBarang1) + ($ada -> jumlahBarang2) + ($ada -> jumlahBarang3) + ($ada -> jumlahBarang4) + ($ada -> jumlahBarang5)
                        ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$ada->kodePengadaan}}</td>
                        <td>{{$user->nama}}</td>
                        <td>{{$user->unit}}</td>
                        <td>{{$jumlah}}</td>
                        <td>{{$ada -> kategori}}</td>
                        <td>{{$ada -> alasan}}</td>
                    </tr>
                    <?php $i++;?>
                    @endforeach
                    @endforeach
                    
                </tbody>
            </table>

            <h2 class="mb-3 mt-4 mx-4 mb-5">DAFTAR DATA MONITORING</h2>
            
            
            <table class="table table-striped table-bordered mb-5">
                <thead>
                    <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Kode Monitoring</th>
                    <th scope="col" class="text-center">Unit</th>
                    <th scope="col" class="text-center">Jumlah Barang</th>
                    <th scope="col" class="text-center">Tanggal Monitoring</th>
                    <th scope="col" class="text-center">Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                        @foreach ($monitoring as $monitor)
                        <?php $units = DB::table('unit')->select('id','unit')->where('id',$monitor->unit_id)->get(); ?>
                        @foreach ($units as $unit)
                        <?php 
                            $jumlah = ($monitor -> jumlahBarang1) + ($monitor -> jumlahBarang2) + ($monitor -> jumlahBarang3) + ($monitor -> jumlahBarang4) + ($monitor -> jumlahBarang5)
                        ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$monitor->kodeMonitoring}}</td>
                        <td>{{$unit->unit}}</td>
                        <td>{{$jumlah}}</td>
                        <td>{{$monitor -> waktuMonitoring}}</td>
                        <td>{{$monitor -> deskripsi}}</td>
                    </tr>
                    <?php $i++;?>
                    @endforeach
                    @endforeach
                    
                </tbody>
            </table>

            <h2 class="mb-3 mt-4 mx-4 mb-5">DAFTAR DATA PEMUSNAHAN</h2>
            
            <h4 class="mb-3 mt-4 mx-4 mb-5">PEMUSNAHAN ASET</h4>
            
            <table class="table table-striped table-bordered mb-5">
                <thead>
                    <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Kode Pemusnahan</th>
                    <th scope="col" class="text-center">Unit</th>
                    <th scope="col" class="text-center">Jumlah Barang</th>
                    <th scope="col" class="text-center">Waktu Pemusnahan</th>
                    <th scope="col" class="text-center">Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                        @foreach ($pemusnahan as $musnah)
                        @if($musnah->jenisBarang1 != NULL)
                        <?php $units = DB::table('unit')->select('id','unit')->where('id',$musnah->unit_id)->get(); ?>
                        @foreach ($units as $unit)
                        <?php 
                            $jumlah = ($musnah -> jumlahBarang1) + ($musnah -> jumlahBarang2) + ($musnah -> jumlahBarang3) + ($musnah -> jumlahBarang4) + ($musnah -> jumlahBarang5)
                        ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$musnah->kodePemusnahan}}</td>
                        <td>{{$unit->unit}}</td>
                        <td>{{$jumlah}}</td>
                        <td>{{$musnah -> waktuPemusnahan}}</td>
                        <td>{{$musnah -> deskripsi}}</td>
                    </tr>
                    <?php $i++;?>
                    @endforeach
                    @endif
                    @endforeach
                    
                </tbody>
            </table>

            <h4 class="mb-3 mt-4 mx-4 mb-5">PEMUSNAHAN BERKAS</h4>
            
            <table class="table table-striped table-bordered mb-5">
                <thead>
                    <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Kode Pemusnahan</th>
                    <th scope="col" class="text-center">Waktu Pemusnahan</th>
                    <th scope="col" class="text-center">Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                        @foreach ($pemusnahan as $musnah)
                        @if($musnah->jenisBarang1 == NULL)
                        <?php 
                            $jumlah = ($musnah -> jumlahBarang1) + ($musnah -> jumlahBarang2) + ($musnah -> jumlahBarang3) + ($musnah -> jumlahBarang4) + ($musnah -> jumlahBarang5)
                        ?>
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$musnah->kodePemusnahan}}</td>
                        <td>{{$musnah -> waktuPemusnahan}}</td>
                        <td>{{$musnah -> deskripsi}}</td>
                    </tr>
                    <?php $i++;?>
                    @endif
                    @endforeach
                    
                </tbody>
            </table>

        </div>
    </div>
    

    

    <!-- SWEET ALERT  -->

    <script type="text/javascript" src="../../js/scriptDeleteConfirmAset.js"></script>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript" src="../../js/scriptNavbar.js"></script>

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