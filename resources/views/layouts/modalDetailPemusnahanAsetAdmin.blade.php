<div class="modal fade" id="abc<?= $musnah->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">DETAIL PEMUSNAHAN ASET</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="form-group mt-3 mx-4">
            @if($musnah->status == 'Diproses')
            <button class="btn form-control btn-warning" disabled><span class="iconify" data-icon="mdi:progress-alert" data-height="20"></span> {{$musnah->status}}</button>
            @endif

            @if($musnah->status == 'Disetujui')
            <button class="btn form-control btn-success" disabled><span class="iconify" data-icon="mdi:progress-check" data-height="20"></span> {{$musnah->status}}</button>
            @endif

            @if($musnah->status == 'Ditolak')
            <button class="btn form-control btn-danger" disabled><span class="iconify" data-icon="mdi:progress-close" data-height="20"></span> {{$musnah->status}}</button>
            @endif
        </div>

        
        <div class="form-group ml-2 mt-3">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25" >Kode Pemusnahan</label>
                <input type="text" name="kodePemusnahan" class="form-control mx-4" value="{{$musnah->kodePemusnahan}}" autofocus autocomplete="off"  disabled>
            </div>
        </div>

        <div class="form-group input_fields_wrap ml-2">
            <div class="d-flex justify-content-start mt-4 ">
                <label class="mx-4 w-100 ">Daftar Barang</label>
                    
                <label class="ml-5 pl-2">Jenis</label>
                <input type="text" name="jenisBarang1" class="form-control mx-4" value="{{ $musnah -> jenisBarang1 }}" autofocus autocomplete="off" disabled>

                <label >Tipe</label>
                <input type="text" name="tipeBarang1" class="form-control mx-4" value="{{ $musnah -> tipeBarang1 }}" autofocus autocomplete="off" disabled>

                <label class="form-label sm-auto" >Jumlah</label>
                <input type="number" name="jumlahBarang1" class="form-control mx-4" value="{{ $musnah -> jumlahBarang1 }}" autofocus autocomplete="off" disabled size="5">
            </div>
        </div>

        @include('layouts.ifEmptyPemusnahanAset')


        <div class="form-group ml-2 mt-3">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25" >Waktu Pemusnahan</label>
                <input type="text" name="waktuPemusnahan" class="form-control mx-4" value="{{$musnah->waktuPemusnahan}}" autofocus autocomplete="off"  disabled>
            </div>
        </div>

        <div class="form-group mt-3 ml-2">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25">Deskripsi Berkas</label>
                <textarea name="deskripsi" class="form-control mx-4" cols="30" rows="10" value="{{ $musnah-> deskripsi }}" autofocus autocomplete="off" disabled>{{ $musnah -> deskripsi }}</textarea>
            </div>
        </div>
        

        @if($musnah -> gambarBarang1 != NULL)
        <div class="form-group mt-3 ml-2">
            <div class="d-flex justify-content-between">
                <label class="mx-4 w-25">Bukti Otentik</label>
                <img src="../foto/pemusnahan-aset/{{ $musnah -> gambarBarang1 }}" class="mr-5"style="border: 1px black solid;"alt="" width="150">
                @if($musnah -> gambarBarang2 != NULL)
                <img src="../foto/pemusnahan-aset/{{ $musnah -> gambarBarang2 }}" class="mr-5"style="border: 1px black solid;"alt="" width="150">
                @endif
                @if($musnah -> gambarBarang3 != NULL)
                <img src="../foto/pemusnahan-aset/{{ $musnah -> gambarBarang3 }}" class="mr-5"style="border: 1px black solid;"alt="" width="150">
                @endif
                @if($musnah -> gambarBarang4 != NULL)
                <img src="../foto/pemusnahan-aset/{{ $musnah -> gambarBarang4 }}" class="mr-5"style="border: 1px black solid;"alt="" width="150">
                @endif
                @if($musnah -> gambarBarang5 != NULL)
                <img src="../foto/pemusnahan-aset/{{ $musnah -> gambarBarang5 }}" class="mr-5"style="border: 1px black solid;"alt="" width="150">
                @endif
            </div>
        </div>
        @endif

        <div class="modal-footer text-center">
            <button style="width: 100%" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("tglmusnah<?= $musnah->id ?>").disabled = true;
</script>