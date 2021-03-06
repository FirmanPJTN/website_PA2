<div class="modal fade" id="def<?= $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">

    <form enctype="multipart/form-data" action="/approver/Persetujuan/PemusnahanBerkas/Simpan/{{$musnah->kodePemusnahan}}" method="post">
        {{ csrf_field() }}
        <div class="modal-header">
            
        <input type="hidden" name="statusSetuju" value="Disetujui" style="visibility: hidden">
        <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">DETAIL PEMUSNAHAN BERKAS</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <input type="hidden" name="statusTolak" value="Ditolak" style="visibility: hidden">


        <div class="modal-body row">
        <div class="form-group ml-2 mt-3">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25" >Kode Pemusnahan</label>
                <input type="text" name="kodePemusnahan" class="form-control mx-4" value="{{$musnah->kodePemusnahan}}" autofocus autocomplete="off"  disabled>
            </div>
        </div>

        <input type="hidden" name="deskripsiNotifTolak" value="kode pemusnahan {{$musnah->kodePemusnahan}} ditolak" style="visibility: hidden">


        <div class="form-group ml-2 mt-3">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25" >Waktu Pemusnahan</label>
                <input type="text" name="waktuPemusnahan" class="form-control mx-4" value="{{$musnah->waktuPemusnahan}}" autofocus autocomplete="off"  disabled>
            </div>
        </div>

        <input type="hidden" name="statusNotifTolak" value="tolak" style="visibility: hidden">



        <div class="form-group mt-3 ml-2">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25">Alasan Disetujui / Ditolak</label>
                <textarea name="alasan" placeholder="bersifat optional ..." class="form-control mx-4" cols="30" rows="10" autofocus autocomplete="off"></textarea>
            </div>
        </div>
        </div>

        <?php $admins =  DB::table('users')->where('role','=','administrator')->get() ?>
        @foreach($admins as $admin)
        <input type="hidden" name="role" value="{{$admin->role}}" style="visibility: hidden">
        @endforeach

 

        <input type="hidden" name="deskripsiNotifSetuju" value="kode pemusnahan {{$musnah->kodePemusnahan}} disetujui" style="visibility: hidden">
        
        <input type="hidden" name="statusNotifSetuju" value="setuju" style="visibility: hidden">

        <div class="modal-footer d-flex">
            <button style="width: 40%" type="submit" class="btn btn-danger" name="btnSubmit" value="tolak">Tolak</button>

            <button style="width: 40%" type="submit" class="btn btn-success" name="btnSubmit" value="setuju">Setujui</button>
        </div>

    </form>
    </div>
</div>
