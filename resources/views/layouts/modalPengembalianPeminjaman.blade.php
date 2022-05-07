<div class="modal fade" id="rst<?= $pinjam->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">

    <form enctype="multipart/form-data" action="/ManajemenAset/PeminjamanAset/Pengembalian/Simpan/{{$pinjam->id}}" method="post">
        {{ csrf_field() }}
        <div class="modal-header">
            
        <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">PENGEMBALIAN PEMINJAMAN ASET</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body row">
        <div class="form-group ml-2 mt-3">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25" >Kode Peminjaman</label>
                <input type="text" name="kodePeminjaman" class="form-control mx-4" value="{{$pinjam->kodePeminjaman}}" autofocus autocomplete="off"  disabled>
            </div>
        </div>


        <input type="text" name="deskripsiNotifKembali" value="kode peminjaman {{$pinjam->kodePeminjaman}} berhasil dikembalikan" style="visibility: hidden">


        <div class="form-group ml-2 mt-3">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25" >Tanggal Rencana Pengembalian</label>
                <input type="text" name="tglKembali" class="form-control mx-4"  value="{{ $pinjam -> tglKembali }}" autofocus autocomplete="off" disabled>
            </div>
        </div>


        <div class="form-group mt-3">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25" >Waktu Pengembalian</label>
                <input type="datetime-local" name="waktuPengembalian" class="form-control mx-4"  value="{{ old('waktuPengembalian') }}" autofocus autocomplete="off">
            </div>
        </div>
        @error('waktuPengembalian')
            <div class="alert-danger mt-1">{{$message}}</div>
        @enderror

        <div class="form-group mt-3 ml-2">
            <div class="d-flex justify-content-center">
                <label class="mx-4 w-25">Catatan Tambahan</label>
                <textarea name="catatan" placeholder="bersifat optional ..." class="form-control mx-4" cols="30" rows="10" autofocus autocomplete="off"></textarea>
            </div>
        </div>
        </div>

        <input type="text" name="statusKembali" value="kembali" style="visibility: hidden">

        <?php $visitors =  DB::table('users')->where('id','=',$pinjam->user_id)->get() ?>
        @foreach($visitors as $visitor)
        <input type="text" name="idVisitor" value="{{$visitor->id}}" style="visibility: hidden">
        @endforeach
 
        
        <input type="text" name="statusNotifKembali" value="kembali" style="visibility: hidden">

        <div class="modal-footer d-flex">
            <button style="width: 40%"  class="btn btn-secondary" data-bs-dismiss="modal" >Batal</button>

            <button style="width: 40%" type="submit" class="btn btn-success" >Dikembalikan</button>
        </div>

    </form>
    </div>
</div>
