<div class="modal fade" id="opq<?= $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">

            <form enctype="multipart/form-data" action="/visitor/MonitoringAset/PersetujuanMonitoring/Simpan/{{$monitor->kodeMonitoring}}" method="post">
                {{ csrf_field() }}
                <div class="modal-header">

                    <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">PERSETUJUAN MONITORING</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body row">


                    <input type="hidden" name="statusTolak" value="tolak" style="visibility: hidden">

                    <input type="hidden" name="statusSetuju" value="setuju" style="visibility: hidden">

                    <div class="form-group ml-2 mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Kode Monitoring</label>
                            <input type="text" name="kodeMonitoring" class="form-control mx-4" value="{{$monitor->kodeMonitoring}}" autofocus autocomplete="off" disabled>
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


                    <div class="form-group ml-2 mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Tanggal Monitoring</label>
                            <input type="text" name="waktuMonitoring" class="form-control mx-4" value="{{ $monitor -> waktuMonitoring }}" autofocus autocomplete="off" disabled>
                        </div>
                    </div>


                    <div class="form-group mt-3 ml-2">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Alasan Disetujui / Ditolak</label>
                            <textarea name="deskripsi" placeholder="bersifat optional ..." class="form-control mx-4" cols="30" rows="10" autofocus autocomplete="off"></textarea>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="deskripsiNotifTolak" value="kode monitoring {{$monitor->kodeMonitoring}} ditolak" style="visibility: hidden">

                <input type="hidden" name="statusNotifTolak" value="tolak" style="visibility: hidden">



                <input type="hidden" name="role" value="administrator" style="visibility: hidden">


                <input type="hidden" name="deskripsiNotifSetuju" value="kode monitoring {{$monitor->kodeMonitoring}} disetujui" style="visibility: hidden">

                <input type="hidden" name="statusNotifSetuju" value="setuju" style="visibility: hidden">

                <div class="modal-footer d-flex">
                    <button style="width: 40%" type="submit" class="btn btn-danger" name="btnSubmit" value="tolak">Tolak</button>

                    <button style="width: 40%" type="submit" class="btn btn-success" name="btnSubmit" value="setuju">Setujui</button>
                </div>

            </form>
        </div>
    </div>