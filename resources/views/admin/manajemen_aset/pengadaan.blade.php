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


    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>
    @include('sweetalert::alert')
    <div class="wrapper">
        <!-- Sidebar Admin Layout -->
        @include('layouts.adminNavbar')

        <!-- Page Content  -->
        <div id="content">

            @include('layouts.adminTopNavbar')

            <nav aria-label="breadcrumb" class="bg-light">
                <ol class="breadcrumb mx-3 mt-2" style="color: RGBA(107,107,107,0.75)">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><span class="iconify" data-icon="ant-design:home-filled" data-height="20"></span>&nbsp;&nbsp;&nbsp;&nbsp;Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#"><span class="iconify" data-icon="eos-icons:cluster-management" data-height="20"></span>&nbsp;&nbsp;&nbsp;&nbsp;Manajemen Aset</a></li>
                    <li class="breadcrumb-item active fw-bold text-color" aria-current="page">Pengadaan Aset</li>
                </ol>
            </nav>



            <h2 class="mb-5 mt-5 fw-bold">DAFTAR PENGADAAN ASET</h2>

            <div class="table-container mr-5">
                <table class="table table-striped table-bordered mb-5 ">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Kode Pengadaan</th>
                            <th scope="col" class="text-center">Pemohon</th>
                            <th scope="col" class="text-center">Unit</th>
                            <th scope="col" class="text-center">Jumlah Barang</th>
                            <th scope="col" class="text-center">Tanggal Pengadaan</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0 ?>
                        @foreach ($pengadaan as $ada)
                        @foreach ($pembelian->where('pengadaan_id',$ada->kodePengadaan)->take(1) as $beli)

                        @if($ada->status != null && $ada->status == 'proses')
                        <?php
                        $jumlah = ($beli->jumlahBarang1) + ($beli->jumlahBarang2) + ($beli->jumlahBarang3) + ($beli->jumlahBarang4) + ($beli->jumlahBarang5)
                        ?>
                        <tr>
                            <td class="text-center">{{$pengadaan->firstItem() +$i}}</td>
                            <td class="text-center">{{$ada -> kodePengadaan}}</td>
                            <td class="text-center">{{$ada->user->nama}}</td>
                            <td class="text-center">{{$ada->unit->nama}}</td>
                            <td class="text-center">{{$jumlah}}</td>
                            <td class="text-center">{{$ada -> created_at -> format('Y-m-d')}}</td>
                            <td class="text-center">
                                @if($ada->status == 'proses')
                                <button class="btn btn-warning" disabled><span class="iconify" data-icon="mdi:progress-alert" data-height="20"></span> Diproses</button>
                                @endif
                                @if($ada->status == 'tolak')
                                <button class="btn btn-danger" disabled><span class="iconify" data-icon="mdi:progress-close" data-height="20"></span> Ditolak</button>
                                @endif
                                @if($ada->status == 'setuju')
                                <button class="btn btn-success" disabled><span class="iconify" data-icon="mdi:progress-check" data-height="20"></span> Disetujui</button>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-around">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#def<?= $beli->id ?>">Detail</button> &nbsp;
                                    <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#lmn<?= $beli->id ?>">Proses PR</a>
                                </div>
                            </td>
                        </tr>

                        <!-- /visitor/PermohonanAset/PengadaanAset/Setujui/{{$ada -> id}} -->


                        <!-- MODAL DETAIL PENGADAAN -->
                        @include('layouts.modalDetailPengadaanAdmin')

                        <!-- MODAL PROSES PENGADAAN -->
                        @include('layouts.modalProsesPR')

                        <?php $i++; ?>
                        @endif
                        @endforeach
                        @endforeach

                    </tbody>
                </table>

                @if(!empty($pengadaan))
                <div class="pagination">
                    {{ $pengadaan->links() }}
                </div>
                @endif
            </div>

            <h3 class="mb-5 mt-5 fw-bold">RIWAYAT PENGADAAN ASET</h3>

            <div class="table-container mr-5">
                <table class="table table-striped table-bordered mb-5 ">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Kode Pengadaan</th>
                            <th scope="col" class="text-center">Pemohon</th>
                            <th scope="col" class="text-center">Unit</th>
                            <th scope="col" class="text-center">Jumlah Barang</th>
                            <th scope="col" class="text-center">Tanggal Pengadaan</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0 ?>
                        @foreach ($pengadaan as $ada)
                        @foreach ($pembelian->where('pengadaan_id',$ada->kodePengadaan)->take(1) as $beli)

                        @if($ada->status != null && $ada->status != 'proses')

                        <?php
                        $jumlah = ($beli->jumlahBarang1) + ($beli->jumlahBarang2) + ($beli->jumlahBarang3) + ($beli->jumlahBarang4) + ($beli->jumlahBarang5)
                        ?>
                        <tr>
                            <td class="text-center">{{$pengadaan->firstItem() + $i}}</td>
                            <td class="text-center">{{$ada -> kodePengadaan}}</td>
                            <td class="text-center">{{$ada->user->nama}}</td>
                            <td class="text-center">{{$ada->unit->nama}}</td>
                            <td class="text-center">{{$jumlah}}</td>
                            <td class="text-center">{{$ada -> created_at -> format('Y-m-d')}}</td>
                            <td class="text-center">
                                @if($ada->status == 'tolak')
                                <button class="btn btn-danger" disabled><span class="iconify" data-icon="mdi:progress-close" data-height="20"></span> Ditolak</button>
                                @endif
                                @if($ada->status == 'setuju')
                                <button class="btn btn-success" disabled><span class="iconify" data-icon="mdi:progress-check" data-height="20"></span> Disetujui</button>
                                @endif
                                @if($ada->status == 'setuju-PR')
                                <button class="btn btn-info" disabled><span class="iconify" data-icon="mdi:progress-check" data-height="20"></span> PR disetujui</button>
                                @endif
                                @if($ada->status == 'proses-PR')
                                <button class="btn btn-secondary" disabled><span class="iconify" data-icon="mdi:progress-alert" data-height="20"></span> PR diproses</button>
                                @endif
                                @if($ada->status == 'proses-PO')
                                <button class="btn btn-warning" disabled><span class="iconify" data-icon="mdi:progress-alert" data-height="20"></span> PO diproses</button>
                                @endif
                                @if($ada->status == 'setuju-PO')
                                <button class="btn btn-secondary" disabled><span class="iconify" data-icon="mdi:progress-check" data-height="20"></span> PO disetujui</button>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-around">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#def<?= $beli->id ?>">Detail</button>

                                    @if($ada->status == 'setuju-PR')
                                    <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#rst<?= $beli->id ?>">Proses PO</a>
                                    @endif
                                </div>
                            </td>
                        </tr>



                        <!-- MODAL DETAIL PENGADAAN -->
                        @include('layouts.modalDetailPengadaanAdminRiwayat')

                        <!-- MODAL PROSES PO -->
                        @include('layouts.modalProsesPO')


                        <?php $i++; ?>
                        @endif
                        @endforeach
                        @endforeach

                    </tbody>
                </table>

                @if(!empty($pengadaan))
                <div class="pagination">
                    {{ $pengadaan->links() }}
                </div>
                @endif
            </div>


            <br><br><br>
            @include('layouts.footer')

        </div>
    </div>


    <script>
        $(document).ready(function() {
            var max_fields = 5; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap2"); //Fields wrapper
            var add_button = $(".add_field_button2"); //Add button ID

            var x = 2; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x <= max_fields) { //max input box allowed
                    $(wrapper).append('<div class="d-flex justify-content-start mt-3 "><label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label><label class="ml-5 pl-2">Jenis</label><input type="text" name="jenisBarang' + x + '" class="form-control mx-4" autofocus autocomplete="off"><label >Tipe</label><input type="text" name="tipeBarang' + x + '" class="form-control mx-4" autofocus autocomplete="off"><label class="form-label" visibilit>Jumlah</label><input type="number" name="jumlahBarang' + x + '" class="form-control mx-4" autofocus autocomplete="off" size="5"><a class=" remove_field"> <span class="iconify" data-icon="ant-design:minus-circle-outlined" style="color: #ff1e1e;" data-height="25"></span></a></div>'); //add input box
                    x++; //text box increment
                }
            });

            $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
    </script>



    <script type="text/javascript" src="../../js/scriptDeleteConfirmPengadaanAdmin.js"></script>

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