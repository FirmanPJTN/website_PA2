<div class="modal fade" id="abcr<?= $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label class="mx-4 w-25">Kode Pemusnahan</label>
                    <input type="text" name="kodePemusnahan" class="form-control mx-4" value="{{$musnah->kodePemusnahan}}" autofocus autocomplete="off" disabled>
                </div>
            </div>

            <div class="form-group input_fields_wrap ml-2">


                @foreach($aset->where('kodeAset',$musnah->aset_id) as $as)
                <div class="d-flex justify-content-start mt-4 ">

                    <label class="ml-4 w-25">Daftar Barang</label>

                    <label style="margin-left: 130px">Nama</label>
                    <input type="text" value="{{$as->tipeBarang}}" class="form-control mx-5" disabled>

                    <label class="ml-2">Jumlah</label>
                    <input type="number" name="jumlah" class="mx-4" value="{{$as->jumlahBarang}}" style="margin-top: 2px; margin-bottom:2px" min="1" max="10" disabled>

                </div>
                @endforeach
            </div>


            <div class="form-group ml-2 mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Waktu Pemusnahan</label>
                    <input type="text" name="waktuPemusnahan" class="form-control mx-4" value="{{$musnah->waktuPemusnahan}}" autofocus autocomplete="off" disabled>
                </div>
            </div>

            <div class="form-group mt-3 ml-2">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Deskripsi Berkas</label>
                    <textarea name="deskripsi" class="form-control mx-4" cols="30" rows="10" value="{{ $musnah-> deskripsi }}" autofocus autocomplete="off" disabled>{{ $musnah -> deskripsi }}</textarea>
                </div>
            </div>


            @if($musnah -> bukti != NULL)
            <div class="form-group mt-3 ml-2">
                <div class="d-flex justify-content-start">
                    <label class="ml-4 w-25">Bukti Otentik</label>
                    <img src="../foto/pemusnahan-aset/{{ $musnah -> bukti }}" style="border: 1px black solid;" alt="" width="300">
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