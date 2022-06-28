<div class="modal fade" id="tambah-peminjaman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">

            <form enctype="multipart/form-data" action="/visitor/PermohonanAset/PeminjamanAset/Simpan" method="post">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h2 class="modal-title fw-bold text-center" id="exampleModalLabel">TAMBAH PEMINJAMAN</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="form-group input_fields_wrap">
                        <div class="d-flex justify-content-start mt-4 ">
                            <label class="mx-4 w-100 ">Daftar Barang</label>

                            <label class="ml-5 pl-2">Jenis</label>
                            <input type="text" name="jenisBarang1" class="form-control mx-4" value="{{ old('jenisBarang1') }}" autofocus autocomplete="off" required>

                            <label>Tipe</label>
                            <input type="text" name="tipeBarang1" class="form-control mx-4" value="{{ old('tipeBarang1') }}" autofocus autocomplete="off" required>

                            <label class="form-label" visibilit>Jumlah</label>
                            <input type="number" name="jumlahBarang1" class="form-control mx-4" value="{{ old('jumlahBarang1') }}" autofocus autocomplete="off" required size="5">

                            <a class="add_field_button"><span class="iconify" data-icon="carbon:add-alt" style="color: #0fa958;" data-height="25"></span></a>
                        </div>
                    </div>


                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Tanggal Pengembalian</label>
                            <input type="date" name="tglKembali" class="form-control mx-4" value="{{ old('tglKembali') }}" autofocus autocomplete="off">
                        </div>
                    </div>
                    @error('tglKembali')
                    <div class="alert-danger mt-1">{{$message}}</div>
                    @enderror


                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <label class="mx-4 w-25">Tujuan Peminjaman</label>
                            <textarea name="tujuan" class="form-control mx-4" cols="30" rows="10" value="{{ old('tujuan') }}" autofocus autocomplete="off"></textarea>
                        </div>
                    </div>
                    @error('tujuan')
                    <div class="alert-danger mt-1">{{$message}}</div>
                    @enderror

                    <!-- USER ID REFERENCES -->
                    <input type="hidden" name="user_id" class="form-control mx-4" value="{{ Auth::user()->id }}" autofocus autocomplete="off" style="visibility: hidden">


                    <input type="hidden" name="kodePeminjaman" value="PMJN-{{date('Y.m.d-h.i.s')}}" style="visibility: hidden">

                    <?php $approvers =  DB::table('users')->where('role', '=', 'approver')->get() ?>
                    @foreach($approvers as $approver)
                    <input type="hidden" name="role" value="{{$approver->role}}" style="visibility: hidden">
                    @endforeach

                    <input type="hidden" name="deskripsiNotif" value="kode peminjaman PMJN-{{date('Y.m.d-h.i.s')}} telah dibuat !" style="visibility: hidden">

                    <input type="hidden" name="status" value="proses" style="visibility: hidden">

                    
                    <input type="hidden" name="unit_id" value="{{Auth::user()->unit_id}}" style="visibility: hidden">

                </div>

                <div class="modal-footer d-flex">
                    <button style="width: 40%" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button style="width: 40%" type="submit" class="btn btn-info mx-1">Kirim</button>
                </div>
            </form>

        </div>
    </div>
</div>