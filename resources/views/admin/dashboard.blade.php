<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="icon" type="image/png" href="background/title.png">

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
    
    <link rel="stylesheet" href="css/styleNavbar.css">

    {{-- ChartStyle --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>


</head>
<body>
<div class="wrapper">
        <!-- Sidebar Admin Layout -->
        @include('layouts.adminNavbar')

        <!-- Page Content  -->
        <div id="content">

            <!-- Page Content  -->
        <div id="content">

        @include('layouts.adminTopNavbar')

        <nav aria-label="breadcrumb mb-5" class="bg-light">
            <ol class="breadcrumb mx-3 mt-2" style="color: RGBA(107,107,107,0.75)">
                <li class="breadcrumb-item active fw-bold "><a href="#"><span class="iconify" data-icon="ant-design:home-filled" data-height="20"></span>&nbsp;&nbsp;&nbsp;&nbsp;Beranda</a></li>
            </ol>
        </nav>

        <?php $hari_ini = date('Y-m-d');  ?> 
        <div class="d-flex justify-content-start mb-5 ml-4 mt-5">
            <h2 class="text-secondary"><?= hari_ini(). dateIndonesia($hari_ini).',' ?></h2> &nbsp; &nbsp;     
            <h2 class="text-secondary"><div id="clock"> &nbsp;</div></h2>
        </div>

        <div class=" mb-5">
            <div class="d-flex justify-content-start">

                <?php $jumlahaset = DB::table('data_asets')->count(); ?>
                @if($jumlahaset != 0)
                <div class="box mx-3" style="background-color: #21CC7A; padding: 30px; padding-left: 75px; padding-right: 75px; border-radius: 10px; font-size: 2em; color: white; font-weight: bold; text-align: center">
                {{$jumlahaset}} <br>
                    <span style="font-size: 0.7em;">Jumlah Aset</span>
                </div>
                @endif

                <?php $jumlahpeminjaman = DB::table('peminjaman')->count(); ?>
                @if($jumlahpeminjaman != 0)
                <div class="box mx-3" style="background-color: #00D1B8; padding: 30px; padding-left: 35px; padding-right: 35px; border-radius: 10px; font-size: 2em; color: white; font-weight: bold; text-align: center">
                    {{$jumlahpeminjaman}} <br>
                    <span style="font-size: 0.7em;">Jumlah Peminjaman</span>
                </div>
                @endif

                <?php $jumlahpengadaan = DB::table('pengadaan')->count(); ?>
                @if($jumlahpengadaan != 0)
                <div class="box mx-3" style="background-color: #947AFF; padding: 30px; padding-left: 40px; padding-right: 40px; border-radius: 10px; font-size: 2em; color: white; font-weight: bold; text-align: center">
                {{$jumlahpengadaan}} <br>
                    <span style="font-size: 0.7em;">Jumlah Pengadaan</span>
                </div>
                @endif

                <?php $jumlahpemusnahan = DB::table('pemusnahan')->count(); ?>
                @if($jumlahpemusnahan != 0)
                <div class="box mx-3" style="background-color: #32A9FF; padding: 30px; padding-left: 35px; padding-right: 35px; border-radius: 10px; font-size: 2em; color: white; font-weight: bold; text-align: center">
                {{$jumlahpemusnahan}} <br>
                    <span style="font-size: 0.7em;">Jumlah Pemusnahan</span>
                </div>
                @endif

                

                <?php $jumlahmonitoring = DB::table('monitoring')->count(); ?>
                @if($jumlahmonitoring != 0)
                <div class="box mx-3" style="background-color: #FF7A7A; padding: 30px; padding-left: 40px; padding-right: 40px; border-radius: 10px; font-size: 2em; color: white; font-weight: bold; text-align: center">
                {{$jumlahmonitoring}} <br>
                    <span style="font-size: 0.7em;">Jumlah Monitoring</span>
                </div>
                @endif

            </div>
        </div>

        <div class="d-flex justify-content-start mb-4">

            <div class="graph ml-3 mr-3">
                <div class="card rounded"  style="padding: 50px">
                    <div class="card-body">
                        {!! $asetChart2->container() !!}
                    </div>
                    <h5 class="card-title text-center">Statistik Aset Tahun <?= date("Y"); ?></h5>
                </div>
            </div>

            <div class="graph ml-5">
                <div class="card rounded"  style="padding: 50px">
                    <div class="card-body">
                        {!! $userChart->container() !!}
                    </div>
                    <h5 class="card-title text-center">Statistik Pengguna Tahun <?= date("Y"); ?></h5>
                </div>
            </div>

        </div>

        <div class="justify-content-start">

            <div class="graph ml-3">
                <div class="card rounded"  style="padding: 25px">
                    <div class="card-body py-3 px-3">
                        {!! $asetChart->container() !!}
                    </div>
                    <h3 class="card-title text-center">Statistik Aset Per Gedung Tahun <?= date("Y"); ?></h3>
                </div>
            </div>
        </div>

       

        <br><br><br>

        @include('layouts.footer')


    {{-- ChartScript --}}
    @if($asetChart)
    {!! $asetChart->script() !!}
    @endif

    {{-- ChartScript --}}
    @if($asetChart2)
    {!! $asetChart2->script() !!}
    @endif

    {{-- ChartScript --}}
    @if($userChart)
    {!! $userChart->script() !!}
    @endif


   @if(Session::has('success'))
    <script type="text/javascript">
        swal({
                title:'Berhasil',
                text:"{{Session::get('success')}}",
                timer:2000,
                icon: "success",
                type:'success'
            }).then((value) => {
            //location.reload();
        }).catch(swal.noop);
    </script>
    @endif

    <!-- GET CURRENT DATE AND TIME INDONESIA -->

    <?php function dateIndonesia($date){
        if($date != '0000-00-00'){
            $date = explode('-', $date);
  
            $data = $date[2] . ' ' . bulan($date[1]) . ' '. $date[0];
        }else{
            $data = 'Format tanggal salah';
        }
  
        return $data;
    }
    
    function bulan($bln) {
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

    function hari_ini(){
        $hari = date ("D");
     
        switch($hari){
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
     
        return $hari_ini.', ';
     
    }
    ?>
    

    <script >
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