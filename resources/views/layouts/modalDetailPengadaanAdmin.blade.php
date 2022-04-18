<div class="modal fade" id="def<?= $ada->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">DETAIL PENGADAAN ASET</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="form-group ml-2 mt-3">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25" >Peminjam</label>
                <input type="text" name="peminjam" class="form-control mx-4" value="{{$user->nama}}" autofocus autocomplete="off"  disabled>
            </div>
        </div>

        <div class="form-group ml-2 mt-3">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25" >Unit</label>
                <input type="text" name="unit" class="form-control mx-4" value="{{$user->unit}}" autofocus autocomplete="off"  disabled>
            </div>
        </div>

        <div class="modal-body row">
            <div class="form-group input_fields_wrap">
                <div class="d-flex justify-content-start mt-4 ">
                    <label class="mx-4 w-100 ">Daftar Barang</label>
                    
                    <label class="ml-5 pl-2">Jenis</label>
                    <input type="text" name="jenisBarang1" class="form-control mx-4" value="{{ $ada -> jenisBarang1 }}" autofocus autocomplete="off" disabled>

                    <label >Tipe</label>
                    <input type="text" name="tipeBarang1" class="form-control mx-4" value="{{ $ada -> tipeBarang1 }}" autofocus autocomplete="off" disabled>

                    <label class="form-label" visibilit>Jumlah</label>
                    <input type="number" name="jumlahBarang1" class="form-control mx-4" value="{{ $ada -> jumlahBarang1 }}" autofocus autocomplete="off" disabled size="5">
                </div>
            </div>

            @if (!empty($ada -> jenisBarang2)) 

    <div class="form-group input_fields_wrap">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang2" class="form-control mx-4" value="{{ $ada -> jenisBarang2 }}" autofocus autocomplete="off" disabled>

            <label >Tipe</label>
            <input type="text" name="tipeBarang2" class="form-control mx-4" value="{{ $ada -> tipeBarang2 }}" autofocus autocomplete="off" disabled>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang2" class="form-control mx-4" value="{{ $ada -> jumlahBarang2 }}" autofocus autocomplete="off" disabled size="5">
        </div>
    </div>

    @if (!empty($ada -> jenisBarang3))

    <div class="form-group input_fields_wrap">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang3" class="form-control mx-4" value="{{ $ada -> jenisBarang3 }}" autofocus autocomplete="off" disabled>

            <label >Tipe</label>
            <input type="text" name="tipeBarang3" class="form-control mx-4" value="{{ $ada -> tipeBarang3 }}" autofocus autocomplete="off" disabled>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang3" class="form-control mx-4" value="{{ $ada -> jumlahBarang3 }}" autofocus autocomplete="off" disabled size="5">
        </div>
    </div>


    @if (!empty($ada -> jenisBarang4))

    <div class="form-group input_fields_wrap">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang4" class="form-control mx-4" value="{{ $ada -> jenisBarang4 }}" autofocus autocomplete="off" disabled>

            <label >Tipe</label>
            <input type="text" name="tipeBarang4" class="form-control mx-4" value="{{ $ada -> tipeBarang4 }}" autofocus autocomplete="off" disabled>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang4" class="form-control mx-4" value="{{ $ada -> jumlahBarang4 }}" autofocus autocomplete="off" disabled size="5">
        </div>
    </div>

    @if (!empty($ada -> jenisBarang5))

    <div class="form-group input_fields_wrap">
        <div class="d-flex justify-content-start mt-4 ">
            <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
            
            <label class="ml-5 pl-2">Jenis</label>
            <input type="text" name="jenisBarang5" class="form-control mx-4" value="{{ $ada -> jenisBarang5 }}" autofocus autocomplete="off" disabled>

            <label >Tipe</label>
            <input type="text" name="tipeBarang5" class="form-control mx-4" value="{{ $ada -> tipeBarang5 }}" autofocus autocomplete="off" disabled>

            <label class="form-label" visibilit>Jumlah</label>
            <input type="number" name="jumlahBarang5" class="form-control mx-4" value="{{ $ada -> jumlahBarang5 }}" autofocus autocomplete="off" disabled size="5">

        </div>
    </div>

    @endif

    @endif

    @endif

    @endif

            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25" >Tanggal Pengadaan</label>
                    <input type="date" name="tglAda" class="form-control mx-4" id="tglAda<?= $ada->id ?>" value="{{$ada -> created_at -> format('Y-m-d')}}" autofocus autocomplete="off">
                </div>
            </div>


            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Alasan Pengadaan</label>
                    <textarea name="alasan" class="form-control mx-4" cols="30" rows="10" value="{{ $ada-> alasan }}" autofocus autocomplete="off" disabled>{{ $ada -> alasan }}</textarea>
                </div>
            </div>

        </div>
        <div class="modal-footer">
             <button style="width: 45%" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <a style="width: 45%" type="button" class="btn btn-danger  mr-4" href="/visitor/PermohonanAset/PengadaanAset/Tolak/{{$ada -> id}}">Tolak</a>
        </div>
    </div>
    </div>
</div>

<script>
    document.getElementById("tglAda<?= $ada->id ?>").disabled = true;
</script>