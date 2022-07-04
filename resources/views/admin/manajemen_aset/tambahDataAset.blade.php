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
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Admin Layout -->
        @include('layouts.adminNavbar')

        <!-- Page Content  -->
        <div id="content">

            @include('layouts.adminTopNavbar')


            <nav aria-label="breadcrumb" class="bg-light mb-5">
                <ol class="breadcrumb mx-3 mt-2" style="color: RGBA(107,107,107,0.75)">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><span class="iconify" data-icon="ant-design:home-filled" data-height="20"></span>&nbsp;&nbsp;&nbsp;&nbsp;Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/ManajemenAset/DataAset"><span class="iconify" data-icon="eos-icons:cluster-management" data-height="20"></span>&nbsp;&nbsp;&nbsp;&nbsp;Manajemen Aset</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="/ManajemenAset/DataAset">Data Aset</a></li>
                    <li class="breadcrumb-item active fw-bold text-color" aria-current="page">Tambah Data Aset</li>
                </ol>
            </nav>

            <div class="shadow p-3 mb-5 bg-body rounded container border">

                <h2 class="mb-5 text-center">TAMBAH DATA ASET</h2>


                <form enctype="multipart/form-data" action="/ManajemenAset/DataAset/Simpan" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="kodeAset" value="AT.{{date('Y.m.d-h.i.s')}}" >

                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Jenis Barang</label>
                            <input type="text" name="jenisBarang" class="form-control mx-4" value="{{ old('jenisBarang') }}" autofocus autocomplete="off">
                        </div>
                    </div>
                    @error('jenisBarang')
                    <div class="alert-danger mt-1">{{$message}}</div>
                    @enderror

                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Tipe Barang</label>
                            <input type="text" name="tipeBarang" class="form-control mx-4" value="{{ old('tipeBarang') }}" autofocus autocomplete="off">
                        </div>
                    </div>
                    @error('tipeBarang')
                    <div class="alert-danger mt-1">{{$message}}</div>
                    @enderror


                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Jumlah Barang</label>
                            <input type="number" name="jumlahBarang" class="form-control mx-4" value="{{ old('jumlahBarang') }}" autofocus autocomplete="off">
                        </div>
                    </div>
                    @error('jumlahBarang')
                    <div class="alert-danger mt-1">{{$message}}</div>
                    @enderror

                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Kategori</label>
                            <select class="form-control custom-select mx-4" name="kategori" id="kategori">
                                <option value="">pilih kategori</option>
                                @foreach($kategori as $ktg)
                                <option value="{{$ktg->id}}">{{$ktg->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('kategori')
                    <div class="alert-danger mt-1">{{$message}}</div>
                    @enderror

                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Kategori Pakai</label>
                            <select class="form-control custom-select mx-4" name="kategoriPakai" id="kategoriPakai">
                                <option value="">pilih kategori pakai</option>
                                <option value="0" <?php if (old('kategoriPakai') == '0') { ?>selected="selected" <?php } ?>>Barang Tidak Habis (Eksternal)</option>
                                <option value="1" <?php if (old('kategoriPakai') == '1') { ?>selected="selected" <?php } ?>>Barang Habis (Internal)</option>
                            </select>
                        </div>
                    </div>
                    @error('kategoriPakai')
                    <div class="alert-danger mt-1">{{$message}}</div>
                    @enderror


                 


                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Penyimpanan</label>
                            <input type="text" name="penyimpanan" class="form-control mx-4" value="{{ old('penyimpanan') }}" autofocus autocomplete="off">
                        </div>
                    </div>
                    @error('penyimpanan')
                    <div class="alert-danger mt-1">{{$message}}</div>
                    @enderror

                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Gedung</label>
                            <select class="form-control custom-select mx-4" name="gedung" id="gedung">
                                <option value="">pilih gedung</option>
                                @foreach($gedung as $gd)
                                <option value="{{$gd->id}}">{{$gd->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('gedung')
                    <div class="alert-danger mt-1">{{$message}}</div>
                    @enderror

                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Unit</label>
                            <select class="form-control custom-select mx-4" name="unit" id="unit">
                                <option value="">pilih unit</option>
                                @foreach($units as $unit)
                                <option value="{{$unit->id}}">{{$unit->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('unit')
                    <div class="alert-danger mt-1">{{$message}}</div>
                    @enderror

                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Tanggal Pembelian</label>
                            <input type="date" name="tglBeli" class="form-control mx-4" value="{{ old('tglBeli') }}" autofocus autocomplete="off">
                        </div>
                    </div>
                    @error('tglBeli')
                    <div class="alert-danger mt-1">{{$message}}</div>
                    @enderror

                    <div class="form-group mt-5">
                        <div class="d-flex justify-content-center">
                            <a href="/ManajemenAset/DataAset" class="btn btn-secondary mx-4" style="width: 40%">Batal</a>
                            <button type="submit" class="btn btn-info mx-4" style="width: 40%">Kirim</button>
                        </div>
                    </div>

                </form>

            </div>

            <br><br><br>
            @include('layouts.footer')

        </div>
    </div>



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