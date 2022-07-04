<div class="modal fade" id="def<?= $beli->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">

    <form enctype="multipart/form-data" action="/approver/Persetujuan/PegadaanAset/InternalPR/Simpan/{{$beli->pengadaan_id}}" method="post">
        {{ csrf_field() }}
        <div class="modal-header">
            
        <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">PERSETUJUAN PRODUCT REQUEST</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <input type="hidden" name="statusSetujuPR" value="setuju-PR" style="visibility: hidden">

        <input type="hidden" name="statusTolak" value="tolak" style="visibility: hidden">

        <div class="modal-body row">
        <div class="form-group ml-2 mt-3">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25" >Kode Pengadaan</label>
                <input type="text" name="kodePengadaan" class="form-control mx-4" value="{{$ada->kodePengadaan}}" autofocus autocomplete="off"  disabled>
            </div>
        </div>

        <input type="hidden" name="deskripsiNotifTolakPR" value="PR kode pengadaan {{$ada->kodePengadaan}} ditolak" style="visibility: hidden">


        
        <div class="form-group ml-2 mt-3">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25" >Tanggal Pengajuan</label>
                <input type="text" class="form-control mx-4" id="tglPinjam<?= $beli->id ?>" value="{{$beli -> created_at -> format('Y-m-d')}}" autofocus autocomplete="off" disabled>
            </div>
        </div>


        <div class="form-group mt-3 ml-2">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25">Alasan PR Ditolak</label>
                <textarea name="alasan" placeholder="bersifat optional ..." class="form-control mx-4" cols="30" rows="10" autofocus autocomplete="off"></textarea>
            </div>
        </div>
        </div>

        <?php $transactors =  DB::table('users')->where('role','=','transactor')->get() ?>
        @foreach($transactors as $transactor)
        <input type="hidden" name="role" value="{{$transactor->role}}" style="visibility: hidden">
        @endforeach

        <?php $admins =  DB::table('users')->where('role','=','administrator')->get() ?>
        @foreach($admins as $admin)
        <input type="hidden" name="roleAdmin" value="{{$admin->role}}" style="visibility: hidden">
        @endforeach

        <?php $users =  DB::table('users')->where('id','=',$ada->user_id)->get() ?>
        @foreach($users as $user)
        <input type="hidden" name="idUser" value="{{$user->id}}" style="visibility: hidden">
        @endforeach


        <input type="hidden" name="idPengadaan" value="{{$beli->pengadaan_id}}" style="visibility: hidden">


        <input type="hidden" name="unit_id" value="{{$ada->unit_id}}" style="visibility: hidden">

        <input type="hidden" name="idPembelian" value="{{$beli->id}}" style="visibility: hidden">
   

        <input type="text" name="deskripsiNotifSetujuPR" value="PR kode pengadaan {{$ada->kodePengadaan}} disetujui" style="visibility: hidden">
       

        <div class="modal-footer d-flex">
            <button style="width: 40%" type="submit" class="btn btn-danger" name="btnSubmit" value="tolak">Tolak</button>

            <button style="width: 40%" type="submit" class="btn btn-success" name="btnSubmit" value="setuju">Setujui</button>
        </div>

    </form>
    </div>
</div>
