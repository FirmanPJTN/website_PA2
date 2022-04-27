<div class="modal fade" id="abc<?= $monitor->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">DETAIL MONITORING ASET</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body row">

            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25" >Kode Monitoring</label>
                    <input type="text" name="kodeMonitoring" class="form-control mx-4" value="{{$monitor ->kodeMonitoring}}" autofocus autocomplete="off" disabled>
                </div>
            </div>

            <div class="form-group input_fields_wrap">
                <div class="d-flex justify-content-start mt-4 ">
                    <label class="mx-4 w-100 ">Daftar Barang</label>
                    
                    <label class="ml-5 pl-2">Jenis</label>
                    <input type="text" name="jenisBarang1" class="form-control mx-4" value="{{ $monitor -> jenisBarang1 }}" autofocus autocomplete="off" disabled>

                    <label >Tipe</label>
                    <input type="text" name="tipeBarang1" class="form-control mx-4" value="{{ $monitor -> tipeBarang1 }}" autofocus autocomplete="off" disabled>

                    <label class="form-label sm-auto" >Jumlah</label>
                    <input type="number" name="jumlahBarang1" class="form-control mx-4" value="{{ $monitor -> jumlahBarang1 }}" autofocus autocomplete="off" disabled size="5">
                </div>
            </div>

            @if (!empty($monitor -> jenisBarang2)) 

        <div class="form-group input_fields_wrap">
            <div class="d-flex justify-content-start mt-4 ">
                <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
                
                <label class="ml-5 pl-2">Jenis</label>
                <input type="text" name="jenisBarang2" class="form-control mx-4" value="{{ $monitor -> jenisBarang2 }}" autofocus autocomplete="off" disabled>

                <label >Tipe</label>
                <input type="text" name="tipeBarang2" class="form-control mx-4" value="{{ $monitor -> tipeBarang2 }}" autofocus autocomplete="off" disabled>

                <label class="form-label" >Jumlah</label>
                <input type="number" name="jumlahBarang2" class="form-control mx-4" value="{{ $monitor -> jumlahBarang2 }}" autofocus autocomplete="off" disabled size="5">
            </div>
        </div>

        @if (!empty($monitor -> jenisBarang3))

        <div class="form-group input_fields_wrap">
            <div class="d-flex justify-content-start mt-4 ">
                <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
                
                <label class="ml-5 pl-2">Jenis</label>
                <input type="text" name="jenisBarang3" class="form-control mx-4" value="{{ $monitor -> jenisBarang3 }}" autofocus autocomplete="off" disabled>

                <label >Tipe</label>
                <input type="text" name="tipeBarang3" class="form-control mx-4" value="{{ $monitor -> tipeBarang3 }}" autofocus autocomplete="off" disabled>

                <label class="form-label" >Jumlah</label>
                <input type="number" name="jumlahBarang3" class="form-control mx-4" value="{{ $monitor -> jumlahBarang3 }}" autofocus autocomplete="off" disabled size="5">
            </div>
        </div>


        @if (!empty($monitor -> jenisBarang4))

        <div class="form-group input_fields_wrap">
            <div class="d-flex justify-content-start mt-4 ">
                <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
                
                <label class="ml-5 pl-2">Jenis</label>
                <input type="text" name="jenisBarang4" class="form-control mx-4" value="{{ $monitor -> jenisBarang4 }}" autofocus autocomplete="off" disabled>

                <label >Tipe</label>
                <input type="text" name="tipeBarang4" class="form-control mx-4" value="{{ $monitor -> tipeBarang4 }}" autofocus autocomplete="off" disabled>

                <label class="form-label" >Jumlah</label>
                <input type="number" name="jumlahBarang4" class="form-control mx-4" value="{{ $monitor -> jumlahBarang4 }}" autofocus autocomplete="off" disabled size="5">
            </div>
        </div>

        @if (!empty($monitor -> jenisBarang5))

        <div class="form-group input_fields_wrap">
            <div class="d-flex justify-content-start mt-4 ">
                <label class="mx-4 w-100 " style="visibility: hidden">Daftar Barang</label>
                
                <label class="ml-5 pl-2">Jenis</label>
                <input type="text" name="jenisBarang5" class="form-control mx-4" value="{{ $monitor -> jenisBarang5 }}" autofocus autocomplete="off" disabled>

                <label >Tipe</label>
                <input type="text" name="tipeBarang5" class="form-control mx-4" value="{{ $monitor -> tipeBarang5 }}" autofocus autocomplete="off" disabled>

                <label class="form-label" >Jumlah</label>
                <input type="number" name="jumlahBarang5" class="form-control mx-4" value="{{ $monitor -> jumlahBarang5 }}" autofocus autocomplete="off" disabled size="5">

            </div>
        </div>

        @endif

        @endif

        @endif

        @endif

            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25" >Unit</label>
                    <input type="text" name="unit" class="form-control mx-4" value="{{$monitor -> unit}}" autofocus autocomplete="off" disabled>
                </div>
            </div>


            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25" >Tanggal Monitoring</label>
                    <input type="date" name="waktuMonitoring" class="form-control mx-4" id="waktuMonitoring<?= $monitor->id ?>" value="{{ $monitor -> waktuMonitoring }}" autofocus autocomplete="off">
                </div>
            </div>

            @if($monitor -> deskripsi != NULL)
            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Pesan Tambahan</label>
                    <textarea name="deskripsi" class="form-control mx-4" cols="30" rows="10" value="{{ $monitor -> deskripsi }}" autofocus autocomplete="off" disabled>{{ $monitor -> deskripsi }}</textarea>
                </div>
            </div>
            @endif


        </div>
        <div class="modal-footer">
        <button style="width: 100%" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
    </div>
    </div>
</div>

<script>
    document.getElementById("waktuMonitoring<?= $monitor->id ?>").disabled = true;
</script>