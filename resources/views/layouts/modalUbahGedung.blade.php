<div class="modal fade" id="ubahGedung<?= $gd->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

        <form enctype="multipart/form-data" action="/ManajemenAset/DataAset/Gedung/Kirim/{{$gd -> id}}" method="post">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">UBAH GEDUNG</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">

                    <div class="form-group ml-2 mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Gedung</label>
                            <input type="text" name="gedung" class="form-control mx-4" value="{{$gd -> nama}}" autofocus autocomplete="off">
                        </div>
                    </div>
                </div>


                <div class="modal-footer d-flex">
                    <button style="width: 40%" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button style="width: 40%" type="submit" class="btn btn-info mx-1">Kirim</button>
                </div>
        </form>
            
        </div>
    </div>
</div>