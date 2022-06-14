<div class="modal fade" id="rst<?= $ada->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">

    <form enctype="multipart/form-data" action="/MonitoringAset/PengadaanAset/ProsesPO/Simpan/{{$ada->id}}" method="post">
        {{ csrf_field() }}
        <div class="modal-header">
      
        <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">PROSES PERSETUJUAN PRODUCT ORDER</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>


        <input type="hidden" name="statusProsesPO" value="proses-PO" style="visibility: hidden">


        <div class="modal-body row">
        <div class="form-group ml-2 mt-3">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25" >Kode Pengadaan</label>
                <input type="text" name="kodePengadaan" class="form-control mx-4" value="{{$ada->kodePengadaan}}" autofocus autocomplete="off"  disabled>
            </div>
        </div>



            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Dokumen PO</label>
                    <input type="file" name="dokumenPO" class="form-control mx-4" value="{{old('dokumenPO')}}">
                </div>
                

                @error('dokumenPO')
                    <div class="alert-danger mt-2 mr-2">{{$message}}</div>
                @enderror
            </div>



            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25">Catatan Tambahan</label>
                    <textarea name="deskripsi2" placeholder="bersifat optional ..." class="form-control mx-4" cols="30" rows="10" autofocus autocomplete="off"></textarea>
                </div>

            </div>
        </div>

      

        <input type="hidden" name="deskripsiProsesPO" value="kode pengadaan {{$ada->kodePengadaan}} meminta persetujuan PO" style="visibility: hidden">

        <input type="hidden" name="pengadaan_id" value="{{$ada->id}}" style="visibility: hidden">


        <?php $approvers =  DB::table('users')->where('role','=','approver')->get() ?>
        @foreach($approvers as $approver)
        <input type="hidden" name="role" value="{{$approver->role}}" style="visibility: hidden">
        @endforeach


        <div class="modal-footer d-flex">
            <button style="width: 40%" data-bs-dismiss="modal" class="btn btn-secondary">Batal</button>

            <button style="width: 40%" type="submit" class="btn btn-success">Kirim</button>
        </div>

    </form>
    </div>
</div>
