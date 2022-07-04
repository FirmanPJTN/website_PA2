<div class="modal fade" id="xyzr<?= $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">DETAIL MONITORING ASET</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">

                @if($monitor->status == 'proses')
                <button class="btn form-control btn-warning" disabled><span class="iconify" data-icon="mdi:progress-alert" data-height="20"></span> Diproses</button>
                @endif
                @if($monitor->status == 'tolak')
                <button class="btn form-control btn-danger" disabled><span class="iconify" data-icon="mdi:progress-close" data-height="20"></span> Ditolak</button>
                @endif
                @if($monitor->status == 'setuju')
                <button class="btn form-control btn-success" disabled><span class="iconify" data-icon="mdi:progress-check" data-height="20"></span> Disetujui</button>
                @endif


                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Kode Monitoring</label>
                        <input type="text" name="kodeMonitoring" class="form-control mx-4" value="{{$monitor ->kodeMonitoring}}" autofocus autocomplete="off" disabled>
                    </div>
                </div>

                <div class="form-group input_fields_wrap">

                    <?php $counter = 1; ?>
                    @foreach($aset->where('unit_id',$monitor->unit_id) as $as)
                    <div class="d-flex justify-content-start mt-4 ">

                        @if($counter==1)
                        <label class="ml-4 w-25">Daftar Barang</label>
                        @else
                        <label class="ml-4 w-25" style="visibility: hidden">Daftar Barang</label>
                        @endif


                        <?php $counter++; ?>

                        <label style="margin-left: 130px">Nama</label>
                        <input type="text" value="{{$as->tipeBarang}}" class="form-control mx-5" disabled>

                        <label class="ml-2">Jumlah</label>
                        <input type="number" name="jumlah" class="mx-4" value="{{$as->jumlahBarang}}" style="margin-top: 2px; margin-bottom:2px" min="1" max="10" disabled>

                    </div>
                    @endforeach
                </div>



                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Unit</label>
                        <input type="text" name="unit" class="form-control mx-4" value="{{$monitor -> unit->nama}}" autofocus autocomplete="off" disabled>
                    </div>
                </div>


                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Tanggal Monitoring</label>
                        <input type="text" name="waktuMonitoring" class="form-control mx-4" id="waktuMonitoring<?= $monitor->id ?>" value="{{ $monitor -> waktuMonitoring }}" disabled>
                    </div>
                </div>

                @if($monitor -> deskripsi != NULL)
                <div class="form-group mt-3">
                    <div class="d-flex justify-content-center">
                        <label class="mx-4 w-25">Alasan Disetujui / Ditolak</label>
                        <textarea name="deskripsi" class="form-control mx-4" id="deskripsi" cols="30" rows="10" value="{{ $monitor -> deskripsi }}">{{ $monitor -> deskripsi }}</textarea>
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