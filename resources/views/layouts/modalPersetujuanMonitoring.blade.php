<div class="modal fade" id="opq<?= $monitor->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">

    <form enctype="multipart/form-data" action="/visitor/MonitoringAset/PersetujuanMonitoring/Simpan/{{$monitor->id}}" method="post">
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
                <label class="mx-4 w-25" >Kode Monitoring</label>
                <input type="text" name="kodeMonitoring" class="form-control mx-4" value="{{$monitor->kodeMonitoring}}" autofocus autocomplete="off"  disabled>
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

        @include('layouts.ifEmptyMonitoringSetuju')


        <div class="form-group ml-2 mt-3">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25" >Tanggal Monitoring</label>
                <input type="text" name="waktuMonitoring" class="form-control mx-4"  value="{{ $monitor -> waktuMonitoring }}" autofocus autocomplete="off" disabled>
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
