<div class="modal fade" id="password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
    <form enctype="multipart/form-data" action="/profil/password/{{ Auth::user()->id }}" method="post">
        {{ csrf_field() }}

        <div class="modal-header">
        <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">UBAH PASSWORD</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body row">


            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25" >Password Baru</label>
                    <input id="password" type="password" name="password" class="form-control mx-4" autofocus autocomplete="off" required>
                </div>
                @error('password')
                    <div class="alert-danger mt-1">{{$message}}</div>
                @enderror

            </div>

            <div class="form-group mt-3">
                <div class="d-flex justify-content-center">
                    <label class="mx-4 w-25" >Konfirmasi Password  </label>
                    <input  id="password-confirm" type="password" class="form-control mx-4" name="password_confirmation" required autocomplete="new-password">
                </div>
                @error('password')
                    <div class="alert-danger mt-1">{{$message}}</div>
                @enderror

            </div>
        </div>
        <div class="modal-footer d-flex">
            <button style="width: 40%" data-bs-dismiss="modal" class="btn btn-secondary">Batal</button>
            <button style="width: 40%" type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>

    </div>
    </div>
</div>
